<?php
/**
* @link http://www.yueli.nz
*/

namespace app\assets;

use yii\web\AssetBundle;

class SncHockeyAsset extends AssetBundle {
  public $basePath = '@webroot';
  public $baseUrl = '@web';
  public $css = [
  ];
  public $js = [
  ];
  public $depends = [
    'app\assets\AppsAsset',
  ];
}
