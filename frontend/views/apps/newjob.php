<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppsAsset;

$this->registerCssFile('@web/css/bootstrap-datetimepicker.min.css', ['depends' => [app\assets\AppsAsset::className()]]);
$this->registerJsFile('@web/js/moment.min.js', ['depends' => [app\assets\AppsAsset::className()]]);
$this->registerJsFile('@web/js/bootstrap-datetimepicker.min.js', ['depends' => [app\assets\AppsAsset::className()]]);
$this->registerJsFile('@web/js/jobs.js', ['depends' => [app\assets\AppsAsset::className()]]);
AppsAsset::register($this);

$this->title = "New Job";
?>
<div class="newjob">
    <div class="panel panel-default">
        <div class="panel-heading">
            Register a New Job Application
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['apps/completejobreg'],
                'id' => 'refuelregform',
                'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-2 control-label'],
                ]
            ]); ?>
            <?= $form->field($model, 'title') ?>
            <?= $form->field($model, 'location') ?>
            <?= $form->field($model, 'company') ?>
            <?= $form->field($model, 'contact') ?>
            <?= $form->field($model, 'date') ?>
            <?= $form->field($model, 'document')->fileInput() ?>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::button('Submit', ['id'=>'newjobsubmit', 'class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><!-- newjob -->
