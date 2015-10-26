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


<?php foreach($modulosInicio as $ubicacionModulo):?>
        <section>
                <?php $objModulo = $ubicacionModulo->objModulo ?>
                <?php if($objModulo->tipo== 1):?>
                    <section class="block">
                        <div id="myCarousel" class="carousel slide" data-interval="false">
                            <div class="carousel-inner">
                                    <?php $i=0?>
                                    <?php foreach($objModulo->objImagenBanners as $imagenes):?>
                                    <div class="item <?php echo ($i==0)?'active':''?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl.$imagenes->rutaImagen; ?>" alt="calidad servicio" />
                                    </div>
                                        <?php $i++?>
                                    <?php endforeach;?>
                            </div>
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                    <i class="prev-slide"></i>
                            </a>
                                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                            <i class="next-slide"></i>
                                    </a>
                        </div>
                    </section>
                <?php elseif($objModulo->tipo == 2):?>
                    <section>
                            <div class="container">
                                    <div class="row-fluid">
                                            <div class="col-md-12 title">
                                                    <span><i class="glyphicon glyphicon-chevron-right"></i></span>
                                                    <strong class="productos-destacados">Productos destacados</strong>
                                            </div>
                                    </div>
                            </div>
                    </section>
                    <br>
                     <div id="owl-demo" class="owl-carousel">
                         
                            <?php foreach ($objModulo->objProductosModulos as $objProductosModulos): ?>
                                <?php $objProducto = $objProductosModulos->objProducto ?>
                                 <div class="item"><?php
                                 // hacer uso de _d_productoElemento
                                      
                                             $this->renderPartial('/catalogo/_d_productoElemento',array(
                                                                'data' => $objProducto,
                                                                'vista' => 'relacionado'
                                                              
                                             ));
                                 
                                            ?>
                                           
                                 </div>

                            <?php endforeach;?>
                       </div>
                    
                    
                <?php elseif($objModulo->tipo == 3):?>
                        <section>	
                            <div class="container">	
                                    <div class="row">	
                                            <div class="col-md-12">
                                                <?php foreach($objModulo->objImagenBanners as $imagenes):?>
                                                    <div class="col-md-4">
                                                            <a href="#"><img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl.$imagenes->rutaImagen;?>"></a>
                                                    </div>
                                                <?php endforeach?>
                                            </div>
                                    </div>
                            </div>
                        </section>
                <?php endif;?>
        </section>
        <br/>
<?php endforeach;?>

<section>	
<br>
</section>



<!--fin slide-->