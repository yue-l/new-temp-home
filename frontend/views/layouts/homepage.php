<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ProfileAsset;

ProfileAsset::register($this);
?>
<?php $this->beginPage(); ?>
<html lang="<?= Yii::$app->language; ?>">
<!DOCTYPE html>
<head>
    <meta charset="<?= Yii::$app->charset; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Develop suitable solutions to meet busniess needs" />
    <meta name="keywords" content="Guitar, Ice Hockey, Programming">
    <meta name="author" content="Yue Li" />
    <meta charset="UTF-8">
    <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css"> 
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
  <?php $this->beginBody(); ?>
  <div class="wrap">
      <?= $this->render('partials/navbar');?>
    </div>
    <?= $content; ?>
    <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
