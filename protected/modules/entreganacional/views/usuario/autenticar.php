<div class="row">

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Ingreso al sistema</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Por favor ingrese su Usuario y Clave
            </div>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'htmlOptions' => array(
                    'id' => "form-autenticar",
                    'class' => "form-horizontal",
                    'role' => 'form',
                ),
                'errorMessageCssClass' => 'has-error',
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'errorCssClass' => 'has-error',
                    'successCssClass' => 'has-success',
                //'inputContainer' => '.form-group',
                ))
            );
            ?>
            <fieldset>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('username'))); ?>
                </div>
                
                    <?php echo $form->error($model, 'username', array('class' => 'has-error help-block')); ?>

                <div class="clearfix"></div>
                <br/>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('password'))); ?>
                </div>
                <?php echo $form->error($model, 'password', array('class' => 'has-error')); ?>
                <div class="clearfix"></div>
            </fieldset>

            <p class="center col-md-5">
                <?php echo CHtml::submitButton('Ingresar', array('class' => 'btn btn-primary')); ?>
            </p>

            <?php $this->endWidget(); ?>

        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->