<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta content="es" http-equiv="content-language">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script>requestUrl = "<?php echo Yii::app()->request->baseUrl; ?>";</script>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon_16.ico" type="image/x-icon" />  
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/mobile.css"); ?>
        <?php Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/mobile_error.css"); ?>
    </head>

    <body>
        <div data-role="page" id="main-page" data-theme="c">
            <div data-role="header" data-theme="h">
                <div class="barraf"></div>
            </div>
            <!-- Fin header -->

            <div data-role="main" id="main-content">
                <?php echo $content; ?>
            </div>
            <!-- Fin main content -->


            <div data-role="footer" data-theme="f" <?php echo ($this->fixedFooter ? 'data-position="fixed" data-visible-on-page-show="false" data-tap-toggle="false"' : "") ?> >
                <?php echo $this->renderPartial("//layouts/footer"); ?>
            </div>
            <!-- Fin footer -->
        </div>
        <!-- Fin page -->
    </body>
</html>