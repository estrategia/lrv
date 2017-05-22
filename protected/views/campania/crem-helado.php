<?php $this->pageTitle = "CremHelado - La Rebaja Virtual"; ?>
<?php
  $this->metaTags = "<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='La promoción de Crem Helado que viene con millones de paletas y miles de helados, si sacas el palito premiado puedes reclamar tu premio, ya sea paleta o gafas.'>
  <meta name='keywords' content='crem helado, productos cremhelado, helados crem helado.'>
  <style>
    .img-responsive-m {width:100%;}
    .sidebar-cart {position: fixed;right: 0px;top: 60%;z-index: 2000;}
    .background {position:relative;background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/crem-helado/desktop/fondo-naranja.png);}
    .bg-logos {background-color:#8ACCBE;padding: 20px;}
    .modal-header{background-color:  #e74521;color: #fff;}
    .close{color: #fff !important;text-shadow: none !important;}
    .embed-container {position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;}
    .embed-container iframe {position: absolute;top:0;left: 0;width: 100%;height: 100%;}
    .video {width: 50%;margin: 20px auto 0px;}
    .background-m {position:relative;background-size: cover;background-image:url(".Yii::app()->request->baseUrl."/images/contenido/crem-helado/mobile/fondo.png);}
  </style>
  ";
?>
<script type="text/javascript">
  function click(texto){
    $('<div>').mdialog({
        content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>"+
        "<strong style='color:#e74521'>Términos y condiciones:</strong><br>"+
          "Mecanica: válida del 15 de mayo al 1 de agosto de 2017. Participan las paletas bajo la marca crem helado*. Se entregarán 1.000.000 de paletas  y 20.000 gafas. Podrás encontrar palitos ganadores con las siguientes frases: “ganaste 1 paleta lenguiletta”, “ganaste 1 paleta aloha agua”, “ganaste 1 helado casero” para reclamar de forma inmediata en puntos autorizados. Para reclamar cualquier premio deberás presentar el palito que certifica que eres ganador. Consulta condiciones y restricciones en www.cremhelado.com.co. Para consultas, reclamos o ampliar información, deberá comunicarse con la línea de servicio al cliente de meals de colombia S.A.S. Al 018000511835 a nivel nacional, o al (1)4578555 en la ciudad de bogotá. Promoción adelantada por meals de colombia s.a.s válida en todo el territorio nacional."+
        "</div></div>"
    });
  }
</script>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<!--Version movil-->
<div class="background">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/banner.png" alt="Gafa mania">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/como-ganar.png" alt="Cómo ganar">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/step01.png" alt="Compra">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/step02.png" alt="Busca">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/step03.png" alt="Reclama">
  <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=paleta" data-ajax="false">
    <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/premios.png" alt="Premios">
  </a>
  <img class="img-responsive-m" style="margin-top: -20px;margin-left: 10px;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/como-vienen-los-palitos.png" alt="Como vienen los palitos marcados">
  <img class="img-responsive-m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/reconoce-los-puntos-de-canje.png" alt="Reconoce los puntos de canje">
  <a href="javascript:click('texto')" >
    <img class="img-responsive-m" style="margin:0 auto;cursor:pointer;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/boton-terminos-y-condiciones.png" alt="boton-terminos-y-condiciones">
  </a>
  <div class="video" style="width: 90%;">
    <div class="embed-container">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/q_eEOoUEy90?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  <img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/www.png" alt="Sitio web">
  <div class="bg-logos">
    <div class="ui-grid-a">
      <div class="ui-block-a"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/artesanal.png"></div>
      <div class="ui-block-b"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/jet.png"></div>
    </div>
    <div class="ui-grid-a">
      <div class="ui-block-a"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/pasion.png"></div>
      <div class="ui-block-b"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/lenguiletta.png" ></div>
    </div>
    <div class="ui-grid-a">
      <div class="ui-block-a"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/paleta-3.png"></div>
      <div class="ui-block-b"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/aloha.png"></div>
    </div>
    <div class="ui-grid-a">
      <div class="ui-block-a"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/casero.png"></div>
      <div class="ui-block-b"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/hobby.png"></div>
    </div>
    <div class="ui-grid-a">
      <div class="ui-block-a"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/fruti.png"></div>
      <div class="ui-block-b"><img class="img-responsive-m" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/mobile/polet.png"></div>
    </div>
  </div>
</div>
<!--Versión escritorio-->
<?php else: ?>
<a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=paleta">
  <div class="sidebar-cart"><img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/btn-sticky.png" alt="Compra online"></div>
</a>
<div class="background">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/banner.png" alt="Gafa mania">
  <img class="img-responsive" style="position: absolute;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/como-ganar.png" alt="Cómo ganar">
  <a href="<?= Yii::app()->request->baseUrl ?>/catalogo/buscar?busqueda=paleta">
    <img class="img-responsive" style="margin-top: 36%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/premios.png" alt="Premios">
  </a>
  <img class="img-responsive" style="position: absolute;top: 55%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/como-vienen-los-palitos.png" alt="Cómo vienen los palitos">
  <img class="img-responsive" style="margin-top: 15%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/reconoce-los-puntos-de-canje.png" alt="Reconoce los puntos de canje">
  <a data-toggle="modal" data-target="#modal">
    <img class="img-responsive" style="margin:0 auto;cursor:pointer;width: 30%;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/boton-terminos-y-condiciones.png" alt="boton-terminos-y-condiciones">
  </a>
  <div class="video">
    <div class="embed-container">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/q_eEOoUEy90?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  <img class="img-responsive" style="margin:0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/www.png" alt="Sitio web">
  <div class="bg-logos">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/crem-helado/desktop/logos.png" alt="Logos">
  </div>
</div>
<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Términos y condiciones</h4>
      </div>
      <div class="modal-body">
        <p style="text-align: justify;">Mecanica: válida del 15 de mayo al 1 de agosto de 2017. Participan las paletas bajo
          la marca crem helado*. Se entregarán 1.000.000 de paletas  y 20.000 gafas. Podrás encontrar
          palitos ganadores con las siguientes frases: “ganaste 1 paleta lenguiletta”, “ganaste 1 paleta
          aloha agua”, “ganaste 1 helado casero” para reclamar de forma inmediata en puntos autorizados.
          Para reclamar cualquier premio deberás presentar el palito que certifica que eres ganador.
          Consulta condiciones y restricciones en www.cremhelado.com.co. Para consultas, reclamos o
          ampliar información, deberá comunicarse con la línea de servicio al cliente de meals de colombia S.A.S.
          Al 018000511835 a nivel nacional, o al (1)4578555 en la ciudad de bogotá. Promoción adelantada por
          meals de colombia s.a.s válida en todo el territorio nacional.</p>
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio
<?php endif; ?>
