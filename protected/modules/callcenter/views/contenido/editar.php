<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-1">
            <h2><i class="glyphicon glyphicon-file"></i> Modulos</h2>
        </div>
    </div>
    <div class="box-content row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="center">
                    <div class="btn-group">
                        <a href="<?php echo $this->createUrl('/callcenter/contenido/editar', array('idModulo' => $params['model']->idModulo, 'opcion'=>'editar')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="editar" ? "active" : "") ?>">Editar</a>
                        <a href="<?php echo $this->createUrl('/callcenter/contenido/editar', array('idModulo' => $params['model']->idModulo, 'opcion'=>'sector')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="sector" ? "active" : "") ?>" <?php echo $params['deshabilitados'] ? "disabled" : ""; ?> >Sector</a>
                        <a href="<?php echo $this->createUrl('/callcenter/contenido/editar', array('idModulo' => $params['model']->idModulo, 'opcion'=>'contenido')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="contenido" ? "active" : "") ?>" <?php echo $params['deshabilitados'] ? "disabled" : ""; ?> >Contenido</a>
                        <a href="<?php echo $this->createUrl('/callcenter/contenido/editar', array('idModulo' => $params['model']->idModulo, 'opcion'=>'categoria')) ?>" class="btn btn-primary <?php echo ($params['opcion']=="categoria" ? "active" : "") ?>" <?php echo $params['deshabilitados'] ? "disabled" : ""; ?> >Categoria</a>
                    </div>
                </div>

                <div id="div-detalle-pedido" style="padding-top: 20px">
                    <?php $this->renderPartial($params['vista'], $params); ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="pull-right">
                    <?php if($params['siguiente'] != null && !empty($params['siguiente'])):?>
                    <a href="<?php echo $params['siguiente']?>" class="btn btn-primary" >Siguiente</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
