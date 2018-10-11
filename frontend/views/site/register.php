<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  <h1><?= Html::encode($this->title) ?></h1>
  <?php if (Yii::$app->session->hasFlash('userCreated')): ?>
    <div class="alert alert-success col-sm-5">
      Welcome! <?= Html::encode($model->username); ?>, you have successfully registed. Click to login <a href="login"> <?= Html::button('login', ['class' => 'btn btn-primary']); ?></a>
    </div>
  <?php else: ?>
    <p>Please fill out your credentials for registration:</p>
    <?php
      $form = ActiveForm::begin([
        'id' => 'user-register-form',
        'action' => ['site/completeregister'],
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
          'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
          'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
      ]);
    ?>
    <?= $form->field($model, 'username'); ?>
    <?= $form->field($model, 'password')->passwordInput(); ?>
    <?= $form->field($model, 'checkpwd')->passwordInput(); ?>
    <?= $form->field($model, 'email'); ?>
    <div class="form-group">
      <div class="col-lg-offset-1 col-lg-11">
        <?= Html::button('Complete Registration', ['class' => 'btn btn-primary', 'id' => 'userregbtn', 'name' => 'register-button']) ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  <?php endif; ?>
</div>
