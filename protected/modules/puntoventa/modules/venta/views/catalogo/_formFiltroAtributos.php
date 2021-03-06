<?php foreach ($formFiltro->listFiltros as $idFiltro => $filtro): ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-filtro-<?php echo $idFiltro ?>">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-filtro-<?php echo $idFiltro ?>" aria-expanded="true" aria-controls="collapse-filtro-<?php echo $idFiltro ?>" style="background:none;">
                    <?php echo $filtro['nombreFiltro'] ?>
                </a>
            </h4>
        </div>
        <div id="collapse-filtro-<?php echo $idFiltro ?>-" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-filtro-<?php echo $idFiltro ?>">
            <div class="panel-body">
                <ul>
                    <?php foreach ($filtro['listFiltros'] as $idFiltroDetalle => $nombreDetalle): ?>
                        <li>
                            <input type="checkbox" name="FiltroForm[listFiltros][<?php echo $idFiltroDetalle ?>]" id="FiltroForm_listFiltros_<?php echo $idFiltroDetalle ?>" value="<?= $idFiltroDetalle ?>" data-filtro="<?= $idFiltro ?>" <?php echo (isset($formFiltro->listFiltrosCheck[$idFiltroDetalle]) ? "checked" : "") ?>>
                            <label for="FiltroForm_listFiltros_<?php echo $idFiltroDetalle ?>"><span></span><?php echo mb_strtolower($nombreDetalle, 'UTF-8') ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>