<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.02.2019
 * Time: 17:08
 */

namespace app\assets;

use yii\web\AssetBundle;


class publicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css",
        "/public/hc-offcanvas-nav-master/dist/hc-offcanvas-nav.css",
        "/public/css/normalize.css",
        "/public/css/custom.css",
        "/public/css/internal.css",
        "/public/css/effects.css",
    ];
    public $js = [
        "https://code.jquery.com/jquery-3.4.1.min.js",
        "/public/hc-offcanvas-nav-master/dist/hc-offcanvas-nav.js",
        "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js",
        "/public/js/ecos.js",
        "/public/js/filter.js",
    ];
    public $depends = [

    ];
}