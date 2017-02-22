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
            <h2><i class="glyphicon glyphicon-file"></i> Promociones</h2>
        </div>
    </div>
    <div class="box-content row" id='botones-modulos'>
        <div class="col-md-12">
            <div class="form-group">
                <div class="center">
                    <?php if(!empty($params['model']->titulo)):?>
                    <strong><?php echo $params['model']->titulo ?></strong>
                    <br/>
                    <?php endif;?>
                    <div class="btn-group">
                        <a href="<?php echo $this->createUrl('/callcenter/promociones/editar', array('idPromocion' => $params['model']->idPromocion, 'opcion'=>'editar')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="editar" ? "active" : "") ?>">Editar</a>
                        <a href="<?php echo $this->createUrl('/callcenter/promociones/sectorCiudad', array('idPromocion' => $params['model']->idPromocion, 'opcion'=>'sector')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="sector" ? "active" : "") ?>" >Sector</a>
                        <a href="<?php echo $this->createUrl('/callcenter/promociones/categoriasPromocion', array('idPromocion' => $params['model']->idPromocion, 'opcion'=>'categoria')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="categoria" ? "active" : "") ?>" >Categorias</a>
                    </div>
                    <br/>
                </div>

                <div id="div-detalle-pedido" style="padding-top: 20px">
                    <?php $this->renderPartial($params['vista'], $params); ?>
                </div>
            </div>
        </div>
    </div>
</div>
