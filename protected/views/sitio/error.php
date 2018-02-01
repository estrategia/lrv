<div class="ui-content">
    <div class="error-logo">
        <div class="col-12">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotop.png">
        </div>
    </div>

    <div class="info">
        <h1>404</h1>
        <p class="justify">Se present&oacute; una falla al cargar la p&aacute;gina que estabas buscando, es posible que la entreda haya sido eliminada o la direcci&oacute;n no exista. Pruebe dando click en inicio.</p>
        <p class="justify">No dejes de usar nuestros servicios.</p>
        <a href="<?php echo $this->createUrl('/sitio/inicio') ?>"><img class="ico" src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/volver.png"><span class="volver">Inicio</span></a>
    </div>
</div>
