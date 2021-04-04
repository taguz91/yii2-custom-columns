<?php

namespace taguz91\CustomColumns;

use yii\bootstrap4\Html;
use yii\grid\DataColumn;

class ShowColumn extends DataColumn
{
  /**
   * @var string
   */
  public $redirectTo = '';

  /**
   * @var string
   */
  public $label = 'Detalle';

  /**
   * @var string
   */
  public $format = 'html';

  /**
   * {@inheritdoc}
   */
  public function getDataCellValue($model, $key, $index)
  {
    $value = parent::getDataCellValue($model, $key, $index);
    if ($value !== null) {
      $icon = Html::tag('i', '', ['class' => "far fa-eye text-primary mx-1"]);
      return Html::a(
        $icon,
        "{$this->redirectTo}{$value}",
        [
          'title' => 'Ver',
          'aria-label' => 'Ver',
          'data-pjax' => '0',
        ]
      );
    }
    return $value;
  }
}
