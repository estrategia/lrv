

<div class="col-md-12 "> 
            <h3 class="text-center title-desp"><span class="glyphicon glyphicon-glass"></span> Categorías</h3>
            <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][1] ?>" href="#" data-categoria-raiz='-1' data-categoria-padre='-1' data-role='crear-categoria' data-nivel='1' data-dispositivo='<?php echo $opcion?>' >Crear Categoría  </a>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                
            <?php foreach($categorias as $categoriaNivel1):?>    
                <div class="panel panel-default ">
                    <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class = "collapsed"  data-toggle="collapse" data-parent="#accordion" href="#cat-<?php echo $categoriaNivel1->idCategoriaTienda ?>" aria-expanded="false" aria-controls="collapseOne">
                               <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/<?php echo $categoriaNivel1->rutaImagen ?>"/> <?php echo $categoriaNivel1->nombreCategoriaTienda ?>
                            </a>
                        </h4>
                        <br/> <!-- Editar categoria -->
                        <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][3] ?>" href="#" data-categoria='<?php echo $categoriaNivel1->idCategoriaTienda ?>' data-categoria-raiz='<?php echo $categoriaNivel1->idCategoriaRaiz ?>' data-categoria-padre='<?php echo $categoriaNivel1->idCategoriaPadre ?>' data-role='editar-categoria' data-nivel='1' data-dispositivo='<?php echo $opcion?>' >Editar Categoría  </a>

                    </div>
                    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                    <div id="cat-<?php echo $categoriaNivel1->idCategoriaTienda ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body" style="padding:10px 0px 20px 30px">
                            <div class="col-md-12">
                               <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][1] ?>" href="#" data-role='crear-categoria' data-nivel='2' data-categoria-raiz='<?php echo $categoriaNivel1->idCategoriaTienda ?>' data-categoria-padre='<?php echo $categoriaNivel1->idCategoriaTienda ?>' data-dispositivo='<?php echo $opcion?>' >Crear Categoría  </a>
                                    <div class="panel-group" id="accordion-<?php echo $categoriaNivel1->idCategoriaTienda?>" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                                        <?php foreach($categoriaNivel1->listCategoriasHijas as $categoriaNivel2):?>
                                            <div class="panel panel-default ">
                                                <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a class = "collapsed"  data-toggle="collapse" data-parent="#accordion-<?php echo $categoriaNivel2->idCategoriaTienda?>" href="#cat-<?php echo $categoriaNivel2->idCategoriaTienda ?>" aria-expanded="false" aria-controls="collapseOne">
                                                           <?php echo $categoriaNivel2->nombreCategoriaTienda ?>
                                                        </a>
                                                    </h4>
                                                    <br/> <!-- Editar categoria -->
                                                    <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][3] ?>" href="#" data-categoria='<?php echo $categoriaNivel2->idCategoriaTienda ?>' data-categoria-raiz='<?php echo $categoriaNivel2->idCategoriaRaiz ?>' data-categoria-padre='<?php echo $categoriaNivel2->idCategoriaPadre ?>' data-role='editar-categoria' data-nivel='2' data-dispositivo='<?php echo $opcion?>' >Editar Categoría  </a>
 
                                                </div>
                                                <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                                                <div id="cat-<?php echo $categoriaNivel2->idCategoriaTienda ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body" style="padding:10px 0px 20px 30px">
                                                        <div class="col-md-12">
                                                           <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][1] ?>" href="#" data-role='crear-categoria' data-nivel='3' data-categoria-raiz='<?php echo $categoriaNivel1->idCategoriaTienda ?>' data-categoria-padre='<?php echo $categoriaNivel2->idCategoriaTienda ?>' data-dispositivo='<?php echo $opcion?>' >Crear Categoría  </a>
                                                             <div class="panel-group" id="accordion-<?php echo $categoriaNivel2->idCategoriaTienda?>" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                                                                    <?php foreach($categoriaNivel2->listCategoriasHijas as $categoriaNivel3):?>
                                                                        <div class="panel panel-default ">
                                                                            <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a class = "collapsed"  data-toggle="collapse" data-parent="#accordion-<?php echo $categoriaNivel3->idCategoriaTienda?>" href="#cat-<?php echo $categoriaNivel3->idCategoriaTienda ?>" aria-expanded="false" aria-controls="collapseOne">
                                                                                       <?php echo $categoriaNivel3->nombreCategoriaTienda ?>
                                                                                    </a>
                                                                                </h4>
                                                                                <br/> <!-- Editar categoria -->
                                                                                <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][3] ?>" href="#" data-categoria='<?php echo $categoriaNivel3->idCategoriaTienda ?>' data-categoria-raiz='<?php echo $categoriaNivel3->idCategoriaRaiz ?>' data-categoria-padre='<?php echo $categoriaNivel3->idCategoriaPadre ?>' data-role='editar-categoria' data-nivel='3' data-dispositivo='<?php echo $opcion?>' >Editar Categoría  </a>
                                                                                <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][4] ?>" href="#" data-categoria='<?php echo $categoriaNivel3->idCategoriaTienda ?>' data-role='asociar-categorias' data-nivel='3' data-dispositivo='<?php echo $opcion?>' >Asociar Categorías BI  </a>
                                                                            </div>
                                                                            <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                                                                            <div id="cat-<?php echo $categoriaNivel3->idCategoriaTienda ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                                                
                                                                                <?php if(count($categoriaNivel3->listCategoriasBI)>0):?>
                                                                                        <table class="table table-bordered table-hover table-striped">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th>Categoría del BI</th>
                                                                                                        <th></th>
                                                                                                    </tr>
                                                                                    <?php foreach($categoriaNivel3->listCategoriasBI as $categoriaBi):?>
                                                                                                    <tr>
                                                                                                        <td><?php echo $categoriaBi->nombreCategoria ?></td>
                                                                                                        <td> <a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][2] ?>" href="#" data-categoria='<?php echo $categoriaNivel3->idCategoriaTienda ?>' data-dispositivo='<?php echo $opcion ?>' data-categoria-bi='<?php echo $categoriaBi->idCategoriaBI ?>' data-role='eliminar-categoria-bi'> Eliminar  </a></td>
                                                                                                    </tr>
                                                                                    <?php endforeach;?>
                                                                                                </tbody>
                                                                                        </table>
                                                                                <?php endif;?>
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
            </div>
</div>