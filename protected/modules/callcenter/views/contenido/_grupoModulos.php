<input type="hidden" name="idModulo" value="<?php echo $idModulo?>" id="idGrupoModulo" />    
<div id="grid-modulo-modulos">    
<?php $this->renderPartial('_gridGrupoModulos', array('modelModulos' => $modelModulos, 'idModulo' => $idModulo)) ?>
</div>


<div id="grid-modulos-adicionados">
    <?php $this->renderPartial('_modulosAdicionados', array('modulosAdicionados' => $modulosAdicionados, 'idModulo' => $idModulo)) ?>
</div>

