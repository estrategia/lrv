<div class="modal anumated bounceIn" id="modal-seleccion-ciudad">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Selecciona ciudad</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="select-ubicacion-content" class="center-div">
                            <div id="select-ubicacion-psubsector" class="center-div">
                                <select class="form-control" data-role="ciudad-despacho-map">
                                    <!--  <option value="">Seleccione ciudad ...</option> -->
                                    <?php foreach ($listCiudadesSectores as $ciudad): ?>
                                        <option data-latitud="<?php echo $ciudad->latitudGoogle  ?>" data-longitud="<?php echo $ciudad->longitudGoogle  ?>" value="<?php echo $ciudad->codigoCiudad ?>-0"><?php echo $ciudad->nombreCiudad ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 info-seleccion-ciudad">
                        <div>
                            <ul class="info-seleccion-ciudad">
                                <li>
                                    <p>*Paga contra entrega.</p>
                                </li>
                                <li>
                                    <p>*Entregamos cuando tú lo necesitas.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                        <p align="justify" class="legal-seleccion-ciudad">*Los precios de los productos pueden variar según la ciudad definida para la entrega o recogida del pedido.</p>
                <button type="button" data-role="confirmar-ciudad" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>