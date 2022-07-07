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
        $goods = Yii::$app->cache->get('goods');

        if(empty($goods))
        {
            $goods = Good::find()->all();

            Yii::$app->cache->set('goods', $goods, 100);
        }

        return $goods;
    }
}