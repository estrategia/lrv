<?php echo $contenido?>
<?php if(true) {Yii::app()->clientScript->registerScript('compra-load', "$.mobile.loading('hide');");}?>
<?php Yii::app()->clientScript->registerScript('analytics-compra', GoogleAnalytics::getScriptCompra($objCompra, true)); ?>