<?php

namespace taguz91\CustomColumns;

use taguz91\CustomColumns\models\Message;
use yii\base\InvalidConfigException;
use yii\bootstrap4\Html;
use yii\grid\Column;
use yii\helpers\ArrayHelper;

class ModalColumn extends Column
{

  public $attribute;

  public $modalTitle = '';

  /**
   * @var string $render - Endpoint del servicio para actualizar el estado de una sucursal 
   * - Siempre como parametro get se envia el id 
   */
  public $render;


  /**
   * {@inheritdoc}
   * @throws \yii\base\InvalidConfigException if [[name]] is not set.
   */
  public function init()
  {
    parent::init();

    if (empty($this->attribute)) {
      throw new InvalidConfigException('The "attribute" property must be set.');
    }

    if (empty($this->render)) {
      throw new InvalidConfigException('The "render" property must be set. The view to add into the modal');
    }
  }

  /**
   * Renders the header cell content.
   * The default implementation simply renders [[header]].
   * This method may be overridden to customize the rendering of the header cell.
   * @return string the rendering result
   */
  protected function renderHeaderCellContent()
  {
    if ($this->header !== null) {
      return parent::renderHeaderCellContent();
    }
    return '';
  }


  /**
   * {@inheritdoc}
   */
  protected function renderDataCellContent($model, $key, $index)
  {
    $value = ArrayHelper::getValue($model, $this->attribute);
    // Si no tenemos el valor definido no mostramos el boton 
    if ($value === null) return '';

    // Si es un mensaje no mas solo mostramos el mensaje 
    if ($value instanceof Message) {
      return $value->getMessage();
    }

    $title = ArrayHelper::getValue($model, $this->modalTitle, $this->modalTitle);

    return Html::button($value, [
      'class' => 'showModalButton btn btn-sm btn-primary',
      'data-id' => $model->id,
      'value' => "{$this->render}?id={$model->id}",
      'title' => $title,
    ]);
  }
}
