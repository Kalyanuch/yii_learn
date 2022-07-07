<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use Yii;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<section class="body">
    <header>
        <div class="container">
            <div class="header">
                <a href="<?=Yii::$app->homeUrl;?>">На главную</a>
                <a href="#">Вход в админку</a>
                <a href="#">Корзина</a>
                <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
            </div>
        </div>
    </header>

    <div class="container">
        <?= $content ?>
    </div>

    <footer>
        <div class="container">
            <div class="footer">
                &copy; Все права защищены или типа того
            </div>
        </div>
    </footer>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
