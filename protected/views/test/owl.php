<?php //unset(Yii::app()->request->cookies['cookie_prueba']); ?>

<?php //_setCookie('cook', "123-456"); ?>

<p><?php CVarDumper::dump(_getCookie(Yii::app()->params->usuario['sesion']), 10, true) ?></p>

<?php 
//Yii::app()->request->cookies['cookie_prueba'] = new CHttpCookie('cookie_prueba', "hola perra", array('expire'=>time()+20));

/*$objCookie = new CHttpCookie('cookie_prueba', "hola expire");
$objCookie->configure(array('expire'=>time()+10));
Yii::app()->request->cookies['cookie_prueba'] = $objCookie;*/


$cookie = "";
$value = (string)Yii::app()->request->cookies['cookie_prueba'];


?>

<p>COOKIE: <?= CVarDumper::dump($cookie,10,true) ?></p>
<p>VALUE: <?= CVarDumper::dump($value,10,true)?></p>

<div id="owl-productodetalle-3" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item"><a href="/larebajavirtual/sitio" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/owl/fullimage1.jpg" alt="The Last of us"></a></div>
    <div class="item"><a href="/larebajavirtual/sitio" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/owl/fullimage2.jpg" alt="GTA V"></a></div>
    <div class="item"><a href="/larebajavirtual/sitio" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/owl/fullimage3.jpg" alt="Mirror Edge"></a></div>
</div>


<div id="owl-demo" class="owl-carousel owl-theme">
  <div class="item"><h1>1</h1></div>
  <div class="item"><h1>2</h1></div>
  <div class="item"><h1>3</h1></div>
  <div class="item"><h1>4</h1></div>
  <div class="item"><h1>5</h1></div>
  <div class="item"><h1>6</h1></div>
  <div class="item"><h1>7</h1></div>
  <div class="item"><h1>8</h1></div>
  <div class="item"><h1>9</h1></div>
  <div class="item"><h1>10</h1></div>
  <div class="item"><h1>11</h1></div>
  <div class="item"><h1>12</h1></div>
  <div class="item"><h1>13</h1></div>
  <div class="item"><h1>14</h1></div>
  <div class="item"><h1>15</h1></div>
  <div class="item"><h1>16</h1></div>
</div>



<div>
<?php $p1 = Producto::consultarPrecio('17885', $this->objSectorCiudad, 'u')?>
<?= ($p1 == null) ? "--" : $p1 ?>
</div>