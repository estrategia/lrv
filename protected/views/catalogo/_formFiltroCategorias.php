<?php if (!empty($formFiltro->listCategoriasTienda)): ?>
    <fieldset data-role="collapsible" data-mini="true" data-collapsed="false" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" class="cbnt_filprov ui-nodisc-icon">
        <legend><?php echo $formFiltro->getAttributeLabel('listCategoriasTienda'); ?></legend>
        <div data-role="controlgroup" class="clst_prov" data-mini="true">
            <?php foreach ($formFiltro->listCategoriasTienda as $idCategoria => $nombreCategoria): ?>
                <input type="checkbox" name="FiltroForm[listCategoriasTienda][<?php echo $idCategoria ?>]" id="FiltroForm_listCategoriasTienda_<?php echo $idCategoria ?>" value="<?php echo $idCategoria ?>" <?php echo (isset($formFiltro->listCategoriasTiendaCheck[$idCategoria]) ? "checked" : "") ?>>
                <label for="FiltroForm_listCategoriasTienda_<?php echo $idCategoria ?>" class="clst_check"><?php echo $nombreCategoria ?></label>
            <?php endforeach; ?>
        </div>
    </fieldset>
<?php endif; ?>