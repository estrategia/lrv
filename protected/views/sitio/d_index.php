<?php /*

<div class="space-2"></div>
<div class="row">
    <div class="span">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio1.jpg" alt=""></a></div>

            </div>

            <div class="item">
              <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio2.jpg" alt=""></a></div>

            </div>

            <div class="item">
              <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio3.jpg" alt=""></a></div>

            </div>

          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
        
        <!-- Probar con la lista de productos -->
    </div>
</div>*/?>

<!-- Mirar como reutilizarla -->

<?php $this->renderPartial('/modulo/d_modulos',array(
                'listModulos' => $listModulos
));?>
<section>	
<br>
</section>

<!--fin slide-->