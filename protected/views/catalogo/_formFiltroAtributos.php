<?php if (!empty($formFiltro->listAtributos)): ?>
    <fieldset data-role="collapsible" data-mini="true" data-collapsed="false" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" class="cbnt_filprov ui-nodisc-icon">
        <legend><?php echo $formFiltro->getAttributeLabel('listAtributos'); ?></legend>
        <div data-role="controlgroup" class="clst_prov" data-mini="true">
            <?php foreach ($formFiltro->listAtributos as $idAtributo => $nombreAtributo): ?>
                <input type="checkbox" name="FiltroForm[listAtributos][<?php echo $idAtributo ?>]" id="FiltroForm_listAtributos_<?php echo $idAtributo ?>" value="<?php echo $idAtributo ?>" <?php echo (isset($formFiltro->listAtributosCheck[$idAtributo]) ? "checked" : "") ?>>
                <label for="FiltroForm_listAtributos_<?php echo $idAtributo ?>" class="clst_check"><?php echo $nombreAtributo ?></label>
            <?php endforeach; ?>
        </div>
    </fieldset>
<?php endif; ?>