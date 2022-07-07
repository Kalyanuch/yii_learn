<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getCategories()
    {
        $result = Yii::$app->cache->get('categories');

        if(empty($result))
        {
            $result = Category::find()->asArray()->all();

            Yii::$app->cache->set('categories', $result, 100);
        }

        return $result;
    }
}