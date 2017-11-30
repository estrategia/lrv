<div class="row">

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Error <?php echo $code; ?></h2>
        </div>
        <!--/span-->
    </div><!--/row-->
    <div class="row">
        <div class="well col-md-5 center login-box">
            <?php echo CHtml::encode($message); ?>
            
            <p class="center col-md-5">
                <?php echo CHtml::link('Ir al panel', Yii::app()->controller->module->homeUrl, array('class' => 'btn btn-primary')); ?>
            </p>
        </div>
    </div>
</div>

