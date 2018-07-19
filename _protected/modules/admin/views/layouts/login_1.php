<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

\app\modules\admin\assets\AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Montserrat:300'>
        <?php $this->head() ?>
        <link rel="shortcut icon" href="<?= Yii::getAlias('@adminThemeImage'); ?>/favicon.ico">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="external-page sb-l-c sb-r-c">
        <?php $this->beginBody() ?>
        <div id="main" class="animated fadeIn">

            <section id="content_wrapper">

                <div id="canvas-wrapper">
                    <canvas id="demo-canvas"></canvas>
                </div>

                <section id="content">
                    <div class="admin-form theme-info" id="login1">
                        <div class="row mb15 table-layout">
                            <div class="col-xs-6 va-m pln">
                                <a href="dashboard.html" title="Return to Dashboard">
                                    <img src="assets/img/logos/logo_white.png" title="AdminDesigns Logo"
                                         class="img-responsive w250">
                                </a>
                            </div>
                            <div class="col-xs-6 text-right va-b pr5">
                                <div class="login-links">
                                    <a href="pages_login.html" class="active" title="Sign In">Sign In</a>
                                    <span class="text-white"> | </span>
                                    <a href="pages_register.html" class="" title="Register">Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-info mt10 br-n">
                            <div class="panel-heading heading-border bg-white">
                                <span class="panel-title hidden">
                                    <i class="fa fa-sign-in"></i>Register</span>
                                <div class="section row mn">
                                    <p class="dropcap dropcap-muted">SignIn</p>
                                </div>
                            </div>

                            <form method="post" action="/" id="contact">
                                <div class="panel-body bg-light p30">
                                    <div class="row">
                                        <div class="col-sm-7 pr30">
                                            <div class="section row hidden">
                                                <div class="col-md-4">
                                                    <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                                        <span>
                                                            <i class="fa fa-facebook"></i>
                                                        </span>Facebook</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                                        <span>
                                                            <i class="fa fa-twitter"></i>
                                                        </span>Twitter</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" class="button btn-social googleplus span-left btn-block">
                                                        <span>
                                                            <i class="fa fa-google-plus"></i>
                                                        </span>Google+</a>
                                                </div>
                                            </div>
                                            <div class="section">
                                                <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                                <label for="username" class="field prepend-icon">
                                                    <input type="text" name="username" id="username" class="gui-input"
                                                           placeholder="Enter username">
                                                    <label for="username" class="field-icon">
                                                        <i class="fa fa-user"></i>
                                                    </label>
                                                </label>
                                            </div>

                                            <div class="section">
                                                <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                                <label for="password" class="field prepend-icon">
                                                    <input type="password" name="password" id="password" class="gui-input"
                                                           placeholder="Enter password">
                                                    <label for="password" class="field-icon">
                                                        <i class="fa fa-lock"></i>
                                                    </label>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-sm-5 br-l br-grey pl30">
                                            <h3 class="mb25"> You'll Have Access To Your:</h3>
                                            <p class="mb15">
                                                <span class="fa fa-check text-success pr5"></span> Unlimited Email Storage</p>
                                            <p class="mb15">
                                                <span class="fa fa-check text-success pr5"></span> Unlimited Photo
                                                Sharing/Storage</p>
                                            <p class="mb15">
                                                <span class="fa fa-check text-success pr5"></span> Unlimited Downloads</p>
                                            <p class="mb15">
                                                <span class="fa fa-check text-success pr5"></span> Unlimited Service Tickets</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer clearfix p10 ph15">
                                    <button type="submit" class="button btn-primary mr10 pull-right">Sign In</button>
                                    <label class="switch ib switch-primary pull-left input-align mt10">
                                        <input type="checkbox" name="remember" id="remember" checked>
                                        <label for="remember" data-on="YES" data-off="NO"></label>
                                        <span>Remember me</span>
                                    </label>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>

            </section>

        </div>


        <?php $this->endBody() ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {

                "use strict";

                // Init Theme Core
                Core.init();

                // Init Demo JS
                Demo.init();

                // Init CanvasBG and pass target starting location
                CanvasBG.init({
                    Loc: {
                        x: window.innerWidth / 2,
                        y: window.innerHeight / 3.3
                    },
                });

            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>