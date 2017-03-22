<?php $this->pageTitle = "Zahara - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='Zahara es una línea completa de productos para el cuidado y protección de la luz solar y artificial. Protección solar con ZAHARA para ti y tu familia.'>
    <meta name='keywords' content='protector solar zahara, cuidado de la piel, bloqueador solar'>
	<!-- styles -->
	<style>
		@font-face {
		    font-family: Romy;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/romy.ttf);
		}
		@font-face {
		    font-family:NewJune-Bold;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/coaspharma/zahara/fonts/NewJune-Bold_A.otf);
		}
		.sidebar-cart {position: fixed;right: 0px;top: 49%;z-index: 2000;}
    .background-pattern {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/zahara/background.jpg);background-size:cover;}
    .name-product {background-color: #212F5E;color: #fff;text-align: right;font-family: Romy;font-size: 40px;padding: 10px 30px;}
    .banner-producto {border-top: 8px solid #212F5E;}
    .descrip-product {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/coaspharma/zahara/pattern.jpg);background-size:100%;padding: 30px;}
    .text-descrip img {vertical-align: middle;}
    .text-descrip {font-family:NewJune-Bold;color: #232D5E;font-size: 19px;margin: 16px auto;}
    .space-1 {height: 0px !important;}
    .img-responsive {width:100%;}
	</style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<img class="img-responsive"  style="display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/banner.jpg" alt="Banner Zahara">
  <div class="background-pattern">
    <!-- PRODUCTO 1 -->
    <div style="padding: 7%;">
      <img class="img-responsive banner-producto" style="display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-protector-zahara-50.jpg" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="name-product" style="text-align: center;font-size: 25px;">Bloqueador Zahara adultos spf 50</div>
      <div class="descrip-product" style="padding: 10px;">
      <img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-zahara-50-movil.png" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="ui-grid-a" style="margin-top: 5%;">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico01.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip" style="margin-top: 16%;">Vitamina E.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico03.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip">Para todo tipo de climas.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico05.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip">Protege la piel 50 veces más.</p></div>
      </div>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 48768)) ?>"><img style="width: 90%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png"></a>
      </div>
    </div>
    <!-- PRODUCTO 2 -->
    <div style="padding: 7%;padding-top: 0%">
      <img class="img-responsive banner-producto" style="display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-bronceador-zahara.jpg" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="name-product" style="text-align: center;font-size: 27px;">Bronceador Zahara</div>
      <div class="descrip-product" style="padding: 10px;">
      <img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador-zahara-movil.png" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="ui-grid-a" style="margin-top: 5%;">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico01.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip" style="margin-top: 16%;">Aceite de jojoba y Vitamina E.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico02.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip">Contiene repelente de insectos.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico04.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip">Bronceador progesivo.</p></div>
      </div>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 11007)) ?>"><img style="width: 90%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png"></a>
      </div>
    </div>
    <!-- PRODUCTO 3 -->
    <div style="padding: 7%;padding-top: 0%">
      <img class="img-responsive banner-producto" style="display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-zahara-hids.jpg" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="name-product" style="text-align: center;font-size: 25px;">Protector solar zahara kids spf 50</div>
      <div class="descrip-product" style="padding: 10px;">
      <img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-kids-movil.png" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico07.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip">Filtros y pantallas solares.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico01.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip" style="margin-top: 17%;">Vitamina E.</p></div>
      </div>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 48769)) ?>"><img style="width: 90%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png"></a>
      </div>
    </div>
    <!-- PRODUCTO 4 -->
    <div style="padding: 7%;padding-top: 0%">
      <img class="img-responsive banner-producto" style="display: inherit;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-gel-hidratante-zahara.jpg" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="name-product" style="text-align: center;font-size: 25px;">Gel hidratante zahara</div>
      <div class="descrip-product" style="padding: 10px;">
      <img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/gel-hidratante-zahara-movil.png" alt="Bloqueador Zahara adultos spf 50 ">
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico06.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip">Aloe vera 100% natural.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico08.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip" style="margin-top: 11%;">Humecta y previene la descamación.</p></div>
      </div>
      <div class="ui-grid-a">
          <div class="ui-block-a" style="width: 40%;"><img style="margin: 0 auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico09.png"></div>
          <div class="ui-block-b" style="width: 60%;"><p class="text-descrip" style="margin-top: 17%;">Hidrata y relaja.</p></div>
      </div>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 29769)) ?>"><img style="width: 90%;margin: 20px auto;display: block;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png"></a>
      </div>
    </div>
  </div>
<!--Fin version movil-->

<!--Versión escritorio-->
<?php else: ?>
	<div class="sidebar-cart">
  	<a href="#">
  		<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/compra-online.png" alt="Comprar sol-or">
  	</a>
	</div>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/banner.jpg" alt="Banner Zahara">
  <div class="background-pattern">
    <div class="container" style="padding-top: 100px;">
      <div class="row">
        <!-- PRODUCTO 1 -->
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive banner-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-protector-zahara-50.jpg" alt="Bloqueador Zahara adultos spf 50 ">
          <div class="name-product">Bloqueador Zahara adultos spf 50</div>
          <div class="descrip-product">
            <div class="row">
              <div class="col-sm-5 col-md-5">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-zahara-50.png" alt="Bloqueador Zahara adultos spf 50 ">
              </div>
              <div class="col-sm-7 col-md-7" style="padding: 60px 0 0;">
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico01.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Vitamina E.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico03.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Para todo tipo <br> de climas.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico05.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Protege la piel <br> 50 veces más.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 48768)) ?>">
                        <img class="img-responsive" style="margin-top: 10%;width: 90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PRODUCTO 2 -->
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive banner-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-bronceador-zahara.jpg" alt="Bronceador Zahara adultos spf 50 ">
          <div class="name-product">Bronceador Zahara</div>
          <div class="descrip-product">
            <div class="row">
              <div class="col-sm-5 col-md-5">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/bronceador-zahara.png" alt="Bronceador Zahara ">
              </div>
              <div class="col-sm-7 col-md-7" style="padding: 60px 0 0;">
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico01.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Aceite de jojoba <br> y Vitamina E.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico02.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Contiene repelente <br> de insectos.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico04.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Bronceador <br> progesivo.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 11007)) ?>">
                        <img class="img-responsive" style="margin-top: 10%;width: 90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 60px;margin-bottom: 70px;">
        <!-- PRODUCTO 3 -->
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive banner-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-zahara-hids.jpg" alt="Protector solar zahara kids spf 50 ">
          <div class="name-product">Protector solar zahara kids spf 50</div>
          <div class="descrip-product">
            <div class="row">
              <div class="col-sm-5 col-md-5">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/protector-kids.png" alt="Protector solar zahara kids spf 50">
              </div>
              <div class="col-sm-7 col-md-7" style="padding: 60px 0 0;">
                <div style="height: 80px;"></div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico07.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Filtros y pantallas <br> solares.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico01.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Vitamina E.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 48769)) ?>">
                        <img class="img-responsive" style="margin-top: 10%;width: 90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PRODUCTO 4 -->
        <div class="col-sm-6 col-md-6">
          <img class="img-responsive banner-producto" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/foto-gel-hidratante-zahara.jpg" alt="Gel hidratante zahara">
          <div class="name-product">Gel hidratante zahara</div>
          <div class="descrip-product">
            <div class="row">
              <div class="col-sm-5 col-md-5">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/gel-hidratante-zahara.png" alt="Gel hidratante zahara">
              </div>
              <div class="col-sm-7 col-md-7" style="padding: 60px 0 0;">
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico06.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Aloe vera 100% <br> natural.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico08.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Humecta y previene <br> la descamación.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4" style="padding-right: 0px;">
                    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/ico09.png">
                  </div>
                  <div class="col-md-8" style="padding-left: 0px;">
                    <p class="text-descrip">Hidrata y relaja.</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 29769)) ?>">
                        <img class="img-responsive" style="margin-top: 10%;width: 90%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/coaspharma/zahara/boton.png">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Fin versión escritorio-->
<?php endif; ?>
