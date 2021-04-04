<?php

use yii\bootstrap4\Modal;

?>

<!-- MODAL CONTENT -->
<?php Modal::begin([
  'headerOptions' => ['id' => 'modalHeader'],
  'id' => 'ctnModal',
  'size' => 'modal-lg',
  'centerVertical' => true,
  //keeps from closing modal with esc key or by clicking out of the modal.
  // user must click cancel or X to close
  // 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
]) ?>

<div id="modalContent">

  <h3>Cargando...</h3>

</div>

<?php Modal::end(); ?>