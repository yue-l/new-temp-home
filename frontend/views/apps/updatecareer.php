<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppsAsset;
AppsAsset::register($this);
?>
<div class="updatecareer">
    <h3>Update Career Event for <?= Html::encode($model->company); ?></h3>
    <?php $form = ActiveForm::begin([
        'action' => ['apps/completeupdatecareer'],
        'id' => 'careerupdateform',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ]
    ]); ?>
    <?= $form->field($model, 'isjoin')->radioList([1 => 'Join', 0 => 'Departure'])->label("Career Type"); ?>
    <?= $form->field($model, 'company') ?>
    <?= $form->field($model, 'date') ?>
    <?= $form->field($model, 'brief')->textarea(['rows' => 7]); ?>
    <?= $form->field($model, 'achieve')->textarea(['rows' =>7]); ?>
    <?= $form->field($model, 'modalname') ?>
    <?= $form->field($model, 'logoname') ?>
    <?= $form->field($model, 'sequence') ?>
    <div class="form-group">
        <?= Html::button('Update', ['id'=>'careerUpdateBtn', 'class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- updatecareer -->
