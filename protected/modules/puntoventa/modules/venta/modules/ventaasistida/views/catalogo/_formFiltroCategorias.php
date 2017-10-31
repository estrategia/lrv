<?php if (!empty($formFiltro->listCategoriasTienda)): ?>
    <div id="div-filtro-marcas" class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-categorias">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-categorias" aria-expanded="true" aria-controls="collapse-categorias" style="background:none;">
                    <?php echo $formFiltro->getAttributeLabel('listCategoriasTienda'); ?>
                </a>
            </h4>
        </div>
        <div id="collapse-categorias-" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-categorias">
            <div class="panel-body">
                <ul>
                    <?php foreach ($formFiltro->listCategoriasTienda as $idCategoria => $nombreCategoria): ?>
                        <li>
                            <input type="checkbox" name="FiltroForm[listCategoriasTienda][<?php echo $idCategoria ?>]" id="FiltroForm_listCategoriasTienda_<?php echo $idCategoria ?>" value="<?php echo $idCategoria ?>" <?php echo (isset($formFiltro->listCategoriasTiendaCheck[$idCategoria]) ? "checked" : "") ?>>
                            <label for="FiltroForm_listCategoriasTienda_<?php echo $idCategoria ?>"><span></span> <?php echo mb_strtolower($nombreCategoria, 'UTF-8') ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
