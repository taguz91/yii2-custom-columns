<?php

namespace taguz91\CustomColumns;

use yii\base\InvalidConfigException;
use yii\bootstrap4\Html;
use yii\grid\Column;
use yii\helpers\ArrayHelper;

class SwitchColumn extends Column
{

  public $name = 'switch';

  public $attribute = '';

  /**
   * @var string $api - Endpoint del servicio para actualizar el estado de una sucursal 
   * - Siempre como parametro get se envia el id 
   */
  public $api;

  /**
   * @var mixed Estado para que este habilitado 
   */
  public $active;

  /**
   * {@inheritdoc}
   * @throws \yii\base\InvalidConfigException if [[name]] is not set.
   */
  public function init()
  {
    parent::init();
    if (empty($this->name)) {
      throw new InvalidConfigException('The "name" property must be set.');
    }

    if (empty($this->active)) {
      throw new InvalidConfigException('The "active" property must be set.');
    }

    if (empty($this->api)) {
      throw new InvalidConfigException('The "api" property must be set. This update the status in the db or execute a service callback');
    }

    $this->registerClientScript();
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

    return Html::checkbox($this->name, $value === $this->active, [
      'class' => 'switch',
      // 'data-value' => $value,
      'data-id' => $model->id,
      'data-toggle' => 'toggle',
      'data-on' => 'Deshabilitar',
      'data-off' => 'Habilitar',
      'data-onstyle' => 'primary',
      'data-offstyle' => 'secondary',
    ]);
  }

  /**
   * Registers the needed JavaScript.
   */
  public function registerClientScript()
  {
    $api = "{$this->api}?id=";
    $js = <<< JS
    const urlToogle = '$api';
    $('.switch').change(function(){
      fetch(urlToogle + this.dataset.id)
        .then(res => res.json())
        .then(data => {
          if (!data.transaccion) {
            this.checked = false;
            alert(data.errorDescripcion);
          }
        }).catch(console.warn);
    });
    JS;
    $this->grid->getView()->registerJs($js);
  }
}
