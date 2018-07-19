<?php

namespace app\modules\admin;

use Yii;
use yii\helpers\Url;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @var set default layout for module
     */
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {

        parent::init();

        Yii::$app->setHomeUrl(Url::to(['/admin/dashboard']));

        /**
         * Set different user instance for admin login
         */
        Yii::$app->set('user', [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/default/login'],
            'identityCookie' => ['name' => 'backend', 'httpOnly' => true],
            'idParam' => '_backendUser',
            'identityCookie' => [
                'name' => '_backendUser', // unique session for frontend
            ]
        ]);
    }
}
