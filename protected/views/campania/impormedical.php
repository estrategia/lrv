<?php $this->pageTitle = "Impormedical - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content=''>
  <meta name='keywords' content=''>
  <style>
    /* --- Estilos Footer general --- */
    @font-face {font-family:HelveticaNeueLight; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueLight.ttf);}
    @font-face {font-family:HelveticaNeue-BlackCond; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeue-BlackCond.otf);}
    @font-face {font-family:HelveticaNeueItalic; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueItalic.ttf);}
    @font-face {font-family:HelveticaNeueBold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/pantene/fonts/HelveticaNeueBold.ttf);}
    .space-1 {height: 0px !important;}
    .img-responsive-m {width:100%;}
    .programa-hora {font-size: 15px;}
    .programa-hora .span1 {font-family:HelveticaNeueLight;color:#363636;}
    .programa-hora .span2 {font-family:HelveticaNeue-BlackCond;color: #BF1A24;font-size: 16px;letter-spacing: 1px;margin-left2px;}
    .programa-hora .span3{color:#717175;font-family:HelveticaNeueItalic;font-weight: bold;}
    .programa-hora .content {display: flex;width: 100%;flex-direction: row;max-width: 100%;flex-wrap: wrap;margin: 0 auto;}
    .programa-hora .content .seccion1 {padding-left: 100px;width: 60%;background-color: #C9C8C6;position: relative;}
    .programa-hora .content .seccion1:after {position: absolute;right: 0px;content: '';height: 0px;border-style: solid;border-width: 0 0 23px 28px;border-color: #BF1A24 #BF1A24 #BF1A24 #C9C8C6;top: 0;}
    .programa-hora .content .seccion2 {width: 40%;background-color: #BF1A24;padding-right: 100px;}
    .programa-hora .content .seccion1-m {background-color: #C9C8C6;padding: 15px;text-align: center;}
    .programa-hora .content .seccion2-m {background-color: #BF1A24;width: 100%;padding: 15px;}
    .agradecimiento {font-family: HelveticaNeueLight;color: #fff;text-align: center;font-size: 16px;}
    .agradecimiento span {font-family:HelveticaNeue-BlackCond;letter-spacing:1px;}
    a:hover, a:active, a:focus {outline: none !important;}

    /* --- Estilos impormedical --- */
    @font-face {font-family:Roboto-Regular; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/impormedical/fonts/Roboto-Regular.ttf);}
    @font-face {font-family:Roboto-Medium; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/impormedical/fonts/Roboto-Medium.ttf);}
    @font-face {font-family:Roboto-Bold; src: url(" . Yii::app()->request->baseUrl . "/images/contenido/impormedical/fonts/Roboto-Bold.ttf);}
    .landing-impormedical{font-family:Roboto-Regular}
    .banner{width:100%;background-size:cover}
    .primera-seccion{background:url(".Yii::app()->request->baseUrl."/images/contenido/impormedical/img_fondo_seccion_titulo.jpg) no-repeat center;width:100%;background-size:cover;height:215px;border-bottom:9px solid #f2662a}
    .megacontainer{width:100%;max-width:1100px;margin:0 auto}
    .primera-seccion h1{margin:0 auto;padding-top:30px;text-align:center;color:#F2672A;font-family:Roboto-Medium;}
    .primera-seccion p{text-align:justify;width:50%;margin:9px auto}
    .contenedor-flex{display:-webkit-box;display:-ms-flexbox;display:flex}
    .contenedorconsombra{-webkit-box-shadow:0 11px 22px 0 rgba(0,0,0,0.3);box-shadow:0 11px 22px 0 rgba(0,0,0,0.3);cursor:pointer}
    .contenedor-flex .item{width:33.33%;padding:33px;text-align:center}
    .hovertexto{background:#fff;margin-top:0;padding:30px;padding-top:2px;color:#F2672A;padding-bottom:15px}
    .hovertexto:hover{background-color:#F2672A;color:#FFF}
    .content-info{display:-webkit-box;display:-ms-flexbox;display:flex;margin-top:20px}
    .hovertexto.active{background-color:#F2672A;color:#fff;}
    .hovertexto h3 {font-size: 22px;}
    .first-column{width:35%}
    .second-column{width:65%}
    .second-column h3{color:#F2672A}
    .second-column p{color:grey}
    .cuadros-colores{display:-webkit-box;display:-ms-flexbox;display:flex}
    .color-azul{background:#88d0ff;margin-right:10px;width:60px;height:50px}
    .color-purpura{background:#8f12fd;margin-right:10px;width:60px;height:50px}
    .color-futcia{background:#fb01e3;margin-right:10px;width:60px;height:50px}
    .color-gris{background:#ccc;margin-right:10px;width:60px;height:50px}
    .color-rosado{background:#ffbbba;width:60px;height:50px}
    .letradeloscolores{text-align:center;font-size:14px;color:#444}
    .section-compra{display:-webkit-box;display:-ms-flexbox;display:flex}
    .section-compra h2{font-size:48px;color:#F58A5B}
    .columna-precio{width:50%}
    .columna-boton{padding:30px}
    .boton-compra{border:none;font-size:25px;padding:5px 40px;background:#F2672A;color:#fff}
    .contenedor-productos{margin-top: 20px; justify-content: space-between;display:-webkit-box;display:-ms-flexbox;display:flex}
    .contenedor-productos2{display:-webkit-box;display:-ms-flexbox;display:flex}
    .contenedor-producto{width:20%; background:#F4F4F4;padding:10px;-webkit-box-shadow:0 11px 22px 0 rgba(0,0,0,0.3);box-shadow:0 11px 22px 0 rgba(0,0,0,0.3); margin: 0 10px;}
    .centradotitulo{color:#F2672A;text-align:center}
    .div-flex{display:-webkit-box;display:-ms-flexbox;display:flex;flex-flow: wrap;}
    .div-colores{display:-webkit-box;display:-ms-flexbox;display:flex}
    .textocolorproducto{margin-right:15px;font-size:13px}
    .color-negro {background:#000;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-aguamarina{background:#87d0ff;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-azulobscuro{background:#3632b5;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-ceruleo{background:#014697;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-rojo-profundo{background:#f20513;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-verdeclaro{background:#5bce90;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-rojo{background:red;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-naranja{background:#f0672a;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-verdeclaro{background:#b6e984;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .color-azulaguamarina{background:#00bbcf;width:25px;height:25px;margin-top:25%;margin-right:10px}
    .div-precio{padding:20px;text-align:center;font-size:30px;color:#F2672A}
    .div-boton-precio{width:100%;margin:0 auto;margin-bottom:20px}
    .div-boton-precio button{border:none;font-size:18px;padding:10px 40px;background:#014594;color:#fff;cursor:pointer;width:100%;}
    .vertodos{margin:48px auto;text-align:center;font-size:30px;text-decoration:underline;color:#F2672A}
    .info-footer{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-shadow:0 11px 22px 0 rgba(0,0,0,0.3);box-shadow:0 11px 22px 0 rgba(0,0,0,0.3);background:#FFF;margin:5% auto}
    .footertexto{width:50%;padding:20px 50px}
    .footertexto h1{font-size:45px;color:#F2672A;font-family: Roboto-Bold;}
    .footertexto span{font-size:24px;color:#F2672A;text-decoration:underline}
    .banner-footer{margin:50px auto;display:block}
    .contacto-flex{display:-webkit-box;display:-ms-flexbox;display:flex;width:64%;margin:0 auto}
    .titulo-encuentranos{font-size:25px;color:#F2672A}
    .iconored{display:-webkit-box;display:-ms-flexbox;display:flex;margin-left:60px;margin-bottom:20px}
    .iconored p{font-size:15px;margin:10px}
    .linkgmd{font-size:25px;text-align:center;margin:20px auto;color:#636363;text-decoration:underline;letter-spacing:10px}
    .owl-theme .owl-controls .owl-page span {background-color: #014594 !important;}
  </style>
";
?>
<script type="text/javascript">
  $( document ).ready(function() {
    $( 'div[data-role="boton-menu"]' ).click(function() {
      var boton = $(this);
      var idTabla = boton.attr('data-id');
      var selector = 'div[data-role="info-producto"][data-id="'+idTabla+'"]';
      $('div[data-role="info-producto"]').addClass('hidden');
      $(selector).removeClass('hidden');
    });
    $( 'div[data-role="boton-menu"]' ).click(function() {
      var boton = $(this);
      var idTabla = boton.attr('data-id');
      var selector = 'div[data-role="boton-menu"][data-id="'+idTabla+'"]';
      $('div[data-role="boton-menu"]').removeClass('active');
      $(selector).addClass('active');
    });
  });
</script>
<!-- VERSION MOVIL -->
<?php if ($this->isMobile): ?>
<div class="landing-impormedical">
  <img class="img-responsive banner" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_banner_ppal.jpg" alt="Para eliminar las imperfecciones">
  <section class="primera-seccion" style="height: initial;">
    <h1 style="font-size:35px; line-height: 42px;">Dispositivos para Profesionales de la Salud</h1>
    <p style="width: 90%;margin-bottom: 25px;color:#8B8B8B;text-align:center;">
      Nuestro amplio portafolio de soluciones para profesionales de la salud, facilita la calidad en el servicio y favorece el cuidado de la salud en lo usuarios. La marca GMD brinda innovación, variedad de colores, variedad de productos, dentro de estos podemos encontrar fonendoscopios, tensiómetros, kit de órganos y sentidos, termómetros, martillos, linternas, entre otros.
    </p>
  </section>
  <div class="megacontainer">
    <div class="contenedor-flex" style="flex-direction: column;">
      <div class="item" style="width: 83%;">
        <div class="contenedorconsombra">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_diagnostico.jpg" alt="Para eliminar las imperfecciones">
            <div class="hovertexto active">
              <h3 style="color:#fff;margin-bottom: 0;">Instrumentos de <br> Diagnóstico</h3>
            </div>
          </div>
      </div>

      <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle contenedor-productos">
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
              <div class="column">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_1.jpg" alt="Para eliminar las imperfecciones">
                <h4 class="centradotitulo"> Kit de Tensiómetro + Fonendoscopio Rappaport GMD </h4>
                <div class="div-flex" style="flex-direction:column;">
                  <div class="colum1">
                    <span class="textocolorproducto">Colores disponibles:</span>
                  </div>
                  <div class="column2">
                    <div class="div-colores" style="justify-content: center;">
                      <div class="item-color"><div class="color-ceruleo"></div></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="div-precio">
                  <strong>$00000</strong>
                </div>
                <div class="div-boton-precio">
                  <a href="#"><button>Comprar</button></a>
                </div>
              </div>
          </div>
        </div>
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
              <div class="column">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_2.jpg" alt="Para eliminar las imperfecciones">
                <h4 class="centradotitulo">Martillo de Reflejo Buck GMD <br></br></h4>
                <div class="div-flex" style="flex-direction:column;">
                  <div class="colum1">
                    <span class="textocolorproducto">Colores disponibles:</span>
                  </div>
                  <div class="column2">
                    <div class="div-colores" style="justify-content:center;">
                      <div class="item-color"><div class="color-ceruleo"></div></div>
                      <div class="item-color"><div class="color-rojo-profundo"></div></div>
                      <div class="item-color"><div class="color-negro"></div></div>
                      <div class="item-color"><div class="color-verdeclaro"></div></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="div-precio">
                  <strong>$00000</strong>
                </div>
                <div class="div-boton-precio">
                  <a href="#"><button>Comprar</button></a>
                </div>
              </div>
            </div>
        </div>
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_3.jpg" alt="Para eliminar las imperfecciones">
              <h4 class="centradotitulo"> Linterna de Diagnóstico GMD <br></br></h4>
              <div class="div-flex">
                <div class="colum1" style="width:100%;">
                  <span class="textocolorproducto">Descripción: <br> Incorpora tecnología luz LED </span>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$0000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_4.jpg" alt="Para eliminar las imperfecciones">
              <h4 class="centradotitulo"> Kit de Órganos y Sentidos con Fibra Óptica GMD <br></br></h4>
              <div class="div-flex">
                <div class="colum1" style="width:100%;">
                  <span class="textocolorproducto">Descripción: <br> Dos bases, dos cabezales</span>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$0000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_5.jpg" alt="Para eliminar las imperfecciones">
              <h4 class="centradotitulo"> Termómetros Digitales  <br></br></h4>
              <div class="div-flex">
                <div class="colum1" style="width:100%;">
                  <span class="textocolorproducto">Modelos:<br> Rana, Oso, Flex II, Tempo II </span>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$0000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="item" style="width: 83%;">
        <div class="contenedorconsombra">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_quirurgicos.jpg" alt="Para eliminar las imperfecciones">
          <div class="hovertexto active">
            <h3 style="color:#fff;margin-bottom: 0;">Instrumentos <br> Quirúrgicos</h3>
          </div>
        </div>
      </div>

      <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle contenedor-productos">
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
              <div class="column">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_6.jpg">
                <h4 class="centradotitulo">Sistema de Disección GMD  </h4>
                <div class="div-flex">
                  <div class="colum1" style="width:100%;">
                    <span class="textocolorproducto">Descripción: <br> Todas sus piezas están fabricadas en acero inoxidable. </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="div-precio">
                  <strong>$00000</strong>
                </div>
                <div class="div-boton-precio">
                  <a href="#"><button>Comprar</button></a>
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="item" style="width: 83%;">
        <div class="contenedorconsombra">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_prehospitalaria.jpg" alt="Para eliminar las imperfecciones">
            <div class="hovertexto active">
              <h3 style="color:#fff;margin-bottom: 0;">Instrumentos de Atención Prehospitalaria</h3>
            </div>
        </div>
      </div>

      <div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle contenedor-productos">
        <div class="item" style="margin:0 35px 50px;width:83%;padding: 0;">
          <div class="content contenedor-producto" style="width: 85%;">
              <div class="column">
                <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_7.jpg">
                <h4 class="centradotitulo"> Tijeras GMD  </h4>
                <div class="div-flex">
                  <div class="colum1" style="width:100%;">
                    <span class="textocolorproducto">Descripción: <br> Tijera trauma corta todo </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="div-precio">
                  <strong>$0000</strong>
                </div>
                <div class="div-boton-precio">
                  <a href="#"><button>Comprar</button></a>
                </div>
              </div>
            </div>
        </div>
      </div>
  </div>

  <div class="info-footer" style="flex-direction: column;">
    <div class="column footerimagen">
      <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_banner_prevencion.jpg" alt="Para eliminar las imperfecciones">
    </div>
    <div class="column footertexto" style="width: 85%; margin: 0 25px;padding: 0;">
      <h1 style="text-align:center;font-size: 45px;line-height: 40px;">Controlas la Presión con Exactitud</h1>
      <p style="color:#828282;text-align:center;">Conoce más sobre los productos de Control y Prevención <a style="color:#F2672A; text-decoration:underline;" href="#">aquí</a> </p>
    </div>
  </div>

  <div class="contacto">
    <img class="img-responsive-m banner-footer" style="max-width: 326px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_iconos_footer_m.png" alt="Para eliminar las imperfecciones">
    <div class="contacto-flex" style="width: 100%; flex-direction: column;align-items: center;">
      <div class="titulo-encuentranos" style="text-align: center;margin: 0 0 25px;"><span>Encuéntranos:<span></div>
      <div class="item iconored" style="margin: 0 0 25px;text-align: center;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/facebook-logo.png" alt="Para eliminar las imperfecciones">
        <p style="color: #626262;">GMD - Diagnóstico</p>
      </div>
      <div class="item iconored" style="margin: 0 0 25px;text-align: center;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/instagram-logo.png" alt="Para eliminar las imperfecciones">
        <p style="color: #626262;">@gmddiagnostico</p>
      </div>
    </div>
    <div class="linkgmd" style="font-size: 19px;margin-bottom:25px;"><strong>www.gmd.com.co</strong></div>
  </div>
  </div>
</div>



<section class="programa-hora">
  <div class="content">
    <div class="seccion1-m" style="margin: -5px;">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2-m">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
</section>
<div style="margin-top:30px;padding:0 15px;">
  <div style="padding: 0 25%;">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-mobile.png" alt="Chat en linea">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-mobile.png" alt="pqrs">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-mobile.png" alt="Linea gratuita">
    <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
    <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
  </div>
</div>
<!--FIN VERSION MOVIL-->

<!--VERSION DE ESCRITORIO-->
<?php else: ?>
<div class="landing-impormedical">
  <img class="img-responsive banner" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_banner_ppal.jpg" alt="Para eliminar las imperfecciones">
  <section class="primera-seccion">
    <h1>Dispositivos para Profesionales de la Salud</h1>
    <p>Nuestro amplio portafolio de soluciones para profesionales de la salud, facilita la calidad en el servicio y favorece el cuidado de la salud en lo usuarios. La marca GMD brinda innovación, variedad de colores, variedad de productos, dentro de estos podemos encontrar fonendoscopios, tensiómetros, kit de órganos y sentidos, termómetros, martillos, linternas, entre otros. </p>
  </section>
  <div class="megacontainer">
    <div class="contenedor-flex">
      <div class="item">
        <div class="contenedorconsombra">
          <img class="img-responsive" style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_diagnostico.jpg" alt="Para eliminar las imperfecciones">
            <div class="hovertexto active" data-role="boton-menu" data-id="1">
              <h3>Instrumentos de Diagnóstico</h3>
            </div>
        </div>
      </div>
      <div class="item">
        <div class="contenedorconsombra">
          <img class="img-responsive" style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_quirurgicos.jpg" alt="Para eliminar las imperfecciones">
          <div class="hovertexto" data-role="boton-menu" data-id="2">
              <h3>Instrumentos Quirúrgicos</h3>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="contenedorconsombra">
          <img class="img-responsive" style="width:100%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_prehospitalaria.jpg" alt="Para eliminar las imperfecciones">
          <div class="hovertexto" data-role="boton-menu" data-id="3">
            <h3>Instrumentos de Atención Prehospitalaria</h3>
          </div>
        </div>
      </div>
    </div>
    <div data-role="info-producto" data-id="1">
      <div class="content-info" style="margin-bottom:30px;">
        <div class="first-column">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_destacado.png" alt="Para eliminar las imperfecciones">
        </div>
        <div class="second-column">
          <h3>Kit de Tensiómetro + Fonendoscopio Rappaport GMD</h3>
          <p>Es un instrumento de diagnóstico para la medición de la presión arterial y auscultaciones en general</p>
          <p>Diseño y colores innovadores en presentación de estuche para fácil transporte y almacenamiento</p>
          <div class="contenedor-colores">
            <h4 style="Color:#444444;">Colores  Disponibles:</h4>
            <div class="cuadros-colores">
              <div class="item">
                <div class="color-ceruleo"></div>
                <span class="letradeloscolores">Azul Cerúleo</span>
              </div>
            </div>
            <div class="section-compra">
              <div class="column columna-precio"><h2>$00000</h2></div>
              <div class="column columna-boton"><a href="#"><button class="boton-compra">Compra</button></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="contenedor-productos">
        <div class="content contenedor-producto" >
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_1.jpg" alt="Para eliminar las imperfecciones">
              <h4 class="centradotitulo"> Kit de Tensiómetro + Fonendoscopio Rappaport GMD </h4>
              <div class="div-flex" style="flex-direction:column;">
                <div class="colum1">
                  <span class="textocolorproducto">Colores disponibles:</span>
                </div>
                <div class="column2">
                  <div class="div-colores">
                    <div class="item-color">
                      <div class="color-ceruleo"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$00000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>
        <div class="content contenedor-producto">
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_2.jpg" alt="Para eliminar las imperfecciones">
              <h4 class="centradotitulo">Martillo de Reflejo Buck GMD <br> &nbsp;</h4>
              <div class="div-flex">
                <div class="colum1">
                  <span class="textocolorproducto">Colores disponibles:</span>
                </div>
                <div class="column2">
                  <div class="div-colores">
                    <div class="item-color">
                      <div class="color-ceruleo"></div>
                    </div>
                    <div class="item-color">
                      <div class="color-rojo-profundo"></div>
                    </div>
                    <div class="item-color">
                      <div class="color-negro"></div>
                    </div>
                    <div class="item-color">
                      <div class="color-verdeclaro"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$00000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>
        <div class="content contenedor-producto">
          <div class="column">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_3.jpg" alt="Para eliminar las imperfecciones">
            <h4 class="centradotitulo"> Linterna de Diagnóstico GMD <br> &nbsp;</h4>
            <div class="div-flex">
              <div class="colum1">
                <span class="textocolorproducto">Descripción: <br> Incorpora tecnología luz LED </span>
              </div>
              <div class="column2">
                <div class="div-colores">
                  </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="div-precio">
              <strong>$0000</strong>
            </div>
            <div class="div-boton-precio">
              <a href="#"><button>Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="content contenedor-producto">
          <div class="column">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_4.jpg" alt="Para eliminar las imperfecciones">
            <h4 class="centradotitulo"> Kit de Órganos y Sentidos con Fibra Óptica GMD</h4>
            <div class="div-flex">
              <div class="colum1">
                <span class="textocolorproducto">Descripción: <br> Dos bases, dos cabezales</span>
              </div>
              <div class="column2">
                <div class="div-colores">
                  <div class="item-color">
                    <div class="color-enblanco">
                    </div>
                  </div>
                  <div class="item-color">
                    <div class="color-enblanco">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="div-precio">
              <strong>$0000</strong>
            </div>
            <div class="div-boton-precio">
              <a href="#"><button>Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="content contenedor-producto">
          <div class="column">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_5.jpg" alt="Para eliminar las imperfecciones">
            <h4 class="centradotitulo"> Termómetros Digitales <br> &nbsp;</h4>
            <div class="div-flex">
              <div class="colum1">
                <span class="textocolorproducto">Modelos:</span><br>
                <span class="textocolorproducto">Rana, Oso, Flex II, Tempo II </span>
              </div>

            </div>
          </div>
          <div class="column">
            <div class="div-precio">
              <strong>$0000</strong>
            </div>
            <div class="div-boton-precio">
              <a href="#"><button>Comprar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden" data-role="info-producto" data-id="2">
      <div class="content-info">
        <div class="first-column">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_destacado02.png" alt="Para eliminar las imperfecciones">
        </div>
        <div class="second-column">
          <h3>Sistema de Disección GMD </h3>
          <p> Es un instrumento quirúrgico que contiene todos los elementos necesarios para llevar acabo estudios o procedimientos pequeños a nivel de anatomía o procedimientos incisivos</p>
          <p>Todos sus piezas están fabricadas en acero inoxidable </p>
          <p> Práctico estuche con cremallera   </p>
          <div class="contenedor-colores">
            <div class="section-compra">
              <div class="column columna-precio"><h2>$00000</h2></div>
              <div class="column columna-boton"><a href="#"><button class="boton-compra">Compra</button></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="contenedor-productos">
        <div class="content contenedor-producto">
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_6.jpg" >
              <h4 class="centradotitulo"> Sistema de Disección GMD </h4>
              <div class="div-flex">
                <div class="colum1">
                  <span class="textocolorproducto">Descripcion: <br> Todos sus piezas están fabricadas en acero inoxidable </span>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$0000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="hidden" data-role="info-producto" data-id="3">
      <div class="content-info">
        <div class="first-column">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_destacado03.png" alt="Para eliminar las imperfecciones">
        </div>
        <div class="second-column">
          <h3>Tijeras GMD </h3>
          <p>Tijera trauma corta todo.</p>
          <p>Utilizada principlamente en hospitales, clínicas, atención proehospitarlia, enfermería y primeros auxilios - Es un equipo indispensable en botiquines.</p>
          <p> Es un equipo indispensable en botiquines y maletines de primeros auxilios. </p>
          <div class="contenedor-colores">
            <div class="section-compra">
              <div class="column columna-precio"><h2>$00000</h2></div>
              <div class="column columna-boton"><a href="#"><button class="boton-compra">Compra</button></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="contenedor-productos">
        <div class="content contenedor-producto">
            <div class="column">
              <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_producto_7.jpg">
              <h4 class="centradotitulo"> Tijeras GMD </h4>
              <div class="div-flex">
                <div class="colum1">
                  <span class="textocolorproducto">Descripción: <br> Tijera trauma corta todo </span>
                </div>
                <div class="column2">
                  <div class="div-colores">

                  </div>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="div-precio">
                <strong>$0000</strong>
              </div>
              <div class="div-boton-precio">
                <a href="#"><button>Comprar</button></a>
              </div>
            </div>
          </div>

      </div>
    </div>
    <div class="info-footer">
      <div class="column footertexto">
        <h1>¿Controlas la Presión con Exactitud?</h1>
        <p style="color:#828282;font-size: 21px;">Conoce más sobre los productos de Control y Prevención <a href="#" style="color:#F2672A; text-decoration:underline;">aquí</a>  </p>
      </div>
      <div class="column footerimagen">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_banner_prevencion.jpg" alt="Para eliminar las imperfecciones">
      </div>
    </div>
    <div class="contacto">
      <img class="img-responsive banner-footer" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/img_iconos_footer.png" alt="Para eliminar las imperfecciones">
      <div class="contacto-flex">
        <div class="titulo-encuentranos"><span>Encuéntranos:<span></div>
        <div class="item iconored">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/facebook-logo.png" alt="Para eliminar las imperfecciones">
          <p>GMD - Diagnóstico</p>
        </div>
        <div class="item iconored">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/impormedical/instagram-logo.png" alt="Para eliminar las imperfecciones">
          <p>@gmddiagnostico</p>
        </div>
      </div>
      <div class="linkgmd"><strong>www.gmd.com.co</strong></div>
    </div>
  </div>
</div>
<section class="programa-hora">
  <div class="content">
    <div class="seccion1">
      <span class="span1">Ahora comprando en </span>
      <span class="span2">larebajavirtual.com</span>
      <span class="span3">, programa tu hora y lugar de entrega </span>
      <img style="margin-left: 2px;" width="25" height="18" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/carrito.png">
    </div>
    <div class="seccion2">
      <div class="agradecimiento">Gracias por comprar en <span>larebajavirtual.com</span></div>
    </div>
  </div>
</section>
<section style="background-color: #fff;">
  <div class="container" style="padding-top:30px;">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/chat-escritorio.png" alt="Chat en linea">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;">Chat en línea</p>
      </div>
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/pqrs-escritorio.png" alt="pqrs">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Sistema PQRS</p>
        <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">(preguntas, quejas, reclamos y solicitudes)</p>
      </div>
      <div class="col-sm-4" style="padding-right: 0;padding-left: 0;">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/pantene/linea-gratuita-escritorio.png" alt="Linea gratuita">
        <p style="font-family:HelveticaNeueBold;text-align:center;font-size: 20px;margin-top: 7px;margin-bottom:0px;">Línea gratuita</p>
        <p style="color:#7F7F7F;font-family:HelveticaNeueItalic;font-size: 12px;text-align: center;">01-8000-939900</p>
      </div>
    </div>
  </div>
</section>
<!--Fin versión escritorio -->
<?php endif; ?>
