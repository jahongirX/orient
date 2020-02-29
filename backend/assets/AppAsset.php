<?php

namespace backend\assets;

use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/pace/pace-theme-flash.css',
        'plugins/dropzone/css/dropzone.css',
        'plugins/boostrapv3/css/bootstrap.min.css',
        'plugins/font-awesome/css/font-awesome.css',
        'plugins/jquery-scrollbar/jquery.scrollbar.css',
        'plugins/bootstrap-select2/select2.css',
        'plugins/switchery/css/switchery.min.css',
        'plugins/bootstrap-tag/bootstrap-tagsinput.css',
        'pages/css/pages-icons.css',
        'pages/css/pages.css',
        'css/style.css'
];

    public $js = [
        'plugins/pace/pace.min.js',
        'plugins/modernizr.custom.js',
        'plugins/jquery-ui/jquery-ui.min.js',
        'plugins/boostrapv3/js/bootstrap.min.js',
        'plugins/jquery/jquery-easy.js',
        'plugins/jquery-unveil/jquery.unveil.min.js',
        'plugins/jquery-bez/jquery.bez.min.js',
        'plugins/jquery-ios-list/jquery.ioslist.min.js',
        'plugins/jquery-actual/jquery.actual.min.js',
        'plugins/jquery-scrollbar/jquery.scrollbar.min.js',
        'plugins/classie/classie.js',
        'plugins/dropzone/dropzone.js',
        'plugins/switchery/js/switchery.min.js',
        'plugins/bootstrap-tag/bootstrap-tagsinput.min.js',
        'pages/js/pages.min.js',
        'plugins/tinymce/tinymce.min.js',
        'plugins/tinymce/jquery.tinymce.min.js',
        'plugins/clipboard/clipboard.min.js',
        'js/scripts.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}
