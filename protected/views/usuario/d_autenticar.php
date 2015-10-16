<?php $pagar = isset($pagar) ? $pagar : false ?>

<section>
	<div class="container">
		<div class="col-md-12 desplegables"> 
			<h3 class="text-center title-desp"><span class="glyphicon glyphicon-user"></span> Mi cuenta</h3>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
			  <div class="panel panel-default ">
			    <div class="panel-heading head-desplegable" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#ingresoSistema" aria-expanded="false" aria-controls="collapseOne">
			          Ingreso al sistema
			        </a>
			      </h4>
			    </div>
			    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
			    <div id="ingresoSistema" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
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
			    <div class="panel-heading head-desplegable" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#registroUsuario" aria-expanded="false" aria-controls="collapseTwo">
			          Registrarse
			        </a>
			      </h4>
			    </div>
			   <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
			    <div id="registroUsuario" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body" style="padding:10px 0px 20px 30px">
                                  <div class="col-md-12">
                                  <?php $this->renderPartial('/usuario/d_registro', array('model' => new RegistroForm('registro'))); ?>
                                  </div>
			      </div>
			    </div>
			  </div>
			</div>
			
		</div>
	</div>
</section>

    <?php if ($pagar): ?>
        <div class="ui-collapsible ui-collapsible-inset ui-corner-all ui-collapsible-themed-content ui-last-child ui-collapsible-collapsed">
            <h3 class="ui-collapsible-heading ui-collapsible-heading-collapsed"><?php echo CHtml::link('Pagar como invitado', $this->createUrl("/carro/pagoinvitado"), array('class' => 'ui-collapsible-heading-toggle ui-btn ui-icon-plus ui-btn-icon-left ui-btn-inherit', 'data-role' => 'none', 'data-ajax' => 'false')); ?></h3>
        </div>
    <?php endif; ?>
