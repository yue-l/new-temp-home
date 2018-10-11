<?php
/**
* @link http://www.yueli.nz
*/

namespace app\assets;

use yii\web\AssetBundle;

class ProfileAsset extends AssetBundle {
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/stylish-portfolio.css',
    'css/timeline.css',
    'css/stickers.css',
    'css/lists.css',
  ];
  public $js = [
    'js/customized.js',
  ];
  public $depends = [
    'yii\web\YiiAsset',
    'yii\bootstrap\BootstrapAsset',
    'yii\bootstrap\BootstrapPluginAsset',
    'rmrevin\yii\fontawesome\AssetBundle',
  ];
}
