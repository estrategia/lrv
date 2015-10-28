<form id="addproducto" method="post" name="addproducto">
    <div class="row">
        <div class="col-md-3">
            <input type="text" placeholder="Descripción" class="form-control input-sm"  data-pedido="<?php echo $objCompra->idCompra ?>" maxlength="50" id="busqueda-buscar"> 
        </div>
        <div class="col-md-1">
            <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busquedapedido" data-pedido="<?php echo $objCompra->idCompra ?>"><i class="glyphicon glyphicon-search"></i>Buscar</button>
        </div>
    </div>
</form>