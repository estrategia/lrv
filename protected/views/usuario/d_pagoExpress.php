<div class="conten_user_info">
  <div class="mi-cuenta interna-cuenta pago-express">

  <?php $mensajes = Yii::app()->user->getFlashes(); ?>

  <?php if ($mensajes): ?>
      <?php foreach ($mensajes as $idx => $mensaje): ?>
          <div class="alert alert-dismissable alert-<?php echo $idx; ?>"><?php echo $mensaje; ?></div>
      <?php endforeach; ?>
  <?php endif; ?>

  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'form-pagoexpess',
      'enableClientValidation' => true,
      'htmlOptions' => array(
          'class' => ""
      ),
      'errorMessageCssClass' => 'has-error',
      'clientOptions' => array(
          'validateOnSubmit' => true,
          'validateOnChange' => true,
          'errorCssClass' => 'has-error',
          'successCssClass' => 'has-success',
      ))
  );
  ?>

  <div class="row">
    <div class="col-md-12">
        <h2 class="t-change-dir" style="margin-bottom: 10px; font-size: 23px;">Configura tus pagos express</h2>
        <p>Paga rápido con un solo clic. Esta opción saldrá para los pedidos realizados en las direcciones que hayas seleccionado.</p>
        <h3 style="color: #3A3A3C !important; text-align: left; font-size: 18px; margin-bottom: 5px;">Hora de entrega</h3>
        <p>La hora de entrega se programará con la hora mas próxima disponible en tu ubicación</p>
        <hr>
    </div>
  </div>

  <div class="row">
      <div class="col-md-7">
          <h4 style="color: #CE402B; text-align: left; font-size: 18px; margin-bottom: 20px;">Dirección de despacho</h4>
          <div class="row">
              <div class="col-md-12">
                  <div id="div-direcciones-lista">
                      <?php if (empty($listDirecciones)): ?>
                          <?php echo CHtml::link('Crear dirección de despacho', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'pagoexpress', 'class' => 'btn btn-primary')); ?>
                      <?php else: ?>
                          <?php $this->renderPartial('/usuario/_d_direccionListaAcordeon', array('objPagoExpress' => $objPagoExpress, 'listDirecciones' => $listDirecciones)); ?>
                      <?php endif; ?>
                  </div>
                  <?php echo $form->error($objPagoExpress, 'idDireccionDespacho', array('class' => 'text-danger')); ?>
              </div>
          </div>
      </div>
      <div class="col-md-5">
          <h4 style="color: #CE402B; text-align: left; font-size: 18px; margin-bottom: 20px;">Forma de pago</h4>
          <div class="row">
            <div class="col-md-12">
                <?php $this->renderPartial('/usuario/_d_formaPago', array('form' => $form, 'model' => $objPagoExpress, 'listFormaPago' => $listFormaPago)) ?>
            </div>
          </div>
      </div>
  </div>



  <div class="row">
      <div class="col-md-2">
          <input type="submit" class="btn btn-primary" data-enhanced="true" value="Guardar" name="Submit">

      </div>

      <?php if (!$objPagoExpress->isNewRecord): ?>
      <div class="col-md-2">
        <input type="submit" class="btn btn-default" data-enhanced="true" value="Desactivar" name="Submit">
      </div>
    <?php endif; ?>


      <div class="col-md-4">
        <?php if (!empty($listDirecciones)): ?>
            <?php echo CHtml::link('Crear dirección de despacho', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'pagoexpress', 'class' => 'btn btn-primary')); ?>
        <?php endif; ?>
      </div>
  </div>

  <?php $this->endWidget(); ?>

  </div>
</div>
