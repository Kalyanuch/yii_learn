<?php
use yii\widgets\ActiveForm;
?>

<h2>Оформление заказа</h2>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($order, 'name') ?>
<?= $form->field($order, 'email') ?>
<?= $form->field($order, 'phone') ?>
<?= $form->field($order, 'address') ?>
<button class="btn btn-info">Оформить заказ</button>
<?php ActiveForm::end(); ?>
