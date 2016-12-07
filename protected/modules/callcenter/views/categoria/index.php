 <div class="box-content row" id='botones-modulos'>
        <div class="col-md-12">
            <div class="form-group">
                <div class="center">
                    <div class="btn-group">
                        <a href="<?php echo $this->createUrl('/callcenter/categoria/index', array('opcion' => 2 )) ?>" class="btn btn-primary <?php echo ($params['opcion']==2 ? "active" : "") ?>">Desktop</a>
                        <a href="<?php echo $this->createUrl('/callcenter/categoria/index', array('opcion' => 1 )) ?>" class="btn btn-primary <?php echo ($params['opcion']==1 ? "active" : "") ?>" >Móvil</a>
                       
                    </div>
                </div>
                <div id="div-categorias-tienda" style="padding-top: 20px">
                    <?php $this->renderPartial($params['vista'],$params);?>
                </div>
            </div>
        </div>
    </div>