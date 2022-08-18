<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th style="padding: 8px; border: 1px solid #ddd">Наименование</th>
            <th style="padding: 8px; border: 1px solid #ddd">Количество</th>
            <th style="padding: 8px; border: 1px solid #ddd">Цена</th>
            <th style="padding: 8px; border: 1px solid #ddd">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($items as $item) { ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd"><?=$item['name']?></td>
            <td style="padding: 8px; border: 1px solid #ddd"><?=$item['quantity']?></td>
            <td style="padding: 8px; border: 1px solid #ddd"><?=$item['price']?> рублей</td>
            <td style="padding: 8px; border: 1px solid #ddd"><?=$item['total']?> рублей</td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="3">Итого:</td>
            <td><?=$totals['items']?> шт</td>
        </tr>
        <tr>
            <td colspan="3">На сумму:</td>
            <td><b><?=$totals['price']?></b> рублей</td>
        </tr>
        </tbody>
    </table>
</div>