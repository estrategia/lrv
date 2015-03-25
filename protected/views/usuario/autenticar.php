<div class="ui-content ui-body-c">
    <h2>Ingreso al sistema</h2>
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
    <fieldset>
        <div class="ui-field-container" data-theme="c">
            <?php echo $form->labelEx($model, 'username', array('class' => 'ui-hidden-accessible')); ?>
            <?php echo $form->numberField($model, 'username', array('placeholder' => $model->getAttributeLabel('username'))); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
        <div class="ui-field-container" data-theme="c">
            <?php echo $form->labelEx($model, 'password', array('class' => 'ui-hidden-accessible')); ?>
            <?php echo $form->passwordField($model, 'password', array('placeholder' => $model->getAttributeLabel('password'))); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </fieldset>
    <?php echo CHtml::link('¿Olvidó su contraseña?', CController::createUrl('/usuario/recordar'), array('class' => 'c_olv_pass', 'data-ajax'=>'false')); ?>
    <!--
    <?php echo CHtml::submitButton('Ingresar', array('class' => 'c_ingre')); ?>
    -->
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Ingresar
        <input type="submit" data-enhanced="true" value="Ingresar">
    </div>

    <?php $this->endWidget(); ?>
    <?php /*echo CHtml::button('Crear una cuenta', array('submit' => CController::createUrl('/usuario/registro'), 'class' => 'c_reg'));*/ ?>
    <?php echo CHtml::link('Crear una cuenta', CController::createUrl('/usuario/registro'), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-ajax'=>"false")); ?>

    <div class="c_vnrg">
        <h2 class="c_t_vnrg">Ventajas de registrarse</h2>
        <ul data-role="listview" data-inset="true" class="c_list_ventajas">
            <li><a href="#" class="ui-btn ui-icon-carat-r ui-btn-icon-left ui-nodisc-icon ui-alt-icon c_listvn_a">Descuentos permanentes</a></li>
            <li><a href="#" class="ui-btn ui-icon-carat-r ui-btn-icon-left ui-nodisc-icon ui-alt-icon c_listvn_a">Paga tus pedidos en efectivo</a></li>
        </ul>
    </div>

</div>