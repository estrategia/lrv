<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="es-CO">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="es" />
  <meta content="es" http-equiv="content-language">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
  <meta name='author' content='La Rebaja Virtual'>
  <?php  if(isset($this->metaTags) && !empty($this->metaTags)):?>
    <?php echo $this->metaTags ?>
  <?php else: ?>
    <meta name="description" content="Pide tus domicilios de farmacia y drogueria de manera rapida y segura. La Rebaja Drogueria despacha tus domicilios con nuestra planta propia de mensajeros. Compra seguro."/>
  <?php endif;?>
  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>"; gmapKey = "<?php echo Yii::app()->params['google']['llaveMapa']; ?>"; tipoEntrega = {presencial:<?=Yii::app()->params->entrega['tipo']['presencial']?>,domicilio:<?=Yii::app()->params->entrega['tipo']['domicilio']?>}; var lat = 4.704009; var lng = -74.042832;</script>
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main-desktop.css?" . Yii::app()->params->fechaActualizacion["css"]); ?>
</head>
<body>
  <div id="overlay" class="overlay hidden"></div>
  <div id="main-page">
    <header>
      <nav class="main-header fixed">
        <div class="container-fluid">
          <!--- Header --->
          <div class="row header">
            <div class="col-md-3 col-lg-3 left-nav">
              <div class="col-md-4">
                  <button class="toggle-categorias">
                    <img width="19" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-menu-categorias.png">
                    <div class="navbar-title-categorias">Categorías</div>
                  </button>
              </div>
              <div class="col-md-8">
                <a class="" href="<?php echo $this->createUrl('/') ?>">
                  <img class="logo" alt="Drogueria - La Rebaja Virtual" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotop.png">
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 middle-nav">
              <div class="row">
                <div class="col-md-3 col-lg-3 ">
                    <div class="top_ubicacion">
                        <?php if ($this->objSectorCiudad == null): ?>
                            <?php echo CHtml::link('<span class="select-ciudad"><br><span class="glyphicon glyphicon-map-marker"></span> Selecciona tu ciudad </span>', CController::createUrl('/sitio/ubicacion'), array()); ?>
                        <?php else: ?>
                            <?php echo CHtml::link('<span class="select-ciudad">'.$this->sectorName." <img src=". Yii::app()->request->baseUrl. "/images/desktop/select-ciudad.png> </span>", CController::createUrl('/sitio/ubicacion'), array()); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <form method="get" action="<?php echo CController::createUrl('/catalogo/buscar') ?>">
                      <div class="input-group hidden-sm-down input-group-search">
                        <input type="text" class="form-control" placeholder="Escribe el nombre del producto"  autocomplete="off" value="" id="busqueda" name="busqueda" >
                          <span class="input-group-btn">
                            <a href="#" id="btn-buscador-productos" class="float-right">
                            <img width="36" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-buscar.png" alt=""></a>
                          </span>
                      </div>
                    </form>
                </div>
                <div class="col-md-4 col-lg-4">
                    <?php if (Yii::app()->user->isGuest): ?>
                        <ul class="user">
                            <li><a href="<?= Yii::app()->request->baseUrl; ?>/usuario/ingresar" ><img class="ico-user" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-iniciar-sesion.png" alt=""> Inicia Sesión</a></li>
                            <span class="line-divider">|</span>
                            <li><a href="<?= Yii::app()->request->baseUrl; ?>/usuario/registro">Registrate</a></li>
                        </ul>
                    <?php else: ?>
                        <ul class="user login_in">
                            <li>
                                <a href="<?= Yii::app()->request->baseUrl; ?>/usuario/" class="">Hola <?php echo Yii::app()->user->shortName; ?> (Mi cuenta)</a>
                                <br>
                                <a href="<?= Yii::app()->request->baseUrl; ?>/usuario/salir" class=""><span class="glyphicon glyphicon-log-out"></span> Cerrar sesi&oacute;n</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-lg-2 right-nav">
              <div data-role="panel" id="div-carro-canasta">
                <?php $this->renderPartial('//carro/d_canasta'); ?>
              </div>
            </div>
          </div>
          <!--- menuMenu categorias --->
          <div class="row mega-menu hidden">
            <nav class="col-md-2 col-lg-2 main-menu-categories">
              <ul class="nav nav-stacked menu">
                <?php foreach ($this->categorias as $categoria): ?>
                  <li class="nav-item">
                    <a href="#" data-role="menu-menu" data-menu="<?= $categoria->idCategoriaTienda ?>"><img class="data-label" src="<?php echo Yii::app()->request->baseUrl; ?>/images/menu/desktop/<?php echo $categoria->rutaImagen ?>" alt=""><?php echo ucfirst(strtolower($categoria->nombreCategoriaTienda)) ?></a>
                  </li>
                  <?php endforeach; ?>
              </ul>
            </nav>
            <div class="col-md-10 col-lg-10 lazy-menu">
              <div class="row">
                <div class="col-md-6 col-lg-6">
                  <?php foreach ($this->categorias as $idxCategoria => $categoria): ?>
                    <div class="<?= ($idxCategoria==0 ? "" : "hidden") ?>" data-role="menu-submenu" data-menu="<?= $categoria->idCategoriaTienda ?>">
                    <?php foreach ($categoria->listCategoriasHijas as $subcategoria): ?>
                      <div class="category-title"  data-menu="<?= $categoria->idCategoriaTienda ?>" data-submenu="<?= $subcategoria->idCategoriaTienda ?>"><?php echo ucfirst(strtolower($subcategoria->nombreCategoriaTienda)); ?></div>
                      <div class="subcategory-link">
                        <?php for ($i = 0; $i < count($subcategoria->listCategoriasHijasMenu) && $i < 5; $i++): ?>
                        <?php $categoriaHija = $subcategoria->listCategoriasHijasMenu[$i]; ?>
                        <?php echo CHtml::link(ucfirst(strtolower($categoriaHija->nombreCategoriaTienda)), CController::createUrl('/catalogo/categoria', array('categoria' => $categoriaHija->idCategoriaTienda))); ?>
                        <?php endfor; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endforeach; ?>
                </div>
                <div class="col-md-6 col-lg-6">

                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- Menu mundos -->
      <nav class="menu-mundos">
        <?php //$this->renderPartial('//layouts/_d_menuMundo');?>
        <div class="first">
          <div class="row-flex">
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/cupones.png" alt="Cupones La rebaja virtual.com">
                <p>CUPONES</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/productos-destacados.png" alt="Productos destacados">
                <p>PRODUCTOS <br> DESTACADOS</p>
              </a>
            </div>
          </div>
        </div>
        <div class="second">
          <div class="row-flex">
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/naturales.jpg" alt="Mundo Naturales">
                <p>NATURALES</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/mascotas.jpg" alt="Mundo Mascotas">
                <p>MASCOTAS</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/bebes.jpg" alt="Mundo bebé">
                <p>BEBÉ</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/cuidado-en-casa.jpg" alt="Mundo cuidado en casa">
                <p>CUIDADO EN CASA</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/movilidad.jpg" alt="Mundo movilidad">
                <p>MOVILIDAD</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/electro-hogar.jpg" alt="Mundo ElectroHogar">
                <p>ELECTROHOGAR</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/medicina.jpg" alt="Mundo Medicina">
                <p>MEDICINA</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/bienestar.jpg" alt="Mundo bienestar">
                <p>BIENESTAR</p>
              </a>
            </div>
            <div class="item">
              <a href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/dermocosmetica.jpg" alt="Mundo dermocosmetica">
                <p>DERMOCOSMETICA</p>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="wrapper" id="main-content">
        <?php  // $this->renderPartial('//layouts/_d_cupones'); ?>
        <?php  // $this->renderPartial('//layouts/_d_productos-destacados'); ?>
        <?php echo $content; ?>
    </div>
    <?php if (CodigoEspecial::hasState()): ?>
		    <div class="container-fluid">
          <div class="row">
        	   <div class="col-md-12">
        			    <table class="codEspecial">
        					       <tbody>
        						        <?php foreach (CodigoEspecial::getState() as $objEspecial): ?>
        						        <tr>
        						            <td><img class="icon_codigo_especial" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . 'desktop/' . $objEspecial->rutaIcono; ?>" ></td>
        						            <td><?php echo $objEspecial->descripcion ?></td>
        						        </tr>
        						        <?php endforeach; ?>
        								</tbody>
        					</table>
        			</div>
        	</div>
        </div>
		<?php endif; ?>
    <footer>
      <div class="container-fluid">
        <div class="row pre-footer">
          <div class="col-xs-12">
            <p>Las promociones y actividades destacadas en www.larebajavirtual.com cuentan con las siguientes condiciones generales: -Aplica a máximo 4 unidades por referencia, por compra. Sujeto a disponibilidad de productos en el punto de venta. Descuento no acumulable con otras ofertas y/o promociones. Descuento válido a nivel nacional en www.larebajavirtual.com Los precios ofrecidos en www.larebajavirtual.com son diferentes a los de los puntos de venta y pueden variar según la ciudad definida para la entrega o recogida del pedido. Si la compra se hace por servicio a domicilio, este tendrá un costo adicional dependiendo de la ciudad. Si por su ubicación geográfica en determinado territorio no es posible entregar el pedido, Copservir Ltda., se puede negar a la aceptación de la oferta de compra. Los productos entregados presentan las mismas características que él o (los) productos exhibidos en la presente publicidad. Conozca reglamento en www.clientefiel.co</p>
          </div>
        </div>
        <div class="row info-footer">
          <div class="grid-flex">
            <div class="item">
              <div class="titulo-footer">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/informacion-y-servicios.png" alt="">
                <span style="margin-left:10px;">Información y servicios</span>
              </div>
              <ul>
                <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'horario')) ?>">Horarios de atención</a></li>
                <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'politerminos')) ?>">Políticas y términos de uso</a></li>
                <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'garantiasDevoluciones')) ?>">Garantías y Devoluciones</a></li>
                <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'retractoReversion')) ?>">Retracto y Reversión</a></li>
                <li><a target="_blank" href="http://www.credirebaja.com/">Tarjeta crediRebaja</a></li>
              </ul>
            </div>
            <div class="item">
              <div class="titulo-footer">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/cliente-fiel.png" alt="">
                <span style="margin-left:10px;">Club cliente fiel</span>
              </div>
              <ul>
                <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=78&Itemid=464">Informaci&oacute;n del programa</a></li>
                <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=78&Itemid=464&pest=2">Beneficios del programa</a></li>
                <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=78&Itemid=464&pest=6">Términos y condiciones</a></li>
                <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_users&view=login">Actualiza datos</a></li>
              </ul>
            </div>
            <div class="item">
              <div class="titulo-footer">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-actividad-comercial.png" alt="">
                <span style="margin-left:10px;">Actividades comerciales</span>
              </div>
              <ul>
                <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=featured&Itemid=444">Políticas y condiciones</a></li>
                <li><a target="_blank" href="http://www.copservir.com/clubclientefiel/index.php?option=com_content&view=category&layout=blog&id=85&Itemid=476">Ganadores de campañas</a></li>
              </ul>
            </div>
            <div class="item" style="width: 31%;">
              <div class="titulo-footer" style="border-right: 1px solid transparent;">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-contactanos.png" alt="">
                <span>Contactanos</span>
              </div>
              <ul>
                <li>Call center <br> 01 8000 93 99 00</li>
                <li><a href="<?php echo $this->createUrl('/contenido/corporativo', array('tipo' => 'pqrs')) ?>">PQRS (Preguntas, quejas, reclamos, sugerencias)</a></li>
              </ul>
            </div>
            <div class="item" style="width: 11%;">
              <div class="social">
                <ul>
                  <li><a href="https://www.facebook.com/LaRebaja/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-facebook.png"></a></li>
                  <li><a href="https://www.youtube.com/user/larebaja/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-youtube.png"></a></li>
                  <li><a href="https://twitter.com/larebaja" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-twitter.png"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <p align="center">
              Cooperativa Multiactiva &nbsp;de Servicios Solidarios Copservir  Ltda | NIT &nbsp;830.011.670-3 | LA REBAJA DROGUERIA | 01 8000 93 99  00 | Calle 13 No. 42 - 10 Bogotá, Colombia | <a href="mailto:infolrv@copservir.com">infolrv@copservir.com</a>  Colombia © 2015 <a href="http://www.larebajavirtual.com">www.larebajavirtual.com</a> | <a target="_blank" href="http://www.sic.gov.co/es/">SIC (Súper intendencia de industria y comercio)</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>
