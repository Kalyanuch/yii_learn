<?php if($data) { ?>
<div class="container">
    <nav class="nav nav-menu">
        <?php /*<a class="nav-link active" href="<?=Yii::$app->homeUrl;?>">Всё меню</a>*/ ?>
        <?php foreach($data as $item) { ?>
        <a class="nav-link<?php if($item['active']) { ?> active<?php } ?>" href="<?=\yii\helpers\Url::to(['category/view', 'id' => $item['cat_name']])?>"><?=$item['browser_name']?></a>
        <?php } ?>
    </nav>
</div>
<?php } ?>