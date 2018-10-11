<?php
/**
* @link http://www.yueli.nz
*/

namespace app\assets;

use yii\web\AssetBundle;

class AppsAsset extends AssetBundle {
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/site.css',
  ];
  public $js = [
    'js/apps.js',
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    'yii\bootstrap\BootstrapPluginAsset',
    'rmrevin\yii\fontawesome\AssetBundle',
    'fedemotta\datatables\DataTablesAsset',
  ];
}
