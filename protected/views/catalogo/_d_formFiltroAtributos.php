<?php foreach ($formFiltro->listFiltros as $idFiltro => $filtro): ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-filtro-<?php echo $idFiltro ?>">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-filtro-<?php echo $idFiltro ?>" aria-expanded="false" aria-controls="collapse-filtro-<?php echo $idFiltro ?>" style="background:none;">
                    <?php echo $filtro['nombreFiltro'] ?> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="collapse-filtro-<?php echo $idFiltro ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-filtro-<?php echo $idFiltro ?>">
            <div class="panel-body">
                <ul>
                    <?php foreach ($filtro['listFiltros'] as $idFiltroDetalle => $nombreDetalle): ?>
                        <li>
                            <input type="checkbox" name="FiltroForm[listFiltros][<?php echo $idFiltroDetalle ?>]" id="FiltroForm_listFiltros_<?php echo $idFiltroDetalle ?>" value="<?= $idFiltroDetalle ?>" data-filtro="<?= $idFiltro ?>" <?php echo (isset($formFiltro->listFiltrosCheck[$idFiltroDetalle]) ? "checked" : "") ?>>
                            <label for="FiltroForm_listFiltros_<?php echo $idFiltroDetalle ?>"><span></span><?php echo $nombreDetalle ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>