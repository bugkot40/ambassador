<?php


namespace app\assets;


use yii\web\AssetBundle;

class AppAssetAmbassador extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/ambassador/ambassador.css',
    ];
    public $js = [
        'js/ambassador/ambassador.js'
    ];
    public $depends = [
        'yii\web\YiiAsset', //jQuery
        'yii\bootstrap\BootstrapPluginAsset', //Bootstrap.min.css и Bootstrap.min.js
    ];

}