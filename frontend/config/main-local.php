<?php

// prod env setup
if(!YII_DEBUG) {
    $config = [
        'components' => [
            'request' => [
                // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                'cookieValidationKey' => 'biznFSNCHP7HxAIHLxh706SUNGJ_w1fh',
            ],
            // prod
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=aa19ab8vecedn75.c8wmdieyggw7.ap-southeast-2.rds.amazonaws.com;port=3306;dbname=ebdb',
                'username' => 'randomizDB',
                'password' => '7Lh_DB)-Tq',
                'charset' => 'utf8',
            ],
        ],
    ];
}

if (YII_DEBUG) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
