<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Good extends ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods()
    {
        $result = Yii::$app->cache->get('goods');

        if(empty($result))
        {
            $result = Good::find()->all();

            Yii::$app->cache->set('goods', $result, 100);
        }

        return $result;
    }

    public function getGoodsByCategory($id)
    {
        return Good::find()->where(['category' => $id,])->asArray()->all();
    }

    public function getGoodsBySearchKey($text)
    {
        return Good::find()->where(['like', 'name', $text])->asArray()->all();
    }
}