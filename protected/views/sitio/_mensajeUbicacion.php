<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        
            <div class='container' >
                <div class='col-md-5' >
                <strong> <?php echo $objCiudadSector->objCiudad->nombreCiudad?>  - <?php echo $objCiudadSector->objSector->nombreSector ?></strong>
                
                
                <?php if($objHorarioSecCiud!=null && $objHorarioSecCiud->sadCiudadSector==0):?>
                       <br/>No contamos con servicio de entrega a domicilio para esta ubicación, los pedidos deben ser recogidos en el Punto de Venta seleccionado por usted al momento de finalizar la compra.
                <?php endif;?>
                </div>
            </div> 
        
      </div>
      <div class="modal-footer">
        <a class='btn btn-success' href="<?php echo CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $pdvCerca['pdv']->codigoCiudad, 'sector' => $pdvCerca['pdv']->idSectorLRV)) ?>" data-ajax='false'>Usar esta ubicación</a>
        <a class='btn btn-danger' data-dismiss="modal" href='#'>Cancelar</a> 
      </div>
    </div>
  </div>