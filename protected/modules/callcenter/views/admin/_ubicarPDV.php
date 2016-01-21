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
                        <?php echo Select2::dropDownList('select-pdv-asignar', $objCompra->idComercial, CHtml::listData($listPdv, 'idComercial', function($model) {
                                    return "$model->idComercial - $model->nombrePuntoDeVenta";
                                }), array('prompt' => 'Seleccione punto de venta', 'id' => 'select-pdv-asignar', 'style' => 'width: 100%;')) ?>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="<?php echo uniqid() ?>" data-compra="<?php echo $objCompra->idCompra ?>" data-action="asignar-pdv" style="color: #dd4814;" class="btn btn-sm"><strong>Asignar</strong></button>
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
<?php echo Select2::dropDownList('select-ciudad-direccion', $objCompra->objCompraDireccion->codigoCiudad, CHtml::listData($listCiudad, 'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Seleccione ciudad', 'id' => 'select-ciudad-direccion', 'style' => 'width: 60%;')) ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center" rowspan="2">  
                                <button type="button" style="color: #51a351" class="btn btn-sm" data-role="pdvgeodireccion" data-compra="<?php echo $objCompra->idCompra ?>"><i class="glyphicon glyphicon-globe"></i> Geo</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Direccion</th>
                            <td><input type="text" value="<?php echo $objCompra->objCompraDireccion->direccion ?>" id="input-pedido-direccion" class="form-control input-sm"></td>
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
<?php echo Select2::dropDownList('select-ciudad-barrio', $objCompra->objCompraDireccion->codigoCiudad, CHtml::listData($listCiudad, 'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Seleccione ciudad', 'id' => 'select-ciudad-barrio', 'style' => 'width: 50%;')) ?>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Barrio: </strong>
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="<?php echo $objCompra->objCompraDireccion->barrio ?>" id="input-pedido-barrio" class="form-control input-sm"> 
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-sm" data-role="pdvgeobarrio" data-compra="<?php echo $objCompra->idCompra ?>"><i class="glyphicon glyphicon-search"></i>Buscar</button>
                    </div>
                </div>
            </form>
        <div id="div-pedido-georeferencia-barrio"></div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <div>
            <span class="title">Saldos del PDV</span><br><br>
            <form action="" method="post" id="pdvform" name="pdvform">
                <div class="row">
                    <div class="col-md-9">
<?php echo Select2::dropDownList('select-pdv-saldo', $objCompra->idComercial, CHtml::listData($listPdv, 'idComercial', function($model) {
            return "$model->idComercial - $model->nombrePuntoDeVenta";
        }), array('prompt' => 'Seleccione punto de venta', 'id' => 'select-pdv-saldo', 'style' => 'width: 100%;')) ?>
                    </div>
                    <div class="col-md-3">
                        <button type="button" data-compra="<?php echo $objCompra->idCompra ?>" data-action="saldo-pdv" style="color: #dd4814;" class="btn btn-sm"><strong>Consultar</strong></button>
                    </div>
                </div>
                <input type="hidden" value="386414" id="idPedido" name="idPedido">
                <input type="hidden" value="pdv" id="opcion" name="opcion">
            </form>

            <div id="div-saldos-pdv">
<?php $this->renderPartial('/pedido/_saldosPDV', array('respuesta' => $objCompra->getSaldosPDV())) ?>
            </div>

        </div>

        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
        <div>
            <span class="title">PDV Anteriores</span>
<?php $this->renderPartial('_gridAnteriores', array('model' => $modelCompra)) ?>
        </div>
    </div>
</div>

