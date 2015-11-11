<?php if (!empty($formFiltro->listCategoriasTienda)): ?>
    <div id="div-filtro-marcas" class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-marcas">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-marcas" aria-expanded="true" aria-controls="collapse-marcas" style="background:none;">
                    <?php echo $formFiltro->getAttributeLabel('listCategoriasTienda'); ?> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="collapse-marcas" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-marcas">
            <div class="panel-body">
                <ul>
                    <?php foreach ($formFiltro->listCategoriasTienda as $idCategoria => $nombreCategoria): ?>
                        <li>
                            <input type="checkbox" name="FiltroForm[listCategoriasTienda][<?php echo $idCategoria ?>]" id="FiltroForm_listCategoriasTienda_<?php echo $idCategoria ?>" value="<?php echo $idCategoria ?>" <?php echo (isset($formFiltro->listCategoriasTiendaCheck[$idCategoria]) ? "checked" : "") ?>>
                            <label for="FiltroForm_listCategoriasTienda_<?php echo $idCategoria ?>"><span></span> <?php echo $nombreCategoria ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
