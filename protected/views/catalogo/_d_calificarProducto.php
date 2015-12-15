<div class="modal fade" id="modal-calificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Calificar producto</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                  <!--  <form id="form-calificacion-producto-<?php echo $objProducto->codigoProducto ?>"> -->
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'enableClientValidation' => true,
                        'htmlOptions' => array(
                            'id' => "form-calificacion", 'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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
                    <div id="calificacion-producto">
                        <div class="row">
                            <div class="col-md-6">
                               <!-- <label data-role="calificacion" for="calificacion-titulo-<?php echo $objProducto->codigoProducto ?>" class="ui-hidden-accessible cdtl_coment_titulo">Título:</label>
                                <input data-role="calificacion" type="text" id="calificacion-titulo-<?php echo $objProducto->codigoProducto ?>" placeholder="Título" class="form-control">
                                -->
                                <?php echo $form->labelEx($objFormCalificacion, 'titulo'); ?>
                                <?php echo $form->textField($objFormCalificacion, 'titulo', array('placeholder' => $objFormCalificacion->getAttributeLabel('titulo'), 'class' => 'form-control', /* 'id'=>"calificacion-titulo-".$objProducto->codigoProducto */)); ?>
                                <?php echo $form->error($objFormCalificacion, 'titulo', array("class" => "text-danger")); ?>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-6">  
                                <?php echo $form->labelEx($objFormCalificacion, 'comentario', array('class' => 'ui-hidden-accessible', 'data-role' => "calificacion")); ?>
                                <?php echo $form->textArea($objFormCalificacion, 'comentario', array('placeholder' => $objFormCalificacion->getAttributeLabel('comentario'), 'class' => 'form-control', /* 'id'=>"calificacion-titulo-".$objProducto->codigoProducto,'data-role'=>"calificacion" */)); ?>
                                <?php echo $form->error($objFormCalificacion, 'comentario', array("class" => "text-danger")); ?>
                                <!--
                                <label data-role="calificacion" for="calificacion-comentario-<?php echo $objProducto->codigoProducto ?>" class="ui-hidden-accessible">Comentario:</label>
                                <textarea data-role="calificacion" id="calificacion-comentario-<?php echo $objProducto->codigoProducto ?>" placeholder="Comentario" class="form-control" style="border:1px solid #e4e4e4;"></textarea>
                                -->
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                Calificación:
                                <div id="calificacion_form" data-role="raty" data-readonly="false" data-score="0" class="clst_cal_str" data-callback="capturarcalificacionproducto"></div>
                                <input id="CalificacionForm_calificacion" name="CalificacionForm[calificacion]" value="" type="hidden"/>
                                <?php echo $form->error($objFormCalificacion, 'calificacion', array("class" => "text-danger")); ?>                                   
                                <?php /*
                                  $this->widget('CStarRating',array(
                                  'name'=>'calificacion_form',
                                  'value'=>'',
                                  'minRating'=>1,
                                  'maxRating'=>5,
                                  'starCount'=>5,
                                  'callback'=>"
                                  function(){
                                  guardarCalificacion('$objProducto->codigoProducto',this,'".Yii::app()->createUrl('catalogo/calificar/')."');
                                  }"
                                  ));
                                 * 
                                 */
                                ?> 
                            </div>
                        </div>
                        <div class="space-1"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" data-role='guardarCalificacion' data-producto='<?php echo $objProducto->codigoProducto ?>' class="btn btn-primary">Calificar</button>  
                            </div>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                    <br/>
                    <!-- <div class="row">
                         <div class="span12">
                             <button data-role="calificacion" class="btn btn-primary" onclick='calificarProductoDesktop("<?php echo $objProducto->codigoProducto ?>");
                                     return false;'>Calificar</button>
                         </div>
                     </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>