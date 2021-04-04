<?php

namespace taguz91\CustomColumns;

use yii\grid\DataColumn;

class PrefixColumn extends DataColumn
{

  public $prefix = '';

  /**
   * {@inheritdoc}
   */
  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    if ($value !== null) {
      return "{$this->prefix} $value";
    }
    return $value;
  }
}
