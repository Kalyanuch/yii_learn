<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;

class GoodController extends Controller
{
    public function actionIndex($name)
    {
        $good_model = new Good();

        $item = $good_model->getItem($name);

        return $this->render('index', compact('item'));
    }
}