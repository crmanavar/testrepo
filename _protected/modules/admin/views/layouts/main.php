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
<html lang="<?= Yii::$app->language ?>" dir="ltr">
    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&subset=latin-ext">
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="page">
            <div class="page-main">
                <div class="header py-4">
                    <div class="container">
                        <div class="d-flex">
                            <a class="header-brand" href="./index.html">
                                <img src="http://localhost/yii/themes/admin/img/logo.png" class="header-brand-img" alt="tabler logo">
                            </a>
                            <div class="d-flex order-lg-2 ml-auto">
                                <div class="nav-item d-none d-md-flex">
                                    <a href="https://github.com/tabler/tabler" class="btn btn-sm btn-outline-primary" target="_blank">Source code</a>
                                </div>
                                <div class="dropdown d-none d-md-flex">
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <i class="fa fa-bell"></i>
                                        <span class="nav-unread"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a href="#" class="dropdown-item d-flex">
                                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                                            <div>
                                                <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                                <div class="small text-muted">10 minutes ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                                            <div>
                                                <strong>Alice</strong> started new task: Tabler UI design.
                                                <div class="small text-muted">1 hour ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex">
                                            <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                                            <div>
                                                <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                                                <div class="small text-muted">2 hours ago</div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                        <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
                                        <span class="ml-2 d-none d-lg-block">
                                            <span class="text-default">Jane Pearson</span>
                                            <small class="text-muted d-block mt-1">Administrator</small>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon fe fe-user"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon fe fe-settings"></i> Settings
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span class="float-right"><span class="badge badge-primary">6</span></span>
                                            <i class="dropdown-icon fe fe-mail"></i> Inbox
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon fe fe-send"></i> Message
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                                <span class="header-toggler-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 ml-auto">
                                <form class="input-icon my-3 my-lg-0">
                                    <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                                    <div class="input-icon-addon">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg order-lg-first">
                                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                    <li class="nav-item">
                                        <a href="./index.html" class="nav-link active"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cube"></i> Interface</a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="./cards.html" class="dropdown-item ">Cards design</a>
                                            <a href="./charts.html" class="dropdown-item ">Charts</a>
                                            <a href="./pricing-cards.html" class="dropdown-item ">Pricing cards</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-calendar"></i> Components</a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="./maps.html" class="dropdown-item ">Maps</a>
                                            <a href="./icons.html" class="dropdown-item ">Icons</a>
                                            <a href="./store.html" class="dropdown-item ">Store</a>
                                            <a href="./blog.html" class="dropdown-item ">Blog</a>
                                            <a href="./carousel.html" class="dropdown-item ">Carousel</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-file"></i> Pages</a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="./profile.html" class="dropdown-item ">Profile</a>
                                            <a href="./login.html" class="dropdown-item ">Login</a>
                                            <a href="./register.html" class="dropdown-item ">Register</a>
                                            <a href="./forgot-password.html" class="dropdown-item ">Forgot password</a>
                                            <a href="./400.html" class="dropdown-item ">400 error</a>
                                            <a href="./401.html" class="dropdown-item ">401 error</a>
                                            <a href="./403.html" class="dropdown-item ">403 error</a>
                                            <a href="./404.html" class="dropdown-item ">404 error</a>
                                            <a href="./500.html" class="dropdown-item ">500 error</a>
                                            <a href="./503.html" class="dropdown-item ">503 error</a>
                                            <a href="./email.html" class="dropdown-item ">Email</a>
                                            <a href="./empty.html" class="dropdown-item ">Empty page</a>
                                            <a href="./rtl.html" class="dropdown-item ">RTL mode</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="./form-elements.html" class="nav-link"><i class="fa fa-check-square"></i> Forms</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./gallery.html" class="nav-link"><i class="fa fa-image"></i> Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./docs/index.html" class="nav-link"><i class="fa fa-file-text"></i> Documentation</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 my-md-5">
                    <div class="container">
                        <div class="page-header">
                            <h1 class="page-title">
                                <?= $this->title; ?>
                            </h1>
                        </div>
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
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name . ' Adminpanel',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top',
            ],
        ]);

        // everyone can see Home page
        $menuItems[] = ['label' => 'Home', 'url' => ['/admin/dashboard']];

        // display Logout to logged in users
        if (!Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => 'Logout ' . ' (' . Yii::$app->user->identity->username . ')',
                'url' => ['/admin/default/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);

        NavBar::end();
        ?>
        
                    <div class="container">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        <?= Alert::widget() ?>
        <?= $content ?>
                    </div>
                </div>
        
                <footer class="footer">
                    <div class="container">
                        <p class="pull-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
                        <div class="powered-by pull-right"></div>
                    </div>
                </footer>-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
