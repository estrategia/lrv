<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'id' => "form-ordenamiento-listaproductos",
    ),
    'errorMessageCssClass' => 'has-error',
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'errorCssClass' => 'has-error',
        'successCssClass' => 'has-success',
    ))
);
?>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-ordenamiento">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion-ordenamiento" href="#collapse-ordenamiento" aria-expanded="true" aria-controls="collapse-ordenamiento" style="background:none;">
                Ordenar <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </h4>
    </div>
    <div id="collapse-ordenamiento" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-ordenamiento">
        <div class="panel-body">
            <ul>
                <?php foreach ($formOrdenamiento->getOpciones($objSectorCiudad == null ? OrdenamientoForm::NO_PRECIO : OrdenamientoForm::SI_PRECIO) as $valor => $nombre): ?>
                    <li>
                        <input type="radio" name="OrdenamientoForm[orden]" data-mini="true" id="OrdenamientoForm_orden_<?php echo $valor ?>" value="<?php echo $valor ?>" <?php echo ($formOrdenamiento->orden == $valor ? "checked='checked'" : "") ?> />
                        <label for="OrdenamientoForm_orden_<?php echo $valor ?>" class="clst_radio"><span></span><?php echo $nombre ?></label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<a href="#" data-role="orden-listaproductos" ><div class="button">Ordenar</div></a>
<?php $this->endWidget(); ?>
