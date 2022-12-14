<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Good;
use app\models\Order;
use app\models\OrderGood;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;

class CartController extends  Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session->get('cart') ?? [];

        $items = [];
        $totals = [];

        foreach($cart as $item)
        {
            $total = $item['product']['price'] * $item['quantity'];

            array_push($items, [
                'id' => $item['product']['id'],
                'name' => $item['product']['name'],
                'quantity' => $item['quantity'],
                'price' => $item['product']['price'],
                'total' => $total,
                'image' => $item['product']['img'],
            ]);

            if(isset($totals['items']))
            {
                $totals['items'] += $item['quantity'];
            } else
            {
                $totals['items'] = $item['quantity'];
            }

            if(isset($totals['price']))
            {
                $totals['price'] += $total;
            } else {
                $totals['price'] = $total;
            }
        }

        return $this->renderPartial('cart', compact('totals', 'items'));
    }

    public function actionAdd($name)
    {
        $good_model = new Good();
        $item = $good_model->getItem($name);

        $session = Yii::$app->session;
        $session->open();

        if($item)
        {
            $cart = new Cart();
            $cart->addToCart($item);
        }
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');

        return $this->actionIndex();
    }

    public function actionRemove($product)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session->get('cart');

        if(isset($cart[$product]))
            unset($cart[$product]);

        $session->set('cart', $cart);

        return $this->actionIndex();
    }

    public function actionTotal()
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session->get('cart') ?? [];

        $total = 0;

        foreach($cart as $item)
        {
            $total += $item['quantity'];
        }

        return $total;
    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session->get('cart') ?? [];

        if(empty($cart))
            return Yii::$app->response->redirect(Url::to('/'));

        $order = new Order();

        if($order->load(Yii::$app->request->post()) && $cart)
        {
            $order->date = date('Y-m-d H:i:s');

            $items = [];
            $totals = [
                'price' => 0,
                'items' => 0
            ];

            foreach($cart as $item)
            {
                $total = $item['product']['price'] * $item['quantity'];

                array_push($items, [
                    'id' => $item['product']['id'],
                    'name' => $item['product']['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['product']['price'],
                    'total' => $total,
                ]);

                $totals['items'] += $item['quantity'];
                $totals['price'] += $total;
            }

            $order->sum = $totals['price'];

            if($order->save())
            {
                $order_id = $order->id;

                foreach($items as $item)
                {
                    $order_good = new OrderGood();
                    $order_good->order_id = $order_id;
                    $order_good->product_id = $item['id'];
                    $order_good->name = $item['name'];
                    $order_good->price = $item['price'];
                    $order_good->quantity = $item['quantity'];
                    $order_good->sum = $item['total'];
                    $order_good->save();
                }

                Yii::$app->mailer->compose('order-mail', ['order' => $order, 'items' => $items, 'totals' => $totals])
                    ->setFrom(['yii_store@gmail.com' => 'yii store'])
                    ->setTo($order->email)
                    ->setSubject('?????????? #' . $order_id . ' ????????????????')
                    ->send();

                $session->remove('cart');

                return $this->render('success', compact('order_id'));
            }
        }

        $this->layout = 'modal-layout';
        return $this->render('order', compact('order'));
    }
}