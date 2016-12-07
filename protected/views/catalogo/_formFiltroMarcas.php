<?php if (!empty($formFiltro->listMarcas)): ?>
    <fieldset data-role="collapsible" data-mini="true" data-collapsed="false" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" class="cbnt_filprov ui-nodisc-icon">
        <legend><?php echo $formFiltro->getAttributeLabel('listMarcas'); ?></legend>
        <div data-role="controlgroup" class="clst_prov" data-mini="true">
            <?php foreach ($formFiltro->listMarcas as $idMarca => $nombreMarca): ?>
                <input type="checkbox" name="FiltroForm[listMarcas][<?php echo $idMarca ?>]" id="FiltroForm_listMarcas_<?php echo $idMarca ?>" value="<?php echo $idMarca ?>" <?php echo (isset($formFiltro->listMarcasCheck[$idMarca]) ? "checked" : "") ?>>
                <label for="FiltroForm_listMarcas_<?php echo $idMarca ?>" class="clst_check"><?php echo $nombreMarca ?></label>
            <?php endforeach; ?>
        </div>
    </fieldset>
<?php endif; ?>