<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'AKtQIa99Fgcz4n1hmy3k_hoIrpCk6znj',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/group'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET list' => 'list',
                        'GET show' => 'show',
                        'GET delete' => 'delete',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/user-group'],
                    'extraPatterns' => [
                        'GET show' => 'show',
                        'GET user/not-group' => 'not',
                        'POST create' => 'create',
                        'GET remove' => 'remove',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/timetable'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET show' => 'show',
                        'GET show/teacher' => 'show-teacher'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/statement'],
                    'extraPatterns' => [
                        'POST create' => 'create',
                        'GET list' => 'list',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'pluralize'=> false,
                    'controller' => ['api/user-value'],
                    'extraPatterns' => [
                        'GET show' => 'show',
                    ]
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
