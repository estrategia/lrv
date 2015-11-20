<input type="hidden" name="idModulo" value="<?php echo $idModulo?>" id="idGrupoModulo" />    
<div id="grid-modulo-modulos">    
<?php $this->renderPartial('_gridModulos', array('model' => $modelModulos, 'idModulo' => $idModulo, 'vista' => 'grupomodulos')) ?>
</div>

<div class="box-header well">
    <div class="col-lg-11">
        <h2><i class="glyphicon glyphicon-file"></i> Modulos Adicionados</h2>
    </div> 
</div>
<div id="grid-modulos-adicionados">
    <?php $this->renderPartial('_modulosAdicionados', array('modulosAdicionados' => $modulosAdicionados, 'idModulo' => $idModulo)) ?>
</div>

