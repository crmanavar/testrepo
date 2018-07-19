<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\widgets\Alert;

$this->title = 'Admin Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'card']]); ?>
<div class="card-body p-6">
    <div class="card-title">Login to your account</div>
    <div class="row">
        <div class="col-md-12">
            <!-- display success message -->
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="fa fa-check" aria-hidden="true"></i> Success!</h4>
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>

            <!-- display error message -->
            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error!</h4>
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>
        </div>
    </div> 
    <?php if ($model->scenario === 'lwe'): ?>
        <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Enter your e-mail', 'autofocus' => true]); ?>
    <?php else: ?>
        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Enter your username', 'autofocus' => true]); ?>
    <?php endif ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your password']) ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'remember_me')->checkbox() ?>
        </div>
        <div class="col-sm-6 text-right">
            <?= Html::a('Forgot Password?', ['/admin/default/request-password-reset']) ?>
        </div>
    </div>
    <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end(); ?>
