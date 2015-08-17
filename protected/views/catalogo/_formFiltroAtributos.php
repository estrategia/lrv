<?php foreach ($formFiltro->listFiltros as $filtro): ?>
    <fieldset data-role="collapsible" data-mini="true" data-collapsed="false" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" class="cbnt_filprov ui-nodisc-icon">
        <legend><?php echo $filtro['nombreFiltro'] ?></legend>
        <div data-role="controlgroup" class="clst_prov" data-mini="true">
            <?php foreach ($filtro['listFiltros'] as $idFiltroDetalle => $nombreDetalle): ?>
                <input type="checkbox" name="FiltroForm[listFiltros][<?php echo $idFiltroDetalle ?>]" id="FiltroForm_listFiltros_<?php echo $idFiltroDetalle ?>" value="<?php echo $idFiltroDetalle ?>" <?php echo (isset($formFiltro->listFiltrosCheck[$idFiltroDetalle]) ? "checked" : "") ?>>
                <label for="FiltroForm_listFiltros_<?php echo $idFiltroDetalle ?>" class="clst_check"><?php echo $nombreDetalle ?></label>
            <?php endforeach; ?>
        </div>
    </fieldset>
<?php endforeach; ?>