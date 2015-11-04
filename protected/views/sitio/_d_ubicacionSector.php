<div class="modal fade" id="modal-sector" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Seleccionar Sector</h4>
                        </div>
                        <div class="modal-body">
                            <section>
                                    <div class="container">
                                        <div class="row">
                                             <div class="col-md-6">     
                                                    <select id='selectSectores' class='form-control'  >
                                                    <?php foreach($sectores as $sector):?>
                                                        <optgroup label="<?php echo $sector->objSector->nombreSector ?>">
                                                            <?php foreach($sector->listPuntoReferencias as $puntoReferencia):?>
                                                            <option value="<?php echo $sector->objSector->codigoSector?>"> <?php echo $puntoReferencia->nombreReferencia ?></option>
                                                            <?php endforeach;?>            
                                                        </optgroup>

                                                    <?php endforeach;?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-6"> 
                                                <button type="button" data-role='cargar-sector' data-ciudad='<?php echo $ciudad?>' class="btn btn-success"> Aceptar </button>
                                             </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                      </div>
                    </div>
</div>