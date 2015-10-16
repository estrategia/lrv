<?php echo $contenido?>
<?php if($this->isMobile) {Yii::app()->clientScript->registerScript('compra-load', "$.mobile.loading('hide');");}?>