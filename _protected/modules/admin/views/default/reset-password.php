<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \app\models\ResetPasswordForm */

use kartik\password\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\widgets\Alert;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'options' => ['class' => 'card']]); ?>
<div class="card-body p-6">
    <div class="card-title"><?= Html::encode($this->title) ?></div>
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
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your password', 'autofocus' => true]) ?>
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block']) ?>
</div>
<?php ActiveForm::end(); ?>