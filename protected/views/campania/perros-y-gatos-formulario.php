
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
        font-family: NewJune-Bold;
        src: url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/fonts/NewJune-Bold.otf);
      }
        		
        		

      .bg-pattern {background-image:url(".Yii::app()->request->baseUrl."/images/contenido/perros-y-gatos/textura.png);background-repeat: no-repeat;background-size: cover;background-position: center;}
      .bg-pattern  .container-fluid {padding:0px;}
      .logo-perros-gatos {margin: 0px auto 90px !important;width: 33%;padding-top: 80px;}
      .logo-perros-gatos.m {margin: 0 auto 30px !important;width: 63%;padding-top: 10px;display: block;}
      .seccion-entrega {background-color:#E30917;font-family: NewJune-Bold;color:#fff;font-size:35px;margin-top: 30px;}
      .space-1 { height: 0px !important;}
      .section-orange {background-color: #EC6806;color: #fff;text-align: center;font-size: 42px;font-family: Nautilus;padding: 10px;}
      .section-orange.m{ font-size: 24px;}
      .section-orange:after {content: '';border-left: 40px solid transparent;border-right: 40px solid transparent;border-top: 50px solid #EC6806;position: absolute;}
      .section-orange.m::after {
    content: '';
    border-left: 40px solid transparent;
    border-right: 40px solid transparent;
    border-top: 30px solid #EC6806;
    position: absolute;
    margin-left: -11%;
}
      .overlay {background-color: rgba(236, 104, 6, 0.1);padding: 60px 0;margin-bottom: 60px;}
      .seccion-entrega.m { background-color: #E30917;font-family: NewJune-Bold;color: #fff;font-size: 19px;margin-top: 10px;text-align: center;padding: 15px 10px;line-height: initial;}
      .seccion-entrega.m span {font-size: 25px;}
      .title {color: #E84E0E;font-family: helvetica-bold;text-align: center;font-size: 60px;font-weight: bold;}
      .sub-title {color: #EC6806;text-align: center;font-family: HelveticaNeueLTStd-Lt;}
	  .label-title {color: #EC6806;text-align: left;font-family: HelveticaNeueLTStd-Lt; font-size: 32px;}
      .sub-title span {font-style: italic;font-family: helvetica-bold;}
      .formulario-registro {padding: 0px 50px;margin-top: 40px;}
      .formulario-registro select {margin: 10px 0px;  color: #9D8ACD;font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}
      .formulario-registro option {margin: 10px 0px;  color: #9D8ACD;font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}
      .formulario-registro input[type='text'], select {width: 100%;padding: 10px 20px;border: none;margin: 10px 0;border-radius: 15px;}
      .formulario-registro input[type='button'] {background-color: #E84E0E;color: #fff;border: none;margin: 0 auto;display: block;border-radius: 15px;padding: 15px 30px;font-weight: bold;margin-top: 35px;}
      .formulario-registro input[placeholder] {color: #482583;font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}
	  .formulario-registro .error {font-size: 20px;font-family: HelveticaNeueLTStd-Lt;}	
    </style>
    ";
?>
<!--Versión movil-->
<?php if ($this->isMobile): ?>
<div class="bg-pattern ">
  <a href="<?= Yii::app()->request->baseUrl ?>/perros-y-gatos">
    <img class="logo-perros-gatos m" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perros-y-gatos.png" alt="Perros y gatos la rebaja virtual">
  </a>
  <div class="section-orange m">
    <div class="container">Todo lo que necesitas para consentir a tu mascota</div>
  </div>
  <div class="overlay" style="padding: 25px 0;">
    <div class="container">
      <h1 class="title" style="font-size: 32px;">Registra tu mascota</h1>
      <h2 class="sub-title">y recibe una esencia natural de Pets and Cats de Laboratorios <span>Natural Freshly</span></h2>
      <div class="row">
      <form id="formulario-mascota" class="formulario-registro" style="padding: 0px 20px;margin-top: 20px;" action=""  method="">
          <div class="col-sm-12 col-md-12">
          	<div class="label-title"> Datos del amo</div>
          
            <input name='Mascotas[cedulaCliente]' type="text" placeholder="C&eacute;dula del amo" value="<?php echo !Yii::app()->user->isGuest?Yii::app()->user->name :''?>">
            <div id='Mascotas_cedulaCliente_em' class="error has-error"></div>
            <br>
            <input name='Mascotas[nombreCliente]' type="text" placeholder="Nombre del amo" value="<?php echo !Yii::app()->user->isGuest? Yii::app()->session[Yii::app()->params->usuario['sesion']]->nombre ." ".Yii::app()->session[Yii::app()->params->usuario['sesion']]->apellido :''?>">
            <div id='Mascotas_nombreCliente_em' class="error has-error"></div>
            <br>
            <input name='Mascotas[fechaNacimientoCliente]' type="text" placeholder="Fecha de nacimiento (yyyy-mm-dd)"  value="<?php echo !Yii::app()->user->isGuest? Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento :''?>">
            <div id='Mascotas_fechaNacimientoCliente_em' class="error has-error"></div>
            <br>
            <input name='Mascotas[correo]' type="text" placeholder="Correo electr&oacute;nico"  value="<?php echo !Yii::app()->user->isGuest? Yii::app()->session[Yii::app()->params->usuario['sesion']]->correoElectronico :''?>">
            <div id='mascotas_correo_em' class="error has-error"></div><br>
            <div class="label-title"> Datos de la mascota</div>
            <select name='Mascotas[tipoMascota]'>
              <option value="" selected="selected">- Tipo de mascota -</option>
              <option value="1">Perros</option>
              <option value="2">Gatos</option>
            </select>
            <div id='Mascotas_tipoMascota_em' class="error has-error"></div><br/>
            <input name='Mascotas[nombreMascota]' type="text" placeholder="Nombre de la mascota">
            <div id='Mascotas_nombreMascota_em' class="error has-error"></div><br/>
            <select name='Mascotas[edadMascota]' >
            <option =""> - Edad de la mascota (a&ntilde;os)- </option>
            <?php for($i = 0;$i<=20;$i++ ):?>
            	<option value="<?php echo $i?>"><?php echo $i?> </option>
            <?php endfor;?>
            </select>
            <div id='Mascotas_edadMascota_em' class="error has-error"></div><br>
            <div class="label-title"> Datos de entrega de la muestra</div>
            <?php $ciudades = Ciudad::model()->findAll(array ('condition'  => 'estadoCiudad = 1', 'order' => 'nombreCiudad'));?>
            <select name='Mascotas[codigoCiudad]' placeholder="Ciudad">
            <option value="" selected="selected">- Seleccione Ciudad -</option>
            <?php foreach($ciudades as $ciudad):?>
            	<option value='<?= $ciudad->codigoCiudad ?>'><?= $ciudad->nombreCiudad?></option>
            <?php endforeach;?>
            </select>
            <div id='Mascotas_codigoCiudad_em' class="error has-error"></div><br>
            <input name='Mascotas[direccion]' type="text" placeholder="Dirección">
            <div id='Mascotas_direccion_em' class="error has-error"></div><br>
            <input name='Mascotas[telefono]' type="text" placeholder="Teléfono o celular de contacto">
            <div id='Mascotas_telefono_em' class="error has-error"></div><br>
            
          </div>
          <div class="col-md-12">
            <button type="button" value="ENVIAR" onclick='guardarMascota();'>ENVIAR</button>
          </div>
      </form>
      </div>
    </div>
  </div>
  <div class="seccion-entrega m">
      <img style="width: 45%;display: block;margin: 0 auto;" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
      En la Rebaja Virtual entregamos <br><span> tu pedido en 1 hora</span>
    </div>
</div>


<!-- Fin Version movil-->
<?php else: ?>
<!--Versión escritorio-->
<div class="bg-pattern ">
  <a href="<?= Yii::app()->request->baseUrl ?>/perros-y-gatos">
    <img class="img-responsive logo-perros-gatos" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/perros-y-gatos.png" alt="Perros y gatos la rebaja virtual">
  </a>
  <div class="section-orange">
    <div class="container">Todo lo que necesitas para consentir a tu mascota</div>
  </div>
  <div class="overlay">
    <div class="container">
      <h1 class="title">Registra tu mascota</h1>
      <h2 class="sub-title"><strong>y recibe una esencia natural de Pets and Cats de Laboratorios <span>Natural Freshly</span></strong></h2>
      <div class="row">
      <form id="formulario-mascota" class="formulario-registro" action=""  method="post">
      	<div class="label-title"><strong>Datos del amo</strong></div>
          <div class='row'>
          		<div class="col-sm-6 col-md-6">
		            <input name='Mascotas[cedulaCliente]' type="text" title="C&eacute;dula del amo" placeholder="C&eacute;dula del amo" value="<?php echo !Yii::app()->user->isGuest?Yii::app()->user->name :''?>">
		            <div id='Mascotas_cedulaCliente_em' class="error text-danger"></div>
           		</div>
            	<div class="col-sm-6 col-md-6">
          			<input name='Mascotas[nombreCliente]' type="text" title="Nombre del amo" placeholder="Nombre del amo"  value="<?php echo !Yii::app()->user->isGuest? Yii::app()->session[Yii::app()->params->usuario['sesion']]->nombre ." ".Yii::app()->session[Yii::app()->params->usuario['sesion']]->apellido :''?>">
          			<div id='Mascotas_nombreCliente_em' class="error text-danger"></div>
          		</div>
          </div>
         
           <div class='row'>
          		<div class="col-sm-6 col-md-6"> 
                   <input name='Mascotas[fechaNacimientoCliente]' type="text" title="Fecha de nacimiento" placeholder="Fecha de nacimiento (aaaa-mm-dd)" value="<?php echo !Yii::app()->user->isGuest? Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento :''?>">
                   <div id='Mascotas_fechaNacimientoCliente_em' class="error text-danger"></div>
                </div>
                <div class="col-sm-6 col-md-6">
	            <input name='Mascotas[correo]' type="text" title="Correo electr&oacute;nico del amo" placeholder="Correo electr&oacute;nico del amo" value="<?php echo !Yii::app()->user->isGuest? Yii::app()->session[Yii::app()->params->usuario['sesion']]->correoElectronico :''?>">
	            <div id='Mascotas_correo_em' class="error text-danger"></div>
	            </div>
                
		  </div>
		  <br>
		  <div class="label-title"><strong>Datos de la mascota</strong></div>
          <div class='row'>
          		
	            <div class="col-sm-6 col-md-6">
		            <select name='Mascotas[tipoMascota]'>
		              <option value="" selected="selected">- Tipo de mascota -</option>
		              <option value="1">Perros</option>
		              <option value="2">Gatos</option>
		            </select>
		            <div id='Mascotas_tipoMascota_em' class="error text-danger"></div>
	            </div>
	            
	            <div class="col-sm-6 col-md-6"> 
          			<select name='Mascotas[edadMascota]'>
          				<option =""> - Edad de la mascota (a&ntilde;os)- </option>
			            <?php for($i = 0;$i<=20;$i++ ):?>
			            	<option value="<?php echo $i?>"><?php echo $i?> </option>
			            <?php endfor;?>
			        </select>
          			<div id='Mascotas_edadMascota_em' class="error text-danger"></div>
          		</div>
          		
         	</div>
         	<div class='row'>
         		<div class="col-sm-6 col-md-6">
	            	<input name='Mascotas[nombreMascota]' type="text" placeholder="Nombre de la mascota">
	            	<div id='Mascotas_nombreMascota_em' class="error text-danger"></div>
            	</div>
            </div>
            <br>
         	<div class="label-title"><strong> Datos de entrega de muestra</strong></div>
         	
         	<div class='row'>
         		<div class="col-sm-6 col-md-6"> 
		            <?php $ciudades = Ciudad::model()->findAll(array ('condition'  => 'estadoCiudad = 1', 'order' => 'nombreCiudad'));?>
		            <select name='Mascotas[codigoCiudad]' placeholder="Ciudad">
		            <option value="" selected="selected">- Seleccione Ciudad -</option>
		            <?php foreach($ciudades as $ciudad):?>
		            	<option value='<?= $ciudad->codigoCiudad ?>'><?= $ciudad->nombreCiudad?></option>
		            <?php endforeach;?>
		            </select>
		            <div id='Mascotas_codigoCiudad_em' class="error text-danger"></div>
		        </div>
          		<div class="col-sm-6 col-md-6"> 
	            	<input name='Mascotas[telefono]' type="text" placeholder="Teléfono o celular de contacto">
	            	<div id='Mascotas_telefono_em' class="error text-danger"></div>
	            </div>
	            
          </div>
          <div class="row">
          		<div class="col-sm-6 col-md-6">
	          		<input name='Mascotas[direccion]' type="text" placeholder="Dirección">
	          		<div id='Mascotas_direccion_em' class="error text-danger"></div>
	          	</div>
          </div>	
          <div class="col-md-12">
            <input type="button" value="ENVIAR" onclick='guardarMascota();return false;'>
          </div>
      </form>
      </div>
    </div>
  </div>
  <div class="seccion-entrega">
    <div class="container ">
      <div class="col-sm-2 col-md-2">
        <img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/perros-y-gatos/icono-domicilio.png" alt="Entrega en 1 hora la rebaja virtual">
      </div>
      <div class="col-sm-10 col-md-10">
        En la Rebaja Virtual entregamos tu pedido en 1 hora
      </div>
    </div>
  </div>
</div>
<!--Fin versión escritorio-->
<?php endif; ?>
