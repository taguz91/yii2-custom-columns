<?php

namespace taguz91\CustomColumns;

use yii\grid\DataColumn;

class ImageColumn extends DataColumn
{

  /**
   * @var string
   */
  public $urlPrefix = '';

  public $format = 'html';
  public $label = 'Imagen';
  public $filter = false;

  /**
   * {@inheritdoc}
   */
  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    if ($value !== null) {
      $prefix = empty($this->urlPrefix) ? '' : $this->urlPrefix;

      return '<img src="' . $prefix . $value . '" style="max-width: 100px; max-height: 50px;">';
    }
    return '';
  }
}
