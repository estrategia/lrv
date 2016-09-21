
<?php 

	$form = $this->beginWidget('CActiveForm', array(
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
    );
    ?>

    <?php echo CHtml::errorSummary($modelCliente); ?>
            
            <div class="form-group"> 
                <?php echo $form->labelEx($modelCliente, 'numeroDocumento'); ?>
                <?php echo $form->textField($modelCliente, 'numeroDocumento', array('class' => 'numeroDocumento form-control',)); ?>
                <?php echo $form->error($modelCliente, 'numeroDocumento'); ?>
            </div>

	<input type="submit" class="btn btn-default" data-enhanced="true" value="Buscar" name="Submit">

 <?php   $this->endWidget(); ?>

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
                'rowCssClassExpression' => array($this, 'rowCssClassFunction'), //'$data->seguimiento==1?"seguimiento":"jajaj"',
                //'filter' => $model,
                'columns' => array(
                    array(
                        'header' => "",
                        'type' => 'raw',
                        'value' => array($this, 'gridDetallePedido'),
                    //'cssClassExpression' => '$data->seguimiento==1?"seguimiento":"jajaj"',
                    ),
                    array(
                        'header' => 'Agente',
                        'value' => '$data->objOperador == null ? "Sin Asignar" : $data->objOperador->nombre',
                    ),
                    array(
                        'header' => 'Origen',
                        'type' => 'raw',
                        'value' => array($this, 'gridOrigenPedido'),
                    ),
                    array(
                        'header' => 'Destino',
                        'type' => 'raw',
                        'value' => array($this, 'gridDestinoPedido'),
                    ),
                    array(
                        'header' => 'Fecha Compra',
                        'value' => '$data->fechaCompra',
                    ),
                    array(
                        'header' => 'Fecha Entrega',
                        'value' => '$data->fechaEntrega',
                    ),
                    array(
                        'header' => 'Ciudad',
                        'value' => '$data->objCiudad->nombreCiudad',
                    ),
                    array(
                        'header' => 'Tipo Venta',
                        'value' => '$data->objTipoVenta->tipoVenta',
                    ),
                    array(
                        'header' => 'Tipo Entrega',
                        'value' => 'Yii::app()->params->entrega["tipo"][$data->tipoEntrega]',
                    ),
                    array(
                        'header' => 'Pago',
                        'type' => 'raw',
                        'value' => array($this, 'gridPagoPedido'),
                    ),
                    array(
                        'header' => 'Tipo Usuario',
                        'value' => '$data->identificacionUsuario == null ? "Invitado" : "Registrado"',
                    ),
                    array(
                        'header' => 'PDV',
                        'value' => '$data->idComercial == null ? "Sin Asignar" : $data->idComercial',
                    ),
                    array(
                        'header' => 'Estado',
                        'type' => 'raw',
                        'value' => array($this, 'gridEstadoPedido'),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
<?php endif;?>

    <?php
$listCiudad = Ciudad::model()->findAll(array(
    'order' => 'orden',
    'condition' => 'estadoCiudad=:estado',
    'params' => array(
        ':estado' => 1
        )));

$listPdv = PuntoVenta::model()->findAll(array(
    'order' => 'idComercial',
    'condition' => 'estado=:estado',
    'params' => array(':estado' => 1)));
?>


<div class="row">
    <div class="col-md-12">
        <div>
            <span class="title"><strong>Asignar Punto de venta</strong></span>
            <form action="/callcenter/index/generardoccruce/" method="post" id="asignarpdv" name="asignarpdv">
                <div class="row">
                    <div class="col-md-9">
                        <?php echo Select2::dropDownList('select-pdv-asignar', null, CHtml::listData($listPdv, 'idComercial', function($model) {
                                    return "$model->idComercial - $model->nombrePuntoDeVenta";
                                }), array('prompt' => 'Seleccione punto de venta', 'id' => 'select-pdv-asignar', 'style' => 'width: 100%;')) ?>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="<?php echo uniqid() ?>" data-action="asignar-pdv" style="color: #dd4814;" class="btn btn-sm"><strong>Asignar</strong></button>
                    </div>
                </div>
                <input type="hidden" value="386414" id="idPedido" name="idPedido">
                <input type="hidden" value="pdv" id="opcion" name="opcion">
            </form>   
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-5">
        <div>
            <span class="title">Georeferencia</span><br><br>
            <form action="" method="post" id="georeferenciaform" name="georeferenciaform">
                <table class="table table-bordered table-hover table-striped table-condensed">
                    <tbody>
                        <tr>
                            <th>Ciudad</th>
                            <td>
<?php echo Select2::dropDownList('select-ciudad-direccion', null, CHtml::listData($listCiudad, 'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Seleccione ciudad', 'id' => 'select-ciudad-direccion', 'style' => 'width: 60%;')) ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center" rowspan="2">  
                                <button type="button" style="color: #51a351" class="btn btn-sm" data-role="pdvgeodireccion" ><i class="glyphicon glyphicon-globe"></i> Geo</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Direccion</th>
                            <td><input type="text"  id="input-pedido-direccion" class="form-control input-sm"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="div-pedido-georeferencia-direcion"></div>
        
        
    </div>
    <div class="col-md-5">
            <span class="title">Buscar Barrio</span><br><br>

            <form action="" method="post" id="barrioform" name="barrioform">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Ciudad </strong>
                    </div>
                    <div class="col-md-9">
<?php echo Select2::dropDownList('select-ciudad-barrio', null , CHtml::listData($listCiudad, 'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Seleccione ciudad', 'id' => 'select-ciudad-barrio', 'style' => 'width: 50%;')) ?>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Barrio: </strong>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="input-pedido-barrio" class="form-control input-sm"> 
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-sm" data-role="pdvgeobarrio" ><i class="glyphicon glyphicon-search"></i>Buscar</button>
                    </div>
                </div>
            </form>
        <div id="div-pedido-georeferencia-barrio"></div>
    </div>
</div>