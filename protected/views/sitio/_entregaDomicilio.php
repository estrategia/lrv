<div data-role="panel" id="panel-info-domicilio" data-position="right" data-display="overlay" class="cpanel_domicilio">
    <ul data-role="listview" data-inset="true" class="ui-list-panel">
        <li>
            <div class="cpnl_img_border_yllw">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/a_ubicacion.png">
            </div>

            <h2>1. Selecciona la ciudad</h2>
        </li>
        <li>
            <div class="cpnl_img_border_yllw">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/b_productos.png">
            </div>
            <h2>2. Encuentra lo que <br>estás buscando</h2>
        </li>
        <li>
            <div class="cpnl_img_border_yllw">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/c_confirmacion.png">
            </div>
            <h2>3. Confirma tu pedido.</h2>
            <p>Despacho - Entrega - Pago</p>
        </li>
        <li>
            <div class="cpnl_img_border_yllw">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/d_tiempo_entrega.png">
            </div>
            <h2>4. En el tiempo indicado<br> entregamos tu pedido</h2>
        </li>
    </ul>
    <a href="<?php echo CController::createUrl('/sitio/entrega', array('tipo' => Yii::app()->params->entrega['tipo']['domicilio'])) ?>" data-ajax="false" class="ui-btn ui-icon-domicilio ui-btn-icon-right ui-btn-domicilio ui-corner-all">S&iacute;, quiero que me lo <br>entreguen a domicilio.</a>
    <!-- <button data-rel="close" class="ui-btn  ui-corner-all ui-btn-b  ">Cerrar</button>-->
</div>