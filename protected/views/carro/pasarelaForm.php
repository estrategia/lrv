<form name="pagoenlinea" id="form-pasarela" method="post" action="<?php echo $action ?>" target="_self" >
    <input name="usuarioId" type="hidden" value="<?php echo $usuarioId ?>">
    <input name="descripcion" type="hidden" value="<?php echo $descripcion ?>" >
    <input name="refVenta" type="hidden" value="<?php echo $model->idCompra ?>">
    <input name="moneda" type="hidden" value="<?php echo $model->moneda ?>">
    <input name="valor" type="hidden" value="<?php echo $model->valor ?>">
    <input name="iva" type="hidden" value="<?php echo $model->iva ?>">
    <input name="baseDevolucionIva" type="hidden" value="<?php echo $model->baseIva; ?>">
    <input name="firma" type="hidden" value="<?php echo $firma; ?>">
    <input name="emailComprador" type="hidden" value="<?php echo $model->correoElectronico; ?>">
    <input name="prueba" type="hidden" value="<?php echo $prueba; ?>">
    <input name="nombreComprador" type="hidden" value="<?php echo $model->nombre; ?>">
    <input name="documento" type="hidden" value="<?php echo $model->identificacionUsuario; ?>">
    <input name="tipoDocumento" type="hidden" value="<?php echo $model->tipoDocumento; ?>">
    <input name="url_respuesta" type="hidden" value="<?php echo $urlRespuesta; ?>">
    <input name="url_confirmacion" type="hidden" value="<?php echo $urlConfirmacion; ?>">
</form>