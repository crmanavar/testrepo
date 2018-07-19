<?php

namespace app\modules\admin\controllers;

use app\models\ResetPasswordForm;
use app\models\User;
use \app\modules\admin\models\LoginForm;
use app\modules\admin\models\PasswordResetRequestForm;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * @var Default action of controller
     */
    public $defaultAction = 'login';

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        $this->layout = "login";
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'request-password-reset', 'reset-password'],
                'rules' => [
                    [
                        'actions' => ['login', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Declares external actions for the controller.
     *
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    //------------------------------------------------------------------------------------------------//
    // LOG IN / LOG OUT
    //------------------------------------------------------------------------------------------------//

    /**
     * Logs in the user if his account is activated,
     * if not, displays appropriate message.
     *
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        // get setting value for 'Login With Email'
        $lwe = Yii::$app->params['lwe'];

        // if 'lwe' value is 'true' we instantiate LoginForm in 'lwe' scenario
        $model = $lwe ? new LoginForm(['scenario' => 'lwe']) : new LoginForm();

        // monitor login status
        $successfulLogin = true;

        // posting data or login has failed
        if (!$model->load(Yii::$app->request->post()) || !$model->login()) {
            $successfulLogin = false;
        }

        // if user's account is not activated, he will have to activate it first
        if ($model->status === User::STATUS_INACTIVE && $successfulLogin === false) {
            Yii::$app->session->setFlash('error', 'You have to activate your account first. Please check your email.');
            return $this->refresh();
        }

        // if user is not denied because he is not active, then his credentials are not good
        if ($successfulLogin === false) {
            return $this->render('login', ['model' => $model]);
        }
        // login was successful, let user go wherever he previously wanted
        return $this->goBack();
    }

    /**
     * Logs out the user.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /*----------------*
    * PASSWORD RESET *
    *----------------*/

    /**
     * Sends email that contains link for password reset action.
     *
     * @return string|\yii\web\Response
     */
    public function actionRequestPasswordReset()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new PasswordResetRequestForm();

        if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
            return $this->render('request-password-reset-token', ['model' => $model]);
        }

        if (!$model->sendEmail()) {
            Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            return $this->refresh();
        }

        Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

        return $this->goHome();
    }

    /**
     * Resets password.
     *
     * @param  string $token Password reset token.
     * @return string|\yii\web\Response
     *
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if (!$model->load(Yii::$app->request->post()) || !$model->validate() || !$model->resetPassword()) {
            return $this->render('reset-password', ['model' => $model]);
        }

        Yii::$app->session->setFlash('success', 'New password was saved.');

        return $this->goHome();
    }
}
