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

            <div class="row">
                <div class="col-md-4">
                    <div class="" data-theme="c">
                        <?php echo $form->labelEx($model, 'username', array('class' => 'ui-hidden-accessible')); ?>
                        <?php echo $form->textField($model, 'username', array('placeholder' => $model->getAttributeLabel('username'),'class'=>"form-control")); ?>
                        <?php echo $form->error($model, 'username',array( "class" => "text-danger")); ?>
                    </div>
                </div>
            </div>
            <div class='space-1'></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="" data-theme="c">
                        <?php echo $form->labelEx($model, 'password', array('class' => 'ui-hidden-accessible')); ?>
                        <?php echo $form->passwordField($model, 'password', array('placeholder' => $model->getAttributeLabel('password'),'class'=>"form-control")); ?>
                        <?php echo $form->error($model, 'password',array( "class" => "text-danger")); ?>
                    </div>
                </div>
            </div>
            <div class='space-1'></div>
           <!-- <div class="row">
                <div class='col-md-4'>
                    <?php echo CHtml::link('¿Olvidó su contraseña?', CController::createUrl('/usuario/recordar'), array('class' => 'c_olv_pass', 'data-ajax'=>'false')); ?>
                </div>
            </div> -->
            <div class='space-1'></div>
            <div class="row">
                <div class='col-md-4'>
                    <?php /*echo CHtml::submitButton('Buscar', array('id' => 'btnBuscar',
                                                        'submit' => CController::createUrl('/usuario/ingresar'),
                                                        'name' => 'button', 
                                                        'class'=>'btn btn-primary btn-sm', 
                                                        'data-enhanced' => 'true'));*/ ?>
                    <input type="button" class ='btn btn-primary' data-enhanced="true" data-registro-desktop="autenticar" value="Ingresar"> 
                </div>
            </div>
    

    <?php $this->endWidget(); ?>
    <div class='space-1'></div>
    <?php /*echo CHtml::button('Crear una cuenta', array('submit' => CController::createUrl('/usuario/registro'), 'class' => 'c_reg'));*/ ?>
  <!--  <div class="row">
        <div class='col-md-4'>
             <?php echo CHtml::link('Crear una cuenta', CController::createUrl('/usuario/registro'), array('class' => '', 'data-ajax'=>"false")); ?>
        </div>
    </div> -->
<!--
    <div class="c_vnrg">
        <h2 class="c_t_vnrg">Ventajas de registrarse</h2>
        <ul data-role="listview" data-inset="true" class="c_list_ventajas">
            <li><a href="#" class="ui-btn ui-icon-carat-r ui-btn-icon-left ui-nodisc-icon ui-alt-icon c_listvn_a">Descuentos permanentes</a></li>
            <li><a href="#" class="ui-btn ui-icon-carat-r ui-btn-icon-left ui-nodisc-icon ui-alt-icon c_listvn_a">Paga tus pedidos en efectivo</a></li>
        </ul>
    </div>
-->