<?php
// DB setting is set as localhost; remote config is set in overriden files.
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yuelinz_randomiz',
            'username' => 'yuelinz_QqHbhZT',
            'password' => 'ZhmrjxF5',
            'charset' => 'utf8',
        ],
        'mailer' => [
            // 'class' => 'yii\swiftmailer\Mailer',
            // 'viewPath' => '@common/mail',
            // // send all mails to a file by default. You have to set
            // // 'useFileTransport' to false and configure a transport
            // // for the mailer to send real emails.
            // 'useFileTransport' => true,
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'enableSwiftMailerLogging' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'box1046.bluehost.com',
                'username' => 'mbl@yueli.nz',
                'password' => '"Dg>agj4ICF}b6{',
                'port' => '465',
                'encryption' => 'ssl',
            ],

        ],
    ],
];
