<?php
/**
 * Created by PhpStorm.
 * User: Yula
 * Date: 22.11.2017
 * Time: 9:00
 */

namespace app\assets;


use yii\web\AssetBundle;

class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}