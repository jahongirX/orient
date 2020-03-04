<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/normalize.css",
        "libs/bootstrap4/bootstrap.min.css",
        "libs/font-awesome-4.7.0/css/all.css",
        "libs/magnific-popup/magnific-popup.css",
        "css/owl.carousel.min.css",
        "css/animate.css",
        "css/fm.revealator.jquery.min.css",
        "fonts/stylesheet.css",
        "css/odometer.min.css",
        "css/pyatno.css",
        "css/style.css",
        "css/responsive.css",
    ];

    public $js = [
        "js/jquery-3.2.1.min.js",
//      "https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"
        "js/wow.min2.js",
        "js/parallax.min.js",
        "libs/bootstrap4/popper.js",
        "libs/bootstrap4/bootstrap.min.js",

        "libs/magnific-popup/jquery.magnific-popup.min.js",
//      "libs/magnific-popup/zoom.js",
        "libs/flipclock/js/flipclock.min.js",
        "js/owl.carousel.min.js",
        "js/owl.carousel2.thumbs.js",
        "js/jquery.maskedinput.min.js",
        "js/jquery.custom-scroll.min.js",
        "libs/font-awesome-4.7.0/js/all.js",
        "js/typed.js",
        "js/odometer.min.js",
        "js/circle-progress.js",
        "js/isotope.pkgd.min.js",
        "js/responsive.js",
        "js/menuscript.js",
        "js/main.js",
    ];

     public $depends = [

     ];

}
