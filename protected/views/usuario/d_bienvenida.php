<div class="content_welcome">
    <div class="header_welcome">
        <div class="container">
            <h1><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl."/images/bienvenida/titulo_bievenida.png"; ?>" alt="Bienvenido"></h1>
            <h2><?php echo "$objUsuario->nombre $objUsuario->apellido" ?></h2>
            <div class="mensajeBienvenida"><?php echo $objUsuario->objPerfil->mensajeBienvenida ?></div>
        </div>
    </div>
    <div class="container">
    <div class="body_welcome">
        <h3>Ahora disfrutarás:</h3>
        <div class="row">
            <div class="col-sm-6 dis">
                <img src="<?php echo Yii::app()->request->baseUrl."/images/bienvenida/ico_b-1.png"; ?>" alt="Descuento permanentes">
                <strong>Descuentos</strong><br>permanentes
            </div>
            <div class="col-sm-6 dis">
                <img src="<?php echo Yii::app()->request->baseUrl."/images/bienvenida/ico_b-2.png"; ?>" alt="Paga tus pedidos en efectivo">
                <strong>Paga tus pedidos</strong><br>en efectivo<br> y contra entrega
            </div>
        </div>
    </div>
    <div class="center"><?php echo CHtml::link('Continuar', $url, array('class' => 'btn btn-primary')); ?></div>
    </div>
    <img src="<?php echo Yii::app()->request->baseUrl."/images/bienvenida/fondo_footer.png"; ?>" class="img-responsive" alt="">
</div>
