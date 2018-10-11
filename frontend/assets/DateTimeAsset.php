<?php
/**
* @link http://www.yueli.nz
*/

namespace app\assets;

use yii\web\AssetBundle;
// use app\assets\AppsAsset;

class DateTimeAsset extends AssetBundle {
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
    'css/site.css',
    'css/bootstrap-datetimepicker.min.css'
  ];
  public $js = [
    'js/apps.js',
    'js/moment.min.js',
    'js/bootstrap-datetimepicker.min.js',
    'js/datecalculator.js'
  ];
  public $depends = [
    'app\assets\AppsAsset',
    'yii\bootstrap\BootstrapAsset',
    'rmrevin\yii\fontawesome\AssetBundle',
  ];
}
