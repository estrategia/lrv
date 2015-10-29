<?php $pagar = isset($pagar) ? $pagar : false ?>
<?php $opcion = isset($opcion) ? $opcion : null ?>
<section>
    <div class="container">
        <div class="col-md-12 desplegables"> 
            <h3 class="text-center title-desp"><span class="glyphicon glyphicon-user"></span> Mi cuenta</h3>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                <div class="panel panel-default ">
                    <div class="panel-heading head-desplegable" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class = "<?php echo ($opcion == 'inicio') ? "" : "collapsed" ?>" data-toggle="collapse" data-parent="#accordion" href="#ingresoSistema" aria-expanded="<?php echo ($opcion == 'inicio') ? "true" : "false" ?>" aria-controls="collapseOne">
                                Ingreso al sistema
                            </a>
                        </h4>
                    </div>
                    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                    <div id="ingresoSistema" class="panel-collapse collapse<?php echo ($opcion == 'inicio') ? " in" : "" ?>" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body" style="padding:10px 0px 20px 30px">
                            <div class="col-md-12">
                                <?php $this->renderPartial('/usuario/d_ingreso', array('model' => new LoginForm)); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading head-desplegable" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#recordarPassword" aria-expanded="false" aria-controls="collapseTwo">
                                Recordar Contraseña
                            </a>
                        </h4>
                    </div>
                    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                    <div id="recordarPassword" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body" style="padding:10px 0px 20px 30px">
                            <div class="col-md-12">
                                <?php $this->renderPartial('/usuario/d_recordar', array('model' => new RecordarForm)); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading head-desplegable" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="<?php echo ($opcion == 'registro') ? "" : "collapsed" ?>" data-toggle="collapse" data-parent="#accordion" href="#registroUsuario" aria-expanded="<?php echo ($opcion == 'registro') ? "true" : "false" ?>" aria-controls="collapseThree">
                                Registrarse
                            </a>
                        </h4>
                    </div>
                    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                    <div id="registroUsuario" class="panel-collapse collapse <?php echo ($opcion == 'registro') ? "in" : "" ?>" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body" style="padding:10px 0px 20px 30px">
                            <div class="col-md-12">
                                <?php $this->renderPartial('/usuario/d_registro', array('model' => new RegistroForm('registro'))); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($pagar): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading head-desplegable">
                            <h4 class="panel-title">
                                <a class="collapsed" href="<?php echo $this->createUrl("/carro/pagoinvitado") ?>">
                                    Pagar como invitado
                                </a>
                            </h4>
                        </div>
                        <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>
