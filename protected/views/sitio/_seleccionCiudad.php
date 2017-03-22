<div id='seleccion-ciudad' data-role="page" data-dialog="true">
    <div data-role='main' class='ui-content'>
        <div class="modal-logo">
            <img class="" src="<?php echo Yii::app()->request->baseUrl . '/images/iconos/ubicacion-desktop/ciudad.png' ?>" alt="">
            <h3 class="titulo-logo center">¿A dónde llevamos tu pedido?</h3>
        </div>
        <div id="select-ubicacion-content" class="center-div">
            <div id="select-ubicacion-psubsector" class="center-div">
                <select data-role="ciudad-despacho-map">
                    <!--  <option value="">Ciudad ...</option> -->
                    <?php foreach ($listCiudadesSectores as $ciudad): ?>
                        <option data-latitud="<?php echo $ciudad->latitudGoogle ?>" data-longitud="<?php echo $ciudad->longitudGoogle ?>" value="<?php echo $ciudad->codigoCiudad ?>-0"><?php echo $ciudad->nombreCiudad ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="info-seleccion-ciudad" style="float: none !important;">
            <div>
                <ul class="info-seleccion-ciudad">
                    <li>
                        <div class="item-texto">
                            <span>&#10004;</span>
                            <p>Paga contra entrega.</p>
                        </div>
                    </li>
                    <li>
                        <div class="item-texto">
                            <span>&#10004;</span>
                            <p>Entregamos cuando tú lo necesitas. </p>
                        </div>
                    </li>
                </ul>
                <div class="seleccionar-ciudad-legal">
                    <p align="justify" class="legal-seleccion-ciudad">Los precios de los productos pueden variar según la ciudad definida para la entrega o recogida del pedido.</p>
                </div>
            </div>
        </div>

        <div class="page-footer center">
            <a href='#' class='ui-btn ui-btn-r ui-corner-all ui-shadow ui-mini float-left' data-rel='back'>Cancelar</a>
            <a href="#" class='ui-btn ui-btn-n ui-corner-all ui-shadow ui-mini float-right' data-role="confirmar-seleccion-ciudad">Confirmar</a>
        </div>
    </div>
</div>
