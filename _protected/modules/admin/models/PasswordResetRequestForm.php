<?php

namespace app\modules\admin\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Password reset request form.
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * Add role name from database table "auth_item" field "name". Content roles will be allowed to login in this module.
     * @var array
     */
    protected $allowed_roles = ['theCreator', 'admin'];

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'validateUser'],
            ['email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'Wrong email.'
            ],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     * @return bool
     */
    public function validateUser($attribute, $params)
    {
        if ($this->hasErrors()) {
            return false;
        }

        $user = User::findOne(['status' => User::STATUS_ACTIVE, 'email' => $this->email]);
        if ($user instanceof User && !in_array($user->getRoleName(), $this->allowed_roles)) {
            $this->addError($attribute, 'Wrong email.');
        }
    }


    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool Whether the email was send.
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne(['status' => User::STATUS_ACTIVE, 'email' => $this->email]);

        if (!$user) {
            return false;
        }

        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
        }

        if (!$user->save()) {
            return false;
        }

        return Yii::$app->mailer->compose('adminPasswordResetToken', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
    }
}
