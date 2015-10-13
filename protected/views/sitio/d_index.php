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
<!-- Slide -->
<section class="block">
    <div id="myCarousel" class="carousel slide" data-interval="false">
        <div class="carousel-inner">
            <div class="active item">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/banner1.png" alt="calidad servicio" />
            </div>
            <div class="item">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/banner2.png" alt="Ciudado salud" />
            </div>
            <div class="item">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/banner3.png" alt="Mundo bebes" />
            </div>
            <div class="item">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/banner4.png" alt="Jueves del bebé" />
            </div>
        </div>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        	<i class="prev-slide"></i>
        </a>
 		<a class="carousel-control right" href="#myCarousel" data-slide="next">
 			<i class="next-slide"></i>
 		</a>
    </div>
</section>

<!-- productos destacados -->
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
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3 border-right">
					<a href="#"><img class="img-responsive product-prom"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/coca-cola-.png" alt=""></a>
					<div class="content-txt">
						<a href="#"><span class="description">Gaseosa Coca Cola</span></a><br>
						<span>Botellas x 600ml</span>
					<p>
						<a href="#"><i class="star-on" title="5.0"></i></a>
						<a href="#"><i class="star-on" title="5.0"></i></a>
						<a href="#"><i class="star-on" title="5.0"></i></a>
						<a href="#"><i class="star-off" title="5.0"></i></a>
						<a href="#"><i class="star-off" title="5.0"></i></a>
					</p>
					</div>
				</div>
				<div class="col-md-3 border-right">
					<a href="#"><img class="img-responsive product-prom"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/acetaminofen.png" alt=""></a>
					<div class="content-txt">
						<a href="#"><span class="description">Acetaminofén </span></a><br>
						<span>Adultos x 500ml</span>
						<p>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-off" title="5.0"></i></a>
							<a href="#"><i class="star-off" title="5.0"></i></a>
						</p>
					</div>
				</div>
				<div class="col-md-3 border-right">
					<a href="#"><img class="img-responsive product-prom"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/pañales-pequenin.png" alt=""></a>
					<div class="content-txt">
						<a href="#"><span class="description">Pequeñin recien nacido </span></a><br>
						<span>Etapa 0 x 30 Unidades</span>
						<p>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-off" title="5.0"></i></a>
							<a href="#"><i class="star-off" title="5.0"></i></a>
						</p>
					</div>
				</div>
				<div class="col-md-3 ">
					<a href="#"><img class="img-responsive product-prom"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/condones-duo.png" alt=""></a>
					<div class="content-txt">
						<a href="#"><span class="description">Condones Duo </span></a><br>
						<span>Lubricado x 3 Unidades</span>
						<p>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-on" title="5.0"></i></a>
							<a href="#"><i class="star-off" title="5.0"></i></a>
							<a href="#"><i class="star-off" title="5.0"></i></a>
						</p>
					</div>

				</div>
				
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="sep"></div>
		</div>
	</div>
</section>

<!-- mundo bebes -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="content">
					<div class="head">
						<i class="ico-bebe"></i><span class="title-bebe">Mundo Bebes</span>
					</div>
					<img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/prom-mundo-bebe.png" alt="">
				</div>
			</div>
			<div class="col-md-8 product-bebes">
				
					<div class="col-md-4 border-right">
						<div class="col-md-12">
							<a href="#"><img class="imagen" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/babero-bebe.png"></a>
						</div>
						<div class="col-md-12">
							<div class="txt">
								<p>Babero bebé <br>
									<span class="price">$25.000</span> <br>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<p>Antés:<span>$16.000</span> <br>
							Ahorro:<span>$1.000</span></p>
						</div>
						<div class="col-md-6">
							<a href="#"><div class="button">Añadir<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/button-carrito.png" alt=""></div></a>
						</div>
					</div>
					<div class="col-md-4 border-right">
						<div class="col-md-12">
							<a href="#"><img class="imagen" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/locion-baby-jhonson.png"></a>
						</div>
						<div class="col-md-12">
							<div class="txt">
								<p>Loción baby jhonson<br>
									<span class="price">$15.000</span> <br>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<p>Antés:<span>$16.000</span> <br>
							Ahorro:<span>$1.000</span></p>
						</div>
						<div class="col-md-6">
							<a href="#"><div class="button">Añadir<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/button-carrito.png" alt=""></div></a>
						</div>
					</div>
					<div class="col-md-4 border-right">
						<div class="col-md-12">
							<a href="#"><img class="imagen" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/chupo-bebe.png"></a>
						</div>
						<div class="col-md-12">
							<div class="txt">
								<p>Chupo bebé<br>
									<span class="price">$25.000</span> <br>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<p>Antés:<span>$26.000</span> <br>
							Ahorro:<span>$1.000</span></p>
						</div>
						<div class="col-md-6">
							<a href="#"><div class="button">Añadir<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/button-carrito.png" alt=""></div></a>
						</div>
					</div>
				
				
				<div class="col-md-12">
						<br>
				</div>

					<div class="col-md-4 border-right">
						<div class="col-md-12">
							<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/pañitos-pequeñin.png"></a>
						</div>
						<div class="col-md-12">
							<div class="txt">
								<p>Pañitos pequeñin<br>
									<span class="price">$25.000</span> <br>
								</p>
							</div>
						</div>	
						<div class="col-md-6">
							<p>Antés:<span>$26.000</span> <br>
							Ahorro:<span>$1.000</span></p>
						</div>
						<div class="col-md-6">
							<a href="#"><div class="button">Añadir<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/button-carrito.png" alt=""></div></a>
						</div>
					</div>
					<div class="col-md-4 border-right">
						<div class="col-md-12">
							<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/tetero.png"></a>
						</div>
						<div class="col-md-12">
							<div class="txt">
								<p>Tetero bebé<br>
									<span class="price">$15.000</span> <br>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<p>Antés:<span>$16.000</span> <br>
							Ahorro:<span>$1.000</span></p>
						</div>
						<div class="col-md-6">
							<a href="#"><div class="button">Añadir<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/button-carrito.png" alt=""></div></a>
						</div>
					</div>
					<div class="col-md-4 border-right">
						<div class="col-md-12">
							<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/pañales-pequeñin.png"></a>
						</div>
						<div class="col-md-12">
							<div class="txt">
								<p>Pañales pequeñin<br>
									<span class="price">$25.000</span> <br>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<p>Antés:<span>$26.000</span> <br>
							Ahorro:<span>$1.000</span></p>
						</div>
						<div class="col-md-6">
							<a href="#"><div class="button">Añadir<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/button-carrito.png" alt=""></div></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Fin mundo bebes-->




<section>	
<br>
</section>



<!--fin slide-->