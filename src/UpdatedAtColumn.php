<?php

namespace taguz91\CustomColumns;

use Yii;

class UpdatedAtColumn extends MongoDateColumn
{

  /** @var string */
  public $label = '';

  /** @var string */
  public $attribute = 'updatedAt';

  public function init()
  {
    parent::init();
    if (empty($this->label)) {
      $this->label = Yii::t('app', 'Updated At');
    }
  }
}
