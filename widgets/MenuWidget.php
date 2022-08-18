<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $data;

    public function run()
    {
        $model_category = new Category();

        $this->data = $model_category->getCategories();

        $current = \Yii::$app->request->getPathInfo();

        if($current === '')
        {
            array_unshift($this->data, [
                'id' => 0,
                'cat_name' => '',
                'browser_name' => 'Всё меню',
                'active' => 1
            ]);
        } else
        {
            array_unshift($this->data, [
                'id' => 0,
                'cat_name' => '',
                'browser_name' => 'Всё меню',
                'active' => 0
            ]);
        }

        foreach($this->data as $key => $value)
        {
            if($value['cat_name'] == str_replace('category/', '', $current))
            {
                $this->data[$key]['active'] = 1;
            } else {
                $this->data[$key]['active'] = 0;
            }
        }

        return $this->categoryRender($this->data);
    }

    public function categoryRender($data)
    {
        ob_start();

        include __DIR__ . '/template/menu.php';

        return ob_get_clean();
    }
}