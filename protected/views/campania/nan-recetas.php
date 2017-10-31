
<?php $this->pageTitle = "Recetas Nan optipro - La Rebaja Virtual"; ?>
<?php
$this->metaTags = "
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='NAN® OPTIPRO® 3 DESARROLLO de Nestlé trae unas deliciosas recetas fáciles de preparar para que tu hijo consuma proteína de una manera divertida.'>
  <meta name='Recetas para niños, loncheras, proteína para niños.'>
	<style>

	</style>
    ";
?>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window,document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
   fbq('init', '1237970366269442');
  fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" src="https://www.facebook.com/tr?id=1237970366269442&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!--Versión movil-->
<?php if ($this->isMobile): ?>

<!--Version movil-->
<!--Versión escritorio-->
<?php else: ?>
<img class="img-responsive" src="<?= Yii::app()->request->baseUrl ?>/images/contenido/nan-optipro/recetas-y-sabias-que/banner.png" alt="Banner Nan Optipro">
<!--Fin versión escritorio-->
<?php endif; ?>
