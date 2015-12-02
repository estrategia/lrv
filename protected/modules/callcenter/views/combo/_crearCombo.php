<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => "remision-form",
        'role' => 'form',
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

<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

<?php if ($model->isNewRecord): ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'tipoCombo'); ?>
        <?php echo CHtml::dropDownList('tipoCombo', null, array(1 => 'Crear un combo manual', 2 => 'Crear a partir de un beneficio'), array('class' => 'form-control', 'data-role' => 'validar-tipo-combo')); ?>
        <?php echo $form->error($model, 'tipoCombo'); ?>
    </div>
<?php endif; ?>

<!-- Large modal -->

<?php if($opcion == 'crear'):?>
    <div class="form-group" id="beneficio-combo" style="display:none">

        <input type="hidden" value="" id="Combo_idBeneficio" name="Combo[idBeneficio]" />
        <input type="hidden" value="" id="Combo_tipoBeneficio" name="Combo[tipoBeneficio]" />
        
        <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Seleccione el beneficio</a>

        <div id='descripcion-combo'></div>
        <div class="modal fade bs-example-modal-lg" id='modal-beneficios-combo' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Seleccionar Beneficio</h4>
                    </div>
                    <div class="modal-body">

                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'pager' => array(
                                'header' => '',
                                'firstPageLabel' => '&lt;&lt;',
                                'prevPageLabel' => 'Anterior',
                                'nextPageLabel' => 'Siguiente',
                                'lastPageLabel' => '&gt;&gt;',
                                'maxButtonCount' => 5
                            ),
                            'id' => 'grid-beneficios',
                            'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
                            'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
                            'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
                            'dataProvider' => $beneficios->searchBeneficiosCombos(),
                            'filter' => $beneficios,
                            'columns' => array(
                                array(
                                    'header' => '#',
                                    'value' => '$data->idBeneficio',
                                    'filter' => CHtml::activeTextField($beneficios, 'idBeneficio', array('class' => 'form-control')),
                                ),
                                array(
                                    'header' => 'Tipo',
                                    'type' => 'raw',
                                    'value' => function($data) {
                                                    return Yii::app()->params->beneficios["recambioslabel"][$data->tipo];
                                                },
                                 'filter' => CHtml::dropDownList('Beneficios[tipo]','', Yii::app()->params->beneficios["recambioslabel"], array("class" => "form-control", 'prompt'=>'Seleccione'))

                                ),
                                array(
                                    'header' => 'Inicio',
                                    'value' => '$data->fechaIni',
                                    'filter' => CHtml::activeTextField($beneficios, 'fechaIni', array('class' => 'form-control')),
                                ),
                                array(
                                    'header' => 'Fin',
                                    'value' => '$data->fechaFin',
                                    'filter' => CHtml::activeTextField($beneficios, 'fechaFin', array('class' => 'form-control')),
                                ),
                                array('header' => 'Productos de compra',
                                    'type' => 'raw',
                                    'value' => function($data) {
                                        $text = "";
                                        
                                        foreach ($data->listBeneficiosProductos as $producto) {
                                            if ($producto->unid > 0) {
                                                if($producto->objProducto != null){
                                                    $text.=$producto->objProducto->descripcionProducto . " ".$producto->objProducto->presentacionProducto.
                                                            ". Unid: " . $producto->unid."<br/>";
                                                }else{
                                                    $text.=$producto->codigoProducto.": No se encontró en la base de datos <br/>";
                                                }
                                            }
                                        }
                                        return $text;
                                    },
                                // 'filter' => CHtml::activeTextField($beneficios, 'searchProductoUnidad', array('class' => 'form-control')),
                                ),
                                array('header' => 'Productos de obsequio',
                                    'type' => 'raw',
                                    'value' => function($data) {
                                                $text = "";
                                                foreach ($data->listBeneficiosProductos as $producto) {
                                                    if ($producto->obsequio > 0) {
                                                        if($producto->objProducto != null){ 
                                                            $text.=$producto->objProducto->descripcionProducto . " ".$producto->objProducto->presentacionProducto.
                                                                    ". Unid: " . $producto->obsequio;
                                                        }else{
                                                            $text.=$producto->codigoProducto.": No se encontró en la base de datos <br/>";
                                                        }
                                                    }
                                                }
                                                return $text;
                                            },
                                ),
                                array(
                                    'header' => '',
                                    'type' => 'raw',
                                    'value' => function($data) {
                                        if( count($data->objCombo) ==  0){
                                        return CHtml::link("Añadir", '#', array('class' => 'link-beneficio', 'id' => 'link_beneficio_'.$data->idBeneficio, 'data-role' => 'add-beneficio', 'data-tipo'=> $data->tipo, 'data-beneficio' => $data->idBeneficio));
                                        }else{
                                            return "Ya añadido en otro combo";
                                        }
                                    },
                                ),
                            ),
                        ));
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'descripcionCombo'); ?>
    <?php echo $form->textField($model, 'descripcionCombo', array('class' => 'tipo form-control')); ?>
    <?php echo $form->error($model, 'descripcionCombo'); ?>
</div>

<div class="form-group"> <!-- calendario -->
    <?php echo $form->labelEx($model, 'fechaInicio'); ?>
    <?php
    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
        'model' => $model,
        'attribute' => 'fechaInicio',
        'language' => 'es',
        'options' => array(
            'showAnim' => 'slide',
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'hh:mm',
            "changeYear" => true,
            "changeMonth" => true,
            "changeHour" => true,
            'hourMin' => 0,
            'hourMax' => 24,
            'minuteMin' => 0,
            'minuteMax' => 60,
            'timeFormat' => 'hh:mm',
            "yearRange" => Date("Y") . ":" . (Date("Y") + 1)
        ),
        'htmlOptions' => array(
            'class' => 'form-control',
            'size' => '10',
            'maxlength' => '10',
            'placeholder' => 'yyyy-mm-dd hh:mm',
            'disabled' => ($model->idBeneficio != null)? true :false
        ),
    ));
    ?>
    <?php echo $form->error($model, 'fechaInicio'); ?>
</div> 

<div class="form-group"> <!-- calendario -->
    <?php echo $form->labelEx($model, 'fechaFin'); ?>
    <?php
    $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
        'model' => $model,
        'attribute' => 'fechaFin',
        'language' => 'es',
        'options' => array(
            'showAnim' => 'slide',
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'hh:mm',
            "changeYear" => true,
            "changeMonth" => true,
            "changeHour" => true,
            'hourMin' => 0,
            'hourMax' => 24,
            'minuteMin' => 0,
            'minuteMax' => 60,
            'timeFormat' => 'hh:mm',
            "yearRange" => Date("Y") . ":" . (Date("Y") + 1)
        ),
        'htmlOptions' => array(
            'class' => 'form-control',
            'size' => '10',
            'maxlength' => '10',
            'placeholder' => 'yyyy-mm-dd hh:mm',
            'disabled' => ($model->idBeneficio != null)? true :false
        ),
    ));
    ?>
    <?php echo $form->error($model, 'fechaFin'); ?>
</div> 

<?php if (!$model->isNewRecord): ?>
    <div class="form-group">
        <!-- checkbox -->
        <?php echo $form->labelEx($model, 'estadoCombo'); ?><div class="space-1"></div>
        <?php echo $form->dropDownList($model, 'estadoCombo', Yii::app()->params->callcenter['modulosConfigurados']['estadosModulos'], array('class' => 'estado', 'class' => 'form-control')) ?>
        <?php echo $form->error($model, 'estadoCombo'); ?>
    </div>
<?php endif; ?>

<div class="form-group">
    <?php echo CHtml::submitButton('Guardar Combo', array('class' => "btn btn-default")); ?>
</div>


<?php $this->endWidget(); ?>