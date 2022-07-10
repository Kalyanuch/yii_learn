<?php

namespace app\controllers;

use yii\web\Controller;

class GoodController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}