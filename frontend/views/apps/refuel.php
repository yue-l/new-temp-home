<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppsAsset;

AppsAsset::register($this);
?>
<div class="apps-refuel">
    <h3>Add new Refuel Ticket</h3>
    <div class="col-lg-offset-1 col-lg-11">
        <small><?= $car->plate;?></small>
    </div>
    <?php $form = ActiveForm::begin([
        'action' => ['apps/completerefuel'],
        'id' => 'refuelregform',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ]
    ]); ?>
    <?= $form->field($model, 'vehicle')->hiddenInput($options = ['value' => $carid])->label(false); ?>
    <?= $form->field($model, 'previousodo')->hiddenInput($options = ['value' => $car->odometer])->label(false); ?>
    <?= $form->field($model, 'currentodo'); ?>
    <?= $form->field($model, 'fuelamount'); ?>
    <?= $form->field($model, 'fuelcost'); ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::button('Submit', ['id' => 'refuelRegBtn', 'class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- fueltracker-refuel -->
