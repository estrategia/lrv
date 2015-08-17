<div class="ui-content">
    <div class="cont_welcome">
        <div class="cwl_img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_lrv.png"></div>
        <div class="cwl_txt">
            <h1>BIENVENIDO</h1>
            <h1 class="txt_nom"><?php echo "$objUsuario->nombre $objUsuario->apellido" ?></h1>
            <p><?php echo $objUsuario->objPerfil->mensajeBienvenida ?></p>
        </div>
    </div>
    <div class="c_vnrg">
        <h2 class="c_t_vnrg">Ahora disfrutarás:</h2>
        <ul data-role="listview" data-inset="true" class="c_list_ventajas">
            <li><a href="#" class="ui-btn ui-icon-carat-r ui-btn-icon-left ui-nodisc-icon ui-alt-icon c_listvn_a">Descuentos permanentes</a></li>
            <li><a href="#" class="ui-btn ui-icon-carat-r ui-btn-icon-left ui-nodisc-icon ui-alt-icon c_listvn_a">Paga tus pedidos en efectivo</a></li>
        </ul>
    </div>    
    <?php echo CHtml::link('Continuar', $url, array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax'=>'false')); ?>
</div>