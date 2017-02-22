<div id='seleccion-ciudad' data-role="page">
    <div data-role='main' class='ui-content'>
        <div id="select-ubicacion-content" class="center-div">
            <div id="select-ubicacion-psubsector" class="center-div">
                <select data-role="ciudad-despacho-map" style="width: 100%">
                    <!--  <option value="">Ciudad ...</option> -->
                    <?php foreach ($listCiudadesSectores as $ciudad): ?>
                        <option data-latitud="<?php echo $ciudad->latitudGoogle ?>" data-longitud="<?php echo $ciudad->longitudGoogle ?>" value="<?php echo $ciudad->codigoCiudad ?>-0"><?php echo $ciudad->nombreCiudad ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="info-seleccion-ciudad">
            <ul class="info-seleccion-ciudad">
                <li>
                    <p>*Paga contra entrega.</p>
                </li>
                <li>
                    <p>*Entregamos cuando tú lo necesitas.</p>
                </li>
            </ul>
        </div>
        <p align="justify" class="legal-seleccion-ciudad">*Los precios de los productos pueden variar según la ciudad definida para la entrega o recogida del pedido.</p>

        <div class="page-footer center">
            <a style="width: 35%;" href='#' class='ui-btn ui-btn-r ui-corner-all ui-shadow ui-mini float-left' data-rel='back'>Cancelar</a>
            <a style="width: 35%;" href="#" class='ui-btn ui-btn-n ui-corner-all ui-shadow ui-mini float-right' data-role="confirmar-seleccion-ciudad">Confirmar</a>
        </div>
    </div>
</div>
