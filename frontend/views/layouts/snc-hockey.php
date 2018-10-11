<?php
use yii\helpers\Html;
use app\assets\SncHokceyAsset;

SncHokceyAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<head>
    <meta charset="<?= Yii::$app->charset; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Develop suitable solutions to meet busniess needs" />
    <meta name="keywords" content="Guitar, Ice Hockey, Programming">
    <meta name="author" content="Yue Li" />
    <meta charset="UTF-8">
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<?php $this->beginBody(); ?>
<?php $this->endBody(); ?>
<?php $this->endPage(); ?>
