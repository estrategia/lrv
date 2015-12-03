<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-11">
            <h2><i class="glyphicon glyphicon-file"></i> Combos</h2>
        </div>
        <!-- <div class="box-icon"> -->
        <div class="col-lg-1">
            <?php $this->renderPartial('_opciones') ?>
        </div>
    </div>
    <div class="box-content row">
        <?php $this->renderPartial('_gridCombos', array('model' => $model, 'vista' => 'index')); ?>
    </div>
</div>
