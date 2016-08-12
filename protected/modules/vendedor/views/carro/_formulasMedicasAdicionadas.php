<?php if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['formulaMedica']])): ?>

            <div class="space-2"></div>
            <?php $i = 1; ?>
            <?php foreach (Yii::app()->session[Yii::app()->params->vendedor['sesion']['formulaMedica']] as $formula): ?>
                <div class="ui-field-container contentPaso3 ui-bar ui-bar-a ui-corner-all">
                    <?php if(!empty($formula['nombreMedico'])):?>
                    <div><strong>Nombre del médico:</strong> <?php echo $formula['nombreMedico'] ?></div>
					<?php endif;?>
					<?php if(!empty($formula['institucion'])):?>
                    <div><strong>Institución:</strong> <?php echo $formula['institucion'] ?></div>
					<?php endif;?>
					<?php if(!empty($formula['registroMedico'])):?>
                    <div><strong>Registro médico:</strong> <?php echo $formula['registroMedico'] ?></div>
                    <?php endif;?>
					<?php if(!empty($formula['telefono'])):?>
					<div><strong>Teléfono:</strong> <?php echo $formula['telefono'] ?></div>
                    <?php endif;?>
					<?php if(!empty($formula['correoElectronico'])):?>
					<div><strong>Correo electrónico:</strong> <?php echo $formula['correoElectronico'] ?></div>					
                    <?php endif;?>
					<?php if(!empty($formula['formulaMedica'])):?>
					<div><strong>Formula anexa:</strong> 
                            <?php if(!empty($formula['formulaMedica'])): ?>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?> <?= "/".$formula['formulaMedica']?>" target="_blank" >Ver formula</a>
                            <?php endif;?>
                    </div> 
					<?php endif;?>                 
                </div>
            <?php endforeach; ?>

<?php endif; ?>