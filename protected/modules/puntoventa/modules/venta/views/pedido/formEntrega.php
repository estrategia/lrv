<div class='space-3'></div>
<div class='row'>
<?php $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'id' => "form-listapersonal",
            'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
        ),
        'errorMessageCssClass' => 'has-error',
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'errorCssClass' => 'has-error',
            'successCssClass' => 'has-success',
        ))
    ); ?>


       <div class='row'>     
            <div class="col-md-3 form-group"> 
            
                <input type='radio' name='TipoEntrega' value=1/> Entrega Nacional
            </div>
            <div class="col-md-3 form-group">
                <input type='radio' name='TipoEntrega' value=2/> Venta Asistida en punto de venta
            </div>
           
		</div>
		<div class='row'>
			 <div class='col-md-3'>
            	<input type="submit" class="btn btn-default" data-enhanced="true" value="Siguiente" name="Submit">        
            </div>
		</div>

 <?php   $this->endWidget(); ?>