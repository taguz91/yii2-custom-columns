<?php

namespace taguz91\CustomColumns;

use MongoDB\BSON\UTCDateTime;
use taguz91\CommonHelpers\Utils;
use yii\grid\DataColumn;

class MongoDateColumn extends DataColumn
{

  /**
   * @var string
   */
  public $dateFormat = 'Y-m-d H:i:s';

  /**
   * @var bool 
   */
  public $filter = false;

  /**
   * {@inheritdoc}
   */
  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    if ($value instanceof UTCDateTime) {
      return Utils::getDateFromMongo($value, $this->dateFormat);
    } else {
      return '';
    }
  }
}
