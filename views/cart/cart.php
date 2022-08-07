<!-- saved from url=(0164)https://54901.selcdn.ru/data/files/12250/176/76c513850f991e4e65ef4b49f8f3a49e.html?temp_url_sig=5e79dbeb11907f3965eb323d81642e7d0cc3b7bd&temp_url_expires=1555682517 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body><h2 style="padding: 10px; text-align: center">Корзина</h2>
<?php
if($items) {
?>
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">Фото</th>
        <th scope="col">Наименование</th>
        <th scope="col">Количество</th>
        <th scope="col">Цена</th>
        <th scope="col">Всего</th>
        <th scope="col"></th>
    </tr>
    </thead>

    <tbody>
    <?php foreach($items as $item) { ?>
    <tr>
        <td style="vertical-align: middle" width="150"><img src="./img/<?=$item['image']?>" alt="<?=$item['name']?>"></td>
        <td style="vertical-align: middle"><?=$item['name']?></td>
        <td style="vertical-align: middle"><?=$item['quantity']?></td>
        <td style="vertical-align: middle"><?=$item['price']?> рублей</td>
        <td style="vertical-align: middle"><?=$item['total']?> рублей</td>
        <td class="delete" style="text-align: center; cursor: pointer; vertical-align: middle; color: red"><span data-product="<?=$item['id']?>">✖</span></td>
    </tr>
    <?php } ?>
    <tr style="border-top: 4px solid black">
        <td colspan="4">Всего товаров</td>
        <td class="total-quantity"><?=$totals['items']?></td>
    </tr>
    <tr>
        <td colspan="4">На сумму </td>
        <td style="font-weight: 700"><?=$totals['price']?> рублей</td>
    </tr>
    </tbody>

</table>

<div class="modal-buttons" style="display: flex; padding: 15px; justify-content: space-around">
    <button type="button" class="btn btn-danger clear_cart">Очистить корзину</button>
    <button type="button" class="btn btn-secondary btn-close">Продолжить покупки</button>
    <button type="button" class="btn btn-success btn-next">Оформить заказ</button>
</div><div id="js-atavi-extension-install"></div><div id="target_kultivator_ico" data-ico="chrome-extension://ailgcbdikiapkcbglcpfippolmjfljgi/images/ico.png" style="display: none;"></div>
<?php } else { ?>
<h3>Корзина пуста</h3>
<div class="modal-buttons" style="display: flex; padding: 15px; justify-content: space-around">
    <button type="button" class="btn btn-secondary btn-close">Начать покупки</button>
</div>
<?php } ?>
</body>
</html>