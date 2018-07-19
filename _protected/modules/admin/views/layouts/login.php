<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

\app\modules\admin\assets\AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="ltr">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Language" content="<?= Yii::$app->language ?>" />
        <meta name="msapplication-TileColor" content="#2d89ef">
        <meta name="theme-color" content="#4188c9">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <?= Html::csrfMetaTags() ?>
        <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
        <title><?= Html::encode($this->title) ?></title>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&subset=latin-ext' rel='stylesheet' type='text/css'>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col col-login mx-auto">
                            <div class="text-center mb-6">
                                <img src="./demo/brand/tabler.svg" class="h-6" alt="">
                            </div>
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
