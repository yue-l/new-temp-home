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
        <?php
        NavBar::begin([
            'brandLabel' => 'Randomizlogic',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'id' => 'navigator',
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);?>
        <?=Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
                ['label' => 'Apps',
                'items' =>
                [
                    ['label' => 'Fuel Tracker', 'url' => ['/apps/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Date Time Calculator', 'url' => ['/apps/datetime']],
                    '<li class="divider"></li>',
                    ['label' => 'My Jobs List', 'url' => ['/apps/myjobs']],
                    '<li class="divider"></li>',
                    !Yii::$app->user->isGuest && Yii::$app->user->identity->role == 'admin' ? ['label' => 'My Career', 'url' => ['/apps/mycareer']] :
                    ['label' => 'Coming Soon', 'url' => []],
                ]
            ],
            Yii::$app->user->isGuest ?
            ['label' => 'Login', 'url' => ['/site/login']] :
            [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ],
    ]);?>
    <?php NavBar::end(); ?>
    <div class="container">
        <?=
        MultilevelHorizontalMenu::widget(
            [
                "menu"=>[
                    [
                        "url" => [],
                        "label"=>"Career",
                        ["url"=>array(
                            "route"=>"/apps/mycareer"),
                            "label"=>"View My Career",
                        ],
                            [
                                "url"=> [
                                    "route"=>"/apps/newcareer"),
                                    "label"=>"New Career Event",
                                ]
                            ]
                    ],
                ],
            ]);
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
