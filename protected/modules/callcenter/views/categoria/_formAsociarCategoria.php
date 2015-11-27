<div class="modal fade" id="modal-categoria-asociacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog"  style='width:50%' role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Categoria</h4>
          </div>
          <div class="modal-body" id='pre-contenido-modal' style='overflow-y: auto;max-height: 60%' > 
              <?php foreach($categorias as $categoriaNivel1):?>    
                <div class="panel panel-default ">
                    <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class = "collapsed"  data-toggle="collapse" data-parent="#accordion" href="#cat-<?php echo $categoriaNivel1->idCategoriaBI?>" aria-expanded="false" aria-controls="collapseOne">
                               <?php echo $categoriaNivel1->nombreCategoria ?>
                            </a>
                        </h4>
                    </div>
                    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                    <div id="cat-<?php echo $categoriaNivel1->idCategoriaBI ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body" style="padding:10px 0px 20px 30px">
                            <div class="col-md-12">
                                    <div class="panel-group" id="accordion-<?php echo $categoriaNivel1->idCategoriaBI?>" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                                        <?php foreach($categoriaNivel1->listCategoriasHijas as $categoriaNivel2):?>
                                            <div class="panel panel-default ">
                                                <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a class = "collapsed"  data-toggle="collapse" data-parent="#accordion-<?php echo $categoriaNivel2->idCategoriaBI?>" href="#cat-<?php echo $categoriaNivel2->idCategoriaBI ?>" aria-expanded="false" aria-controls="collapseOne">
                                                           <?php echo $categoriaNivel2->nombreCategoria ?>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                                                <div id="cat-<?php echo $categoriaNivel2->idCategoriaBI ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body" style="padding:10px 0px 20px 30px">
                                                        <div class="col-md-12">
                                                             <div class="panel-group" id="accordion-<?php echo $categoriaNivel2->idCategoriaBI?>" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                                                                    <?php foreach($categoriaNivel2->listCategoriasHijasHijas as $categoriaNivel3):?>
                                                                        <div class="panel panel-default ">
                                                                            <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a class = "collapsed"  data-toggle="collapse" data-parent="#accordion-<?php echo $categoriaNivel3->idCategoriaBI?>" href="#cat-<?php echo $categoriaNivel3->idCategoriaBI ?>" aria-expanded="false" aria-controls="collapseOne">
                                                                                       <?php echo $categoriaNivel3->nombreCategoria ?>
                                                                                    </a>
                                                                                </h4>
                                                                                <div id='btn-<?php echo $categoriaNivel3->idCategoriaBI?>'>
                                                                                <?php if(count($categoriaNivel3->listCategoriasTiendaCategoria) > 0):?>
                                                                                    Añadido
                                                                                <?php else:?>    
                                                                                    <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][3] ?>" href="#" data-categoria='<?php echo $idCategoriaTienda ?>' data-categoria-bi='<?php echo $categoriaNivel3->idCategoriaBI ?>' data-dispositivo='<?php echo $dispositivo ?>' data-role='add-categoria-bi'> Añadir  </a>
                                                                                <?php endif;?>
                                                                                </div>
                                                                             </div>
                                                                           
                                                                        </div>
                                                                    <?php endforeach;?>
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
          <?php endforeach ?> 
          <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
</div>