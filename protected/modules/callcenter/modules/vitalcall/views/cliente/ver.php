<?php
$this->breadcrumbs = array(
    'Inicio' => array('/callcenter/'),
    'Vitalcall' => array('/callcenter/vitalcall'),
    'Clientes' => array('/callcenter/vitalcall/clientes'),
    $objCliente->identificacionUsuario
);
?>

<!-- Info cliente-->
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped table-bordered table-condensed">
            <tbody>
                <tr>
                    <td> 
                        <div class="col-md-12">
                            <strong>C&eacute;dula: </strong><?= $objCliente->identificacionUsuario ?><br>
                            <strong>Nombre: </strong><?= $objCliente->nombre . " " . $objCliente->apellido ?><br>
                            <strong>Correo electr&oacute;nico: </strong><?= $objCliente->correoElectronico ?> <br/>
                            <strong>Celular: </strong><?= $objCliente->celular ?><br/>
                            <strong>Fijo: </strong><?= $objCliente->telefono ?> <strong>Extensi&oacute;n: </strong><?= empty($objCliente->extension) ? "N/A" : $objCliente->extension ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- formulas medicas-->
<div class="row">
    
</div>

<!-- direcciones despacho-->
<div class="row">
    
</div>

<!-- pedidos anteriores-->
<div class="row">
    <div class="col-md-12">
        <hr>
        <div>
            <span class="title">Pedidos Anteriores</span>

			<form method="post" action="<?php echo CController::createUrl('/callcenter/vitalcall/pedido/nuevo') ?>">
				<input type="hidden" value="<?= $objCliente->identificacionUsuario ?>"  name="cliente">
				<button type="submit" value="Submit">Nuevo pedido</button>
			</form>
            
            <?php $this->renderPartial('_gridAnteriores', array('model' => $modelCompra))?>
        </div>
    </div>
</div>