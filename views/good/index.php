<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-8 justify-self-center">
            <h2><div class="product-title"><?=$item['name']?></div></h2>
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?=$item['img']?>" alt="<?=$item['name']?>">
                </div>
                <div class="product-name"><?=$item['name']?></div>
                <div class="product-descr">Состав: <?=$item['composition']?></div>
                <div class="product-descr">Описание: <?=$item['descr']?></div>
                <div class="product-price">Цена: <?=$item['price']?> рублей</div>
                <div class="product-buttons">
                    <button type="button" class="product-button__add btn btn-success">Заказать</button>
                </div>
            </div>
        </div>
    </div>
</div>