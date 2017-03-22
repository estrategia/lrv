<div class="modal animated bounceIn" id="modal-seleccion-ciudad">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row modal-logo">
                    <img class="" src="<?php echo Yii::app()->request->baseUrl . '/images/iconos/ubicacion-desktop/ciudad.png' ?>" alt="">
                    <h3 class="titulo-logo center">¿A dónde llevamos tu pedido?</h3>
                </div>
                <div class="row">
                    <div class="col-md-8 center-block" style="float: none !important;">
                        <div id="select-ubicacion-content">
                            <div id="select-ubicacion-psubsector">
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
                    <div class="col-md-9 center-block info-seleccion-ciudad" style="float: none !important;">
                        <div>
                            <ul class="info-seleccion-ciudad">
                                <li>
                                    <div class="item-texto">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <p>Paga contra entrega.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-texto">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <p>Entregamos cuando tú lo necesitas. </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="seleccionar-ciudad-legal">
                                <p align="justify" class="legal-seleccion-ciudad">Los precios de los productos pueden variar según la ciudad definida para la entrega o recogida del pedido.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer center">
                <button type="button" data-role="confirmar-ciudad" data-dismiss="modal" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>
