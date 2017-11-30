<b> IDENTIFICACION: </b> <?= $modelLog->cedulaCliente ?> <BR/>
<b> NOMBRE: </b><?= $bono[0]->NOMBRE ?> <br/>
<b> VIGENCIA: </b> <?= $bono[0]->VIGENCIA_INICIO ?> - <?= $bono[0]->VIGENCIA_FINA ?> <BR/>
<b> VALOR BONO: </b> <?= Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $modelLog->valorBono, Yii::app()->params->formatoMoneda['moneda'])  ?> <br/>
<b> AGENTE: </b> <?= Yii::app()->controller->module->user->shortName ?> <br/>
<b> COMENTARIO: </b> <?= $modelLog->comentario ?> <br/>