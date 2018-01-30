<div class="bg-micuenta">
  <?php $mensajes = Yii::app()->user->getFlashes(); ?>

  <?php if ($mensajes): ?>
  <ul class="messages">
    <?php foreach ($mensajes as $idx => $mensaje): ?>
      <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
      <?php endforeach; ?>
  </ul>
  <?php endif; ?>


  <div class="container">
    <div class="mi-cuenta">
      <?php
        $form = $this->beginWidget('CActiveForm', array(
          'enableClientValidation' => true,
          'htmlOptions' => array(
            'id' => "form-recordar", 'class' => "", 'data-ajax'=>"false"
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
        <div class="col-md-12 col-lg-12">
          <h3 style="margin-bottom: 20px;">Recuerda tu contraseña</h3>
          <p class="descripcion">A continuación, digita el email con el que te registraste <br> y te enviaremos un correo con tu contraseña.</p>
          <?php echo $form->textField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'),'class'=>'form-control')); ?>
          <?php echo $form->error($model, 'correoElectronico',array( "class" => "text-danger")); ?>
        </div>

        <div class="col-md-12 col-lg-12">
          <input class='btn-recordar-contrasena'  type="button" data-enhanced="true" data-registro-desktop="recordar" value="Enviar">
        </div>

      </div>

      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>
