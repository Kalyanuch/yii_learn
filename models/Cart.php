<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Cart extends ActiveRecord
{
    public function addToCart($item)
    {
        $session = Yii::$app->session;
        $session->open();

        $cart = $session->get('cart');

        if(isset($cart[$item['id']]))
        {
            $cart[$item['id']]['quantity']++;
        } else
        {
            $cart[$item['id']] = [
                'quantity' => 1,
                'product' => $item,
            ];
        }

        $session->set('cart', $cart);
    }
}