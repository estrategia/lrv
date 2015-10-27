<div class="container">


<div class="modal fade" id="modalUbicacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<section>
    
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-5 " >
                Seleccione el método de entrega
                <select id='tipo_entrega' name='tipo_entrega' class='form-control' onchange="cambiarEstadoTipoEntrega()">
                    <option value=''>Seleccione...</option>
                    <option value='<?php echo  Yii::app()->params->entrega['tipo']['presencial'];?>'>Quiero pasar por el pedido</option>
                    <option value='<?php echo  Yii::app()->params->entrega['tipo']['domicilio'];?>'>Quiero que me lo entreguen a domicilio</option>
                </select>
            </div>
        </div>
        <div class="row">
             <div class="col-md-5 " >
                <h3 class="">
                 <?php if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                     Selecciona la ubicación 
                 <?php else: ?>
                     Selecciona la ubicación 
                 <?php endif; ?>
                 </h3> 
             </div>
        </div>
        <div class="row">
            <div class="col-md-5 " >
            <?php echo CHtml::htmlButton('Usar la ubicación de tu dispositivo', array('class' => 'btn btn-danger btn-ciudad', 'onclick' => 'ubicacionGPSDesktop();')); ?>
            </div><br/>
        </div>
        <div class="row">
            <div class="col-md-5">
            <h3 class="" style="font-weight:bold;">ó</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
             <h3 class="">Seleccionar ciudad</h3>
             <select class="form-control ciudades" id="ciudadDespacho" onclick="">
                <?php foreach ($listCiudadesSectores as $ciudad): ?>
                    <?php if (!empty($ciudad->listSectores)): ?>
                           <option value="<?php echo $ciudad->codigoCiudad ?>"><?php echo $ciudad->nombreCiudad ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
             <br/>
             <?php echo CHtml::link('Usar esta ubicación', 'javascript:cargarCiudad()',array('class' => 'btn btn-success btn-ciudad', 'data-ajax' => 'false')); ?>
            </div>
        </div>
         <br/><br/><br/>
        <?php if($objSectorCiudad!=null):?>
         <div class="row">
            <div class="col-md-5">
                <?php $urlRefer=(isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) ? Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]:$this->createUrl('/sitio/inicio'))?>
            <?php echo CHtml::link('Continuar en ' . $this->sectorName, $urlRefer, array('class' => 'btn btn-warning btn-ciudad', 'data-mini' => 'true', 'data-ajax' => 'false')); ?>
            </div>
         </div>
        <?php endif;?>
    </div>
</section>
</div>
<!--
<div data-role="popup" id="popup-ubicacion-gps" data-dismissible="false" data-position-to="window" data-theme="a">
    <a href="#" data-rel="back" class="">Close</a>
    <div data-role="main">
        <div data-role="content">
            <div class="center"></div>
            <a href="#" class="" data-ajax='false'>Usar esta ubicación</a>
            <a href="#" class="" data-rel='back'>Cerrar</a>
        </div>
    </div>
</div>
-->
<?php $this->extraContentList[] = $this->renderPartial('_ubicacionSectores', array('listCiudadesSubsectores' => $listCiudadesSubsectores), true); ?>