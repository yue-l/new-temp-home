<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => 'JLRIHCD5VGJv9v8htujGNXpIcsULQ7AT',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes, ajax features only work if pretty url enabled
            'enablePrettyUrl' => true,
            'rules' => [
                // '<controller>/refuel/<carid:\d+>' => "<controller>/refuel",
                // '<controller>/checkstatus/<carid:\d+>' => "<controller>/checkstatus",
                // '<controller>/updatecareer/<eventid:\d+>' => "<controller>/updatecareer",
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // '<controller>' => "<controller>/index",
            ],
        ],
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'session' => [
            'class' => 'common\components\CustomSession',
            'name' => 'yueli-public-session-cookie',
            // 'basePath' => '/session root',
        ],
    ],
    'params' => $params,
];
