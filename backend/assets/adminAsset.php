<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class adminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/all.min.css',
        'css/site.css',
        'css/adminlte.min.css',
        'css/adminlte.css',
        'css/OverlayScrollbars.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'
    ];
    public $js = [
        'plugins/jquery/jquery.min.js',
        'plugins/jquery/jquery-ui.min.js',
        'plugins/bootstrap/bootstrap.bundle.min.js',
        'plugins/overlayScrollbars/jquery.overlayScrollbars.min.js',
        'plugins/adminlte/adminlte.js',
        'plugins/adminlte/demo.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle'

    ];
}
