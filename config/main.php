<?php

$config = [
    'id' => 'myproject',
    'vendorPath' => BASE_DIR . '/vendor',
    'timeZone' => 'Europe/Moscow',
    'basePath' => BASE_DIR,
    'runtimePath' => BASE_DIR . '/runtime',
    'language' => 'ru-RU',
    'controllerNamespace' => 'myproject\\controllers',
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => []
        ],
        'request' => [
        	// TODO add key, do not forget!
            'cookieValidationKey' => 'cookieValidationKey',
            'enableCsrfValidation' => false
        ],
//        'user' => [
//            'identityClass' => 'app\models\Users',
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mail.ru',
//                'username' => 'username',
//                'password' => 'password',
//                'port' => 465,
//                'encryption' => 'ssl',
            ]
        ],
        'cache' => [
            'class' => 'yii\\caching\\FileCache',
            'cachePath' => '@runtime/schema',
            'keyPrefix' => 'myproject'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'except' => ['yii\\db\\*',],
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/app.log',
                    'logVars' => [],
                ]
            ],
        ],
//        'session' => [
//            'class' => 'yii\\web\\CacheSession',
//            'timeout' => 86400,
//            'cache' => [
//                'class' => 'yii\\caching\\FileCache',
//                'cachePath' => '@runtime/session',
//            ],
//        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=dbname',
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
        ]
    ],
	'aliases' => [
		'@myproject' => BASE_DIR,
		'@tmp_dir' => '@runtime/tmp',
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'params' => [
		'admin_email' => 'jbashanov@gmail.com'
	],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*']
    ];
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		'allowedIPs' => ['*']
	];
}

return $config;
