<?php

namespace taguz91\CustomColumns;

use yii\grid\DataColumn;

class CashColumn extends DataColumn
{

  /**
   * {@inheritdoc}
   */
  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    if ($value !== null) {
      return '$ ' . number_format(round($value, 2), 2, '.', '');
    }
    return $value;
  }
}
