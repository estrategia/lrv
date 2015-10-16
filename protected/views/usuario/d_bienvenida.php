<div class="">
    <div class="">
      <!--  <div class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_lrv.png"></div> -->
        <div class="">
            <h1>BIENVENIDO</h1>
            <h1 class=""><?php echo "$objUsuario->nombre $objUsuario->apellido" ?></h1>
            <p><?php echo $objUsuario->objPerfil->mensajeBienvenida ?></p>
        </div>
    </div>
    <div class="">
        <h2 class="">Ahora disfrutarás:</h2>
        <ul data-role="listview" data-inset="true" class="">
            <li><a href="#" class="">Descuentos permanentes</a></li>
            <li><a href="#" class="">Paga tus pedidos en efectivo</a></li>
        </ul>
    </div>    
    <?php echo CHtml::link('Continuar', $url, array('class' => 'btn btn-default')); ?>
</div>