<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\AppsAsset;
use host33\multilevelhorizontalmenu\MultilevelHorizontalMenu;

AppsAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
  <meta charset="<?= Yii::$app->charset; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags(); ?>
  <title><?= Html::encode($this->title); ?></title>
  <?php $this->head(); ?>
</head>
<body>
    <?php $this->beginBody(); ?>
    <div class="wrap">
        <?= $this->render('partials/navbar');?>
        <div class="container">
            <?php
            echo MultilevelHorizontalMenu::widget(
                array(
                    "menu"=>array(
                        array(
                            "url"=>array(),
                            "label"=>"Vihecles",
                            array(
                                "url" => array(
                                "route" => "/apps/index"),
                                "label" => "My Vehicles",
                            ),
                            array("url"=>array(
                                "route"=>"/apps/register"),
                                "label"=>"Register Vihecle",
                            )
                        ),
                    ),
                ));
            ?>
            <?= $content; ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Randomizlogic <?= date('Y'); ?></p>
            <p class="pull-right"><?= "version 0.2" ?></p>
        </div>
    </footer>
    <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
