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

    <?php echo CHtml::errorSummary($FormCliente); ?>
       <div class='row'>     
            <div class="col-md-3 form-group"> 
                <?php echo $form->labelEx($FormCliente, 'numeroDocumento'); ?>
                <?php echo $form->textField($FormCliente, 'numeroDocumento', array('class' => 'numeroDocumento form-control',)); ?>
                <?php echo $form->error($FormCliente, 'numeroDocumento'); ?>
            </div>
            <div class='col-md-3'>
            <br/>
    			<input type="submit" class="btn btn-default" data-enhanced="true" value="Buscar" name="Submit">        
            </div>
		</div>
	

 <?php   $this->endWidget(); ?>

<?php if(isset($modelCliente)):?>
<div class="box-content row well">
        <div class="col-lg-12 col-md-12">
        Cliente: <?= $modelCliente->nombre?>
        Cedula: <?= $modelCliente->numeroDocumento?>
        <a href='#' data-cliente='<?= $modelCliente->numeroDocumento?>'  data-beneficiario='0' data-action='asignar-cliente' class='btn btn-info' >Usar</a> 
        </div>
    </div>
<?php endif;?>


<?php if(isset($dataProvider)):?>
<div class="box-content row">
        <div class="col-lg-12 col-md-12">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'pager' => array(
                    'header' => '',
                    'firstPageLabel' => '&lt;&lt;',
                    'prevPageLabel' => 'Anterior',
                    'nextPageLabel' => 'Siguiente',
                    'lastPageLabel' => '&gt;&gt;',
                    'maxButtonCount' => 10
                ),
                'id' => 'pedidos-grid',
                //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
                //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
                //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
                'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
                'dataProvider' => $dataProvider,
                //'rowCssClass'=>array('odd','even'),
               // 'rowCssClassExpression' => array($this, 'rowCssClassFunction'), //'$data->seguimiento==1?"seguimiento":"jajaj"',
                //'filter' => $model,
                'columns' => array(
                    array(
                        'header' => "Nombre",
                        'value' => '$data->nombre',
                    ),
                    array(
                    		'header' => "Direccion",
                    		'value' => '$data->direccion',
                    ),
                    array(
                    		'header' => "Telefono",
                    		'value' => '$data->nombre',
                    ),
                    array(
                    		'header' => "Extension",
                    		'value' => '$data->nombre',
                    ),
                    array(
                    		'header' => "Celular",
                    		'value' => '$data->nombre',
                    ),
                    array(
                    		'header' => 'Estado',
                    		'type' => 'raw',
                    		'value' => array($this, 'gridUsoDireccion'),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
<?php endif;?>
