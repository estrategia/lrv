<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-1">
            <h2><i class="glyphicon glyphicon-file"></i> Combos</h2>
        </div>
    </div>
    
    <div class="box-content row" id='botones-modulos'>
        <div class="col-md-12">
            <div class="form-group">
                <?php if(!$params['model']->isNewRecord):?>
                    <div class="center">
                        <div class="btn-group">
                            <a href="<?php echo $this->createUrl('/callcenter/combo/combo', array('idCombo' => $params['model']->idCombo, 'opcion'=>'editar')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="editar" ? "active" : "") ?>">Editar</a>
                            <a href="<?php echo $this->createUrl('/callcenter/combo/combo', array('idCombo' => $params['model']->idCombo, 'opcion'=>'productos')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="productos" ? "active" : "") ?>" >Productos</a>
                            <a href="<?php echo $this->createUrl('/callcenter/combo/combo', array('idCombo' => $params['model']->idCombo, 'opcion'=>'imagen')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="imagen" ? "active" : "") ?>" >Imagen</a>
                            <a href="<?php echo $this->createUrl('/callcenter/combo/combo', array('idCombo' => $params['model']->idCombo, 'opcion'=>'sector')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="sector" ? "active" : "") ?>" >Sector</a>
                        </div>
                    </div>
                <?php endif;?>
                <div id="div-detalle-pedido" style="padding-top: 20px">
                    <?php $this->renderPartial($params['vista'], $params); ?>
                </div>
            </div>
        </div>
    </div>
</div>

