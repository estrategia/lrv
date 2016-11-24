
<?php $this->pageTitle = "Perros & Gatos | La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
  	<style>
      @font-face {
        font-family: Nautilus;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/nautilus.otf);
      }
      @font-face {
        font-family: HelveticaNeueLTStd-Lt;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/HelveticaNeueLTStd-Lt.otf);
      }
      @font-face {
        font-family: helvetica-bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/helvetica-bold.otf);
      }
      @font-face {
        font-family: Houndville;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/Houndville.ttf);
      }
      @font-face {
        font-family: NewJune-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/NewJune-Bold.otf);
      }
      .bg-pattern {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/pattern.png);background-repeat: no-repeat;background-size: cover;}
      .bg-orange{background-color:#E84E0E;}
      .bg-orange .titulo{color:#fff; text-align:center;margin:0;font-family: Nautilus;font-size:53px;padding: 25px 0px;}
      .m {font-size: 30px !important;}
      .bg-pattern .resset{padding: 0;}
      .bg-pattern .pie {text-align: center;color: #6A3D3A;margin-top: 20px;font-family: HelveticaNeueLTStd-Lt;font-size:17px;}
      .bg-pattern .subtitle {font-family: Houndville;font-size: 90px;letter-spacing: -5px;margin-top: 60px;}
      .boton-perro{background-color: #F7AB6F;margin: 0;border-radius: 33px;line-height: 36px;font-size: 15px;margin-bottom: 15px;padding: 3px 17px;width: 56%;color:#5F160D;text-align: left;font-family: helvetica-bold;letter-spacing: 1px;}
      .boton-perro:hover{background-color:#EC6806;}
      .boton-gato{background-color: #8F72B2;margin: 0;border-radius: 33px;line-height: 36px;font-size: 15px;margin-bottom: 15px;padding: 3px 17px;width: 56%;color:#fff;text-align: left;font-family: helvetica-bold;letter-spacing: 1px;}
      .boton-gato:hover{background-color:#472176;}
      .bg-perro {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/perro.png);background-repeat: no-repeat;background-size:100% 100%;}
      .bg-gato {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/gato.png);background-repeat: no-repeat;background-size:100% 100%;}
      .bg-perro .subtitle {color:#5F160D;}
      .bg-gato .subtitle {color:#412077;}
      .bg-perro img,span {display:inline-block;margin-right: 10px;}
      .bg-gato img,span {display:inline-block;margin-right: 10px;}
      .bg-registro{background-color:#FBD9CF;padding: 35px;}
      .bg-registro h2 {text-align:center;color:#E85005;  font-family: helvetica-bold;font-size: 50px;margin: 0;}
      .bg-registro h3 {text-align: center;color: #E85005;font-family: HelveticaNeueLTStd-Lt;font-size: 32px;line-height: 32px;margin: 0;}
      .seccion-entrega {background-color:#E30917;font-family: NewJune-Bold;color:#fff;font-size:35px;line-height: 100px;}
      .title-videos{background-color: #E84E0E;text-align: center;color: #fff;font-family: helvetica-bold;border-radius: 25px;width: 35%;margin: 45px 0px;padding: 12px;}
      form {margin-top: 15px;}
      .img-responsive {width:100%;}

      .bg-perro-m {
          background-image: url(/lrv/images/contenido/perros-y-gatos/perro.png);
          background-repeat: no-repeat;
          background-size: cover;
          height: 230px;
          background-position: center center;
          position: relative;
      }

      .bg-perro-m .subtitle {
        font-family: Houndville;
        font-size: 53px;
        letter-spacing: -5px;
        margin: auto 54% 0px;
        color: #5F160D;
        text-align: right;
        position: absolute;
        bottom: 16px;
        font-weight: initial;
      }

      .boton-perro-m{
        background-color: #F7AB6F;
        margin: 0;
        border-radius: 33px;
        line-height: 35px;
        font-size: 15px;
        margin-bottom: 15px;
        padding: 3px 17px;
        width: 40%;
        color: #5F160D;
        text-align: left;
        font-family: helvetica-bold;
        letter-spacing: 1px;
      }

      .boton-perro-m:hover{background-color:#EC6806;}


      .bg-gato-m {
        background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/gato.png);
        background-repeat: no-repeat;
        background-size: cover;
        height: 230px;
        background-position: center center;
        position: relative;
      }

      .bg-gato-m .subtitle {
        font-family: Houndville;
        font-size: 53px;
        letter-spacing: -5px;
        margin: auto 6px 0px;
        color: #482484;
        text-align: left;
        position: absolute;
        bottom: 16px;
        font-weight: initial;
      }

      .boton-gato-m{
        background-color: #8F72B2;
        margin: 0;
        border-radius: 33px;
        line-height: 35px;
        font-size: 15px;
        margin-bottom: 15px;
        padding: 3px 17px;
        width: 40%;
        color: #fff;
        text-align: left;
        font-family: helvetica-bold;
        letter-spacing: 1px;
      }

      .boton-gato-m:hover{background-color:#472176;}

  	</style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<section>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/banner.jpg" alt="Perros y gatos la rebaja virtual">
</section>
<section class="bg-orange">
  <p class="titulo m">Todo lo que necesitas para consentir a tu mascota</p>
</section>
<section class="bg-perro-m">
    <h2 class="subtitle" >Perros</h2>
</section>
<center class="bg-pattern" style="padding: 30px 0px;">
  <a href="#">
    <div class="boton-perro-m">
      <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorios-perros.png"><span>Accesorios</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-perro-m">
      <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-perros.png"><span>Alimento</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-perro-m">
      <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-perros.png"><span>Aseo</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-perro-m">
      <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/snack-perros.png"><span>Snacks</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-perro-m" style="margin-bottom:0px;">
      <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/vitaminas-perrros.png"><span>Vitaminas</span>
    </div>
  </a>
</center>
<section class="bg-gato-m">
    <h2 class="subtitle" >Gatos</h2>
</section>
<center class="bg-pattern" style="padding: 30px 0px;">
  <a href="#">
    <div class="boton-gato-m">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorios-gato.png"><span>Accesorios</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-gato-m">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-gatos.png"><span>Alimento</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-gato-m">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-gatos.png"><span>Aseo</span>
    </div>
  </a>
  <a href="#">
    <div class="boton-gato-m" style="margin-bottom: 0px;">
      <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/arena-gatos.png"><span>Arena</span>
    </div>
  </a>
</center>
<p class="pie" style="padding: 0px 25px 15px;margin: 0;text-align: justify;">La salud y el cuidado de tu mascota determinan el estilo de vida que llevará, cuántos años de vida tendrá, su estado de ánimo y su comportamiento.<br>
  Por eso en la Rebaja Virtual te brindamos todo lo que necesitas para su bienestar en un solo lugar, un mundo especialmente para ella.
</p>
<section class="container-fluid bg-registro">
      <div class="ui-grid-a">
        <div class="ui-block-a">
            <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perfume-para-hembras.png">
        </div>
        <div class="ui-block-b">
          <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perfume-para-machos.png">
        </div>
      </div>
      <h2 style="font-size: 30px;">Registra tu mascota</h2>
      <h3 style="font-size: 21px;line-height: 20px;">Y recibe una esencia natural de Pets and Cats de Laboratorios Natural Freshly</h3>
      <form class="" action="" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del amo">
        <input type="text" name="ciudad" placeholder="Ciudad">
        <input type="text" name="nombre-mascota" placeholder="Nombre de la mascota">
        <input type="text" name="dirección" placeholder="Dirección">
        <input type="text" name="telefono" placeholder="Teléfono o celular de contacto">
        <select name="tipo-mascota">
          <option value="perro">Perro</option>
          <option value="gato">Gato</option>
        </select>
        <input type="submit" value="ENVIAR">
      </form>
</section>
<div class="seccion-entrega" style="font-size: 20px;line-height: 26px;">
  <center style="padding: 30px 0px;">
    <img class="" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual"> <br>
    En la Rebaja Virtual entregamos tu pedido en 1 hora
  </center>
</div>
<section>
  <center>
    <h2 class="title-videos" style="width: 70%;margin: 18px 0px;">Videos Publicitarios</h2>
  </center>
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video1.png">
  <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video2.png">
</section>

<!-- Fin Version movil-->

<?php else: ?>
<!--Versión escritorio-->
<div class="container-fluid">
  <div class="row">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/banner.jpg" alt="Perros y gatos la rebaja virtual">
  </div>
  <div class="row bg-orange">
    <p class="titulo">Todo lo que necesitas para consentir a tu mascota</p>
  </div>
  <div class="row bg-pattern">
    <div class="container">
      <div class="col-sm-6 col-md-6 bg-perro resset">
        <div class="col-sm-offset-5 col-md-offset-5 col-sm-7 col-md-7">
          <h2 class="subtitle" >Perros</h2>
          <div class="row">
            <center>
              <a href="#">
                <div class="boton-perro">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorios-perros.png"><span>Accesorios</span>
                </div>
              </a>
              <a href="#">
                <div class="boton-perro">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-perros.png">Alimento
                </div>
              </a>
              <a href="#">
                <div class="boton-perro">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-perros.png">Aseo
                </div>
              </a>
              <a href="#">
                <div class="boton-perro">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/snack-perros.png">Snacks
                </div>
              </a>
              <a href="#">
                <div class="boton-perro">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/vitaminas-perrros.png">Vitaminas
                </div>
              </a></center>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 bg-gato resset">
        <div class="col-sm-7 col-md-7">
          <h2 class="subtitle" >Gatos</h2>
          <div class="row">
            <center>
              <a href="#">
                <div class="boton-gato">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/accesorios-gato.png"><span>Accesorios</span>
                </div>
              </a>
              <a href="#">
                <div class="boton-gato">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/alimento-gatos.png"><span>Alimento</span>
                </div>
              </a>
              <a href="#">
                <div class="boton-gato">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/aseo-gatos.png"><span>Aseo</span>
                </div>
              </a>
              <a href="#">
                <div class="boton-gato" style="margin-bottom: 73px;">
                  <img src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/arena-gatos.png"><span>Arena</span>
                </div>
              </a>
            </center>
          </div>
        </div>
        <div class="col-sm-5 col-md-5"></div>
      </div>
      <div class="col-md-12">
        <p class="pie">La salud y el cuidado de tu mascota determinan el estilo de vida que llevará, cuántos años de vida tendrá, su estado de ánimo y su comportamiento.<br>
          Por eso en la Rebaja Virtual te brindamos todo lo que necesitas para su bienestar en un solo lugar, un mundo especialmente para ella.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid bg-registro">
  <div class="col-sm-6 col-md-5">
    <div class="col-md-12">
      <div class="col-md-6 resset">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perfume-para-hembras.png">
      </div>
      <div class="col-md-6 resset">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perfume-para-machos.png">
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-7">
    <div class="row">
      <h2>Registra tu mascota</h2>
      <h3>Y recibe una esencia natural de Pets and Cats de Laboratorios Natural Freshly</h3>
    </div>
    <div class="row">
      <form class="" action="" method="POST">
        <div class="col-md-6">
          <input type="text" name="nombre" placeholder="Nombre del amo"> <br>
          <input type="text" name="ciudad" placeholder="Ciudad"> <br>
          <input type="text" name="nombre-mascota" placeholder="Nombre de la mascota">
        </div>
        <div class="col-md-6">
          <input type="text" name="dirección" placeholder="Dirección"> <br>
          <input type="text" name="telefono" placeholder="Teléfono o celular de contacto"> <br>
          <select class="" name="tipo-mascota">
            <option value="Perro">Perro</option>
            <option value="Gato">Gato</option>
          </select>
        </div>
        <input type="submit" value="ENVIAR">
      </form>
    </div>
  </div>
</div>
<div class="seccion-entrega">
  <div class="container ">
    <div class="col-md-2">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
    </div>
    <div class="col-md-10">
      En la Rebaja Virtual entregamos tu pedido en 1 hora
    </div>
  </div>
</div>
  <div class="container" style="margin-bottom:32px;">
    <div class="col-md-12">
      <center>
        <h2 class="title-videos">Videos Publicitarios</h2>
      </center>
    </div>
    <div class="col-md-6">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video1.png">
    </div>
    <div class="col-md-6">
      <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/video2.png">
    </div>
  </div>
<!--Fin versión escritorio-->
<?php endif; ?>
