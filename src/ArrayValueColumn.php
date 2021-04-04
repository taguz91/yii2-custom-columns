<?php

namespace taguz91\CustomColumns;

use yii\grid\DataColumn;

class ArrayValueColumn extends DataColumn
{

  /**
   * @var array
   */
  public $array;

  /**
   * @var string
   */
  public $default = ''; 

  /**
   * {@inheritdoc}
   */
  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    return $this->array[$value] ?? $this->default;
  }
}
