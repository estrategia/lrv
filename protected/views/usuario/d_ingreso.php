<div class="bg-micuenta">
  <?php
    $form = $this->beginWidget('CActiveForm', array(
      'enableClientValidation' => true,
      'htmlOptions' => array(
        'id' => "form-autenticar", 'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax'=>"false"
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

  <div class="container">
    <div class="mi-cuenta">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <h3>Ingresa a tu cuenta</h3>
          <div class="" >
            <?php echo $form->textField($model, 'username', array('placeholder' => $model->getAttributeLabel('username'),'class'=>"form-control")); ?>
            <?php echo $form->error($model, 'username',array( "class" => "text-danger")); ?>
          </div>
          <div class="">
            <?php echo $form->passwordField($model, 'password', array('placeholder' => $model->getAttributeLabel('password'),'class'=>"form-control")); ?>
            <?php echo $form->error($model, 'password',array( "class" => "text-danger")); ?>
          </div>
          <p><?php echo CHtml::link('Recuerda la contraseña', CController::createUrl('/usuario/recordar'), array('class' => 'c_olv_pass', 'data-ajax'=>'false')); ?></p>
          <input type="button" class='btn btn-primary btn-lg center' style="margin-top:30px;" data-enhanced="true" data-registro-desktop="autenticar" value="Iniciar sesión">
          <hr>
          <p class="link-registro">¿Eres nuevo? <?php echo CHtml::link('Regístrate aquí', CController::createUrl('/usuario/registro'), array('class' => '', 'data-ajax'=>"false")); ?></p>
        </div>
      </div>
      <?php $this->endWidget(); ?>
    </div>
  </div>
</div>
