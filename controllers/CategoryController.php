<?php

namespace app\controllers;

use app\models\Good;
use yii\web\Controller;
use Yii;

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

    public function actionSearch()
    {
        $search = Yii::$app->request->get('search');
        $model_good = new Good();
        $goods = $model_good->getGoodsBySearchKey($search);

        return $this->render('search', compact('goods', 'search'));
    }
}