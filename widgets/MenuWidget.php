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

        return $this->categoryRender($this->data);
    }

    public function categoryRender($data)
    {
        ob_start();

        include __DIR__ . '/template/menu.php';

        return ob_get_clean();
    }
}