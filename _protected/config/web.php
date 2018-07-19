<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'truelyremote',
    'name' => 'Truely Remote',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'site/index',
    'bootstrap' => ['log', 'app\components\Aliases'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hrCkTKwdgW_iKFDyvq6k3RdGSvq-MpQx',
        ],
        // you can set your theme here - template comes with: 'light' and 'dark'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/default/views'],
                'baseUrl' => '@web/themes/',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                // we will use bootstrap css from our theme
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [], // do not use yii default one
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<module:admin>' => 'admin',
                '<alias:\w+>' => 'site/<alias>'
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
            'identityCookie' => ['name' => 'frontend', 'httpOnly' => true],
            'idParam' => '_frontendUser',
            'identityCookie' => [
                'name' => '_frontendUser', // unique session for frontend
            ]
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'savePath' => '@app/runtime/session'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'wadeshuler\sendgrid\Mailer',
            'viewPath' => '@app/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'apiKey' => 'SG.wIYadsasdasd145pPSE2AQRvUaGB93w.ohF636hlAT8NQPxjeQt-7oGGgSUKR3o_xg6Xxs9hybM',
        ],
        //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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en',
                ],
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/translations',
                    'sourceLanguage' => 'en'
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

/**
 * Developer Debugging function
 * @param $value
 * @param int $exit
 */
function p($value, $exit = 1) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    if ($exit == 1) {
        die;
    }
}

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module'];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module'];
}

return $config;
