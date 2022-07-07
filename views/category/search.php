<?=\app\widgets\MenuWidget::widget()?>

<h2>Результаты посика по запросу "<?=$search?>"</h2>

<?php if($goods) { ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach($goods as $good) { ?>
                <div class="col-4">
                    <div class="product">
                        <div class="product-img">
                            <img src="/img/<?=$good['img']?>" alt="<?=$good['name']?>">
                        </div>
                        <div class="product-name"><?=$good['name']?></div>
                        <div class="product-descr"><?=$good['composition']?></div>
                        <div class="product-price">Цена: <?=$good['price']?> рублей</div>
                        <div class="product-buttons">
                            <button type="button" class="product-button__add btn btn-success">Заказать</button>
                            <button type="button" class="product-button__more btn btn-primary">Подробнее</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>