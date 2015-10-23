<?php echo $contenido?>
<?php if($this->isMobile) {Yii::app()->clientScript->registerScript('compra-load', "$.mobile.loading('hide');");}?>
<?php Yii::app()->clientScript->registerScript('analytics-compra', "dataLayer.push(".GoogleAnalytics::getScriptCompra($objCompra).");"); ?>