<div data-role="panel" id="panel-info-presencial" data-position="right" data-display="overlay" class="cpanel_pasarxel">
    <ul data-role="listview" data-inset="true" class="ui-list-panel">
        <li>
            <div class="cpnl_img_border_red">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/1_ubicacion.png">
            </div>

            <h2>1. Selecciona la ciudad</h2>
        </li>
        <li>
            <div class="cpnl_img_border_red">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/2_productos.png">
            </div>
            <h2>2. Encuentra lo que <br>estás buscando</h2>
        </li>
        <li>
            <div class="cpnl_img_border_red">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/3_puntoventa.png">
            </div>
            <h2>3. Selecciona el punto de<br> venta de tu conveniencia</h2>
        </li>
        <li>
            <div class="cpnl_img_border_red">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/4_alistar_pedido.png">
            </div>
            <h2>4. Alistamos tu pedido</h2>
        </li>
        <li>
            <div class="cpnl_img_border_red">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/5_tiempo_recoger.png">
            </div>
            <h2>5. En el tiempo indicado <br>pasa por él</h2>
        </li>
    </ul>
    <a href="<?php echo CController::createUrl('/sitio/entrega', array('tipo' => Yii::app()->params->entrega['tipo']['presencial'])) ?>" data-ajax="false" class="ui-btn ui-icon-presencial ui-btn-icon-right ui-btn-presencial ui-corner-all">S&iacute;, Quiero pasar <br>por el pedido.</a>
    <!--  <button data-rel="close" class="ui-btn  ui-corner-all ui-btn-b  ">Cerrar</button>-->
</div>