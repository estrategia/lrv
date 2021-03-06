<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta charset="utf-8" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" /> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>"; gmapKey = "<?php echo Yii::app()->params['google']['llaveMapa']; ?>"; tipoEntrega = {presencial:<?=Yii::app()->params->entrega['tipo']['presencial']?>,domicilio:<?=Yii::app()->params->entrega['tipo']['domicilio']?>}</script>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/charisma/css/bootstrap-simplex.min.css"); ?>
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/operator.css"); ?>
    </head>

    <body>
        <div id="container" class="ch-container">
            <div class="col-lg-12">
                <img class="center" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_lrv.png" alt="La Rebaja Virtual Logo" />
            </div>
            <div class="col-lg-12">
                <?php echo $content ?>
            </div>
        </div>
    </body>
</html>
