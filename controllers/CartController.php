<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Good;
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
}