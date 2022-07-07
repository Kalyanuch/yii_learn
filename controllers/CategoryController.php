<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $model_good = new Good();
        $goods = $model_good->getAllGoods();

        return $this->render('index', compact('goods'));
    }

    public function actionView($id)
    {
        $model_good = new Good();
        $goods = $model_good->getGoodsByCategory($id);

        return $this->render('view', compact('goods'));
    }
}