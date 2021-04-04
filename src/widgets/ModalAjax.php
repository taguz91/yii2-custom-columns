<?php

namespace taguz91\CustomColumns\widgets;

use yii\bootstrap4\Widget;

/**
 * Load a content with ajax
 * This widget is for 
 * @see \taguz91\CustomColumns\ModalColumn
 */
class ModalAjax extends Widget
{

  /**
   * {@inheritdoc}
   */
  public function run()
  {
    $view = $this->getView();
    $js = <<< JS
    $('#ctnModal').on('hidden.bs.modal', function (e) {
      document.getElementById("modalContent").innerHTML = '<h3>Cargando...</h3>';
    });
    JS;
    $view->registerJs($js);
    return $this->render('modal');
  }
}
