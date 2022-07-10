<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;

class CartController extends  Controller
{
    public function actionAdd($name)
    {
        $good_model = new Good();
        $item = $good_model->getItem($name);

        return $this->renderPartial('cart', compact('item'));
    }
}