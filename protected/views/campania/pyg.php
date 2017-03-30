<?php $this->pageTitle = "P&G - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content='El Nuevo H&S Clinical Solutions combate la caspa severa y brinda hasta 7 días de protección desde la primera lavada, dejando el cabello con un aroma increíble. '>
    <meta name='keywords' content='Eliminar caspa, shampoo anticaspa, caspa severa.'>
	<!-- styles -->
	<style>
  @font-face {
      font-family: Gotham-Bold;
      src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pyg/Fonts/Gotham-Bold_0.otf);
  }
		@font-face {
		    font-family: Gotham-Medium;
		    src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pyg/Fonts/Gotham-Medium_0.otf);
		}
    @font-face {
        font-family: Gotham-Book;
        src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pyg/Fonts/Gotham-Book_0.otf);
    }
    .sidebar-cart {position: fixed;right: 0px;top: 65%;z-index: 2000;}
    .titleh2{color:#2BB2E9;text-align:center;text-transform:uppercase;font-weight:bolder;  font-family: Gotham-Medium;margin-top: 30px;margin-bottom: 30px;}
    .titleh2 span{font-size: 40px;font-weight: bolder;font-family: Gotham-Bold;}
    .bg-informacion{background-color:#054791;padding-bottom: 60px;}
    .subtitleh3 {font-family: Gotham-Medium;text-align: center;background-color: #fff;color:#054791;display: inline-block;padding: 10px 41px;margin: 50px 0px;}
    .contenedor-info {background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 85%, rgba(27,35,75,1) 85%, rgba(27,35,75,1) 74%);border-radius: 45px;overflow: hidden;padding: 0 !important;width: 55%;margin-right: auto;margin-left: auto;}
    .triangulo{width: 0;height: 0;border-right: 130px solid transparent;border-top: 100px solid transparent;border-left: 130px solid transparent;border-bottom: 70px solid #fff;margin: 0 auto;margin-top: -100px;}
    .bg-video{background-color:#45A4DC;padding: 35px;}
    .space-1 {height: 0px !important;}
    .forma{background-color: #EFEDEE;padding: 35px 24px 35px 68px;border-radius: 0px 70px 70px 0px;margin-left: 35px;box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.2);width: 90%;margin-bottom: 30px;}
    .forma p {color:#3C52A5;font-family: Gotham-Book;font-size: 38px;letter-spacing: -2px;line-height: 30px;}
    .forma.distinta{background-color: #fff;box-shadow: none;margin-bottom: 0;margin-top: 0px;}
    .ico{width: 40px;margin-right: 8px;}
    .contenedor-info .text {color:#D00177;font-weight:bolder;margin-left: 103px;font-size: 30px;margin-bottom: 25px;font-family: Gotham-Medium;letter-spacing: 2px;}
    .img-producto{margin-left: 21%;}
    .forma span {margin-left: 11%;}
    .ressete{padding: 0;}
    .empty{height: 100px;}
    .btn-comprar{margin-left: 27%;margin-top: 17%;position: absolute;}
    .img-responsive-m {width:100%;}
    .section { padding: 0px 10px;}
    .titleh2-m {color: #2BB2E9;text-align: center;text-transform: uppercase;font-weight: bolder;font-family: Gotham-Medium;margin-top: 15px;margin-bottom: 15px;font-size:11px;}
    .titleh2-m span {font-size: 13px;font-weight: bolder;font-family: Gotham-Bold;}
    .subtitleh3-m{font-family: Gotham-Medium;text-align: center;background-color: #fff;color: #054791;display: inline-block;padding: 10px 41px;margin: 30px 0px;width: 67%;font-size: 14px;}
    .triangulo-m {width: 0;height: 0;border-right: 60px solid transparent; border-top: 60px solid transparent;border-left: 60px solid transparent;border-bottom: 30px solid #fff;margin: 0 auto; margin-top: -50px;}
    .contenedor-info-m {background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 91%, rgba(27,35,75,1) 91%, rgba(27,35,75,1) 74%);border-radius: 45px;overflow: hidden;padding: 0 !important;width: 90%;margin-right: auto;margin-left: auto;}
    .producto-movil {width: 50%;display: block; margin: auto;margin-top: 30px;}
    .text-m {color: #D00177;font-weight: bolder;font-size: 18px;font-family: Gotham-Medium;letter-spacing: 2px;text-align: center;}
    .forma-m {background-color: #EFEDEE;padding: 5px 10px 5px 25px;border-radius: 0px 70px 70px 0px; margin-left: 0px;box-shadow: 2px 2px 3px 0px rgba(0,0,0,0.2);width: 88%;margin-bottom: 30px;}
    .forma-m p { color: #3C52A5;font-family: Gotham-Book; font-size: 18px; letter-spacing: -2px;}
    .ico-m { width: 23px; margin-right: 8px;}
    .btn-comprar-m { display: block; margin: 36px auto 23px; width: 70%;}
    video { width: 100%; height: auto;}
    @media (min-width: 1000px) and (max-width: 1600px) {
      .empty {height: 30px;}
      .contenedor-info .text {margin-left: 66px;font-size: 19px;}
      .forma {padding: 15px 24px 15px 21px;margin-left: 31px;margin-bottom: 15px;}
      .forma.distinta {margin-bottom: 15px;}
      .forma p {font-size: 26px;margin:0px;}
      .ico { width: 25px;}
      .btn-comprar { margin-left: 20%; margin-top: 19%; position: absolute; width: 75%;}
    }

    <!-- Google Code para etiquetas de remarketing -->
    <script type='text/javascript'>
    /* <![CDATA[ */
    var google_conversion_id = 864725823;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
    </script>
    <script type='text/javascript' src='//www.googleadservices.com/pagead/conversion.js'>
    </script>
    <noscript>
    <div style='display:inline;'>
    <img height='1' width='1' style='border-style:none;' alt='' src='//googleads.g.doubleclick.net/pagead/viewthroughconversion/864725823/?guid=ON&amp;script=0'/>
    </div>
    </noscript>


  </style>
";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<section>
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/banner.jpg" alt="head & soulders - clinical solutions">
</section>
<section class="section">
  <h2 class="titleh2-m">HASTA <span>7 DÍAS DE PROTECCIÓN</span> CONTRA LA CASPA SEVERA <span>desde la primera lavada</span></h2>
</section>
<div class="row bg-informacion">
  <center>
    <h3 class="subtitleh3-m">FÓRMULA CLINICAMENTE COMPROBADA CON SELENIUM SULFIDE.</h3>
  </center>
  <div class="triangulo-m"></div>
  <div class="contenedor-info-m">
    <img class="producto-movil" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/clinical-solution.png" alt="Shampoo clinical solution">
    <p class="text-m">Conoce todos los beneficios</p>
    <div class="forma-m">
      <p><img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/check.png">Está clínicamente comprobado.</p>
    </div>
    <div class="forma-m distinta">
      <p><img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/check.png">Alivio eficaz para la caspa severa.</p>
    </div>
    <div class="forma-m">
      <p><img class="ico-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/check.png">Cabello limpio, manejable y libre de escamas.</p>
    </div>
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115829)) ?>"><img class="btn-comprar-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/boton.png" alt=""></a>
  </div>
</div>
<div class="row bg-video">
  <center class="video">
    <video controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/poster-video.png">
      <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/pyg.mp4" type="video/mp4">
      Tu navegador no implementa el elemento <code>video</code>.
    </video>
  </center>
</div>
<!--Fin version movil-->

<!--Versión escritorio-->
<?php else: ?>
	<div class="sidebar-cart">
  	<a href="#">
  		<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/boton-sticky.png" alt="Comprar">
  	</a>
	</div>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/banner.jpg" alt="head & soulders - clinical solutions">
  <div class="container-fluid">
    <div class="row">
      <h2 class="titleh2">HASTA <span>7 DÍAS DE PROTECCIÓN</span> CONTRA LA CASPA SEVERA <span>desde la primera lavada</span></h2>
    </div>
    <div class="row bg-informacion">
      <center>
        <h3 class="subtitleh3">FÓRMULA CLINICAMENTE COMPROBADA CON SELENIUM SULFIDE.</h3>
      </center>
      <div class="triangulo"></div>
      <div class="contenedor-info">
        <div class="col-md-12" style="margin-top: 50px;margin-bottom: 40px;">
          <div class="col-md-4 ressete" style="z-index: 1;">
            <img class="img-producto img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/clinical-solution.png" alt="">
          </div>
          <div class="col-md-8 ressete">
            <div class="empty"></div>
            <p class="text">Conoce todos los beneficios</p>
            <div class="forma">
              <p><img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/check.png">Está clínicamente <br><span>comprobado</span>.</p>
            </div>
            <div class="forma distinta">
              <p><img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/check.png">Alivio eficaz para <br> <span>la caspa severa.</span></p>
            </div>
            <div class="forma">
              <p><img class="ico" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/check.png">Cabello limpio, manejable <br> <span>y libre de escamas.</span></p>
            </div>
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => 115829)) ?>"><img class="btn-comprar img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/boton.png" alt=""></a>
          </div>
          </div>
        </div>
      </div>
      <div class="row bg-video">
        <center>
          <video style="width: 55%;" controls poster="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/poster-video.png">
            <source src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pyg/pyg.mp4" type="video/mp4">
            Tu navegador no implementa el elemento <code>video</code>.
          </video>
        </center>
      </div>
    </div>
  </div>
<!--Fin versión escritorio-->
<?php endif; ?>
