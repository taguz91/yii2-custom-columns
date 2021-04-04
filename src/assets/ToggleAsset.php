<?php

namespace taguz91\CustomColumns\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * This asset bundle provides [bootstrap4-toggle](https://gitbrent.github.io/bootstrap4-toggle)
 *
 */
class ToggleAsset extends AssetBundle
{

  public $sourcePath = '@bower/bootstrap4-toggle';

  public $js = [
    'js/bootstrap4-toggle.min.js',
  ];

  public $css = [
    'css/bootstrap4-toggle.min.css',
  ];

  public $depends = [
    JqueryAsset::class,
    BootstrapAsset::class,
  ];
}
