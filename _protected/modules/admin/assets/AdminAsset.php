<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Class AppAsset
 * @package app\modules\admin\assets
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'admin/css/dashboard.css',
    ];

    public $js = [
        'admin/js/dashboard.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
