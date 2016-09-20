<?php if(isset(Yii::app()->session[Yii::app()->params->sesion['formulaMedica']])):?>
<div class="space-2"></div>
<table data-role="table" class="table table-bordered table-strip">
    <tr>
        <th> # </th>
        <th> Nombre del médico </th>
        <th> Institución </th>
        <th> Registro médico </th>
        <th> Teléfono </th>
        <th> Correo Electrónico </th>		
        <th> Formula anexa </th>
    </tr>
        <?php $i = 1;?>
        <?php foreach(Yii::app()->session[Yii::app()->params->sesion['formulaMedica']] as $formula):?>
            <tr>
                <td> <?= $i++ ?> </td>
                <td> <?= $formula['nombreMedico']?> </td>
                <td> <?= $formula['institucion']?> </td>
                <td> <?= $formula['registroMedico']?> </td>
                <td> <?= $formula['telefono']?> </td>
                <td> <?= $formula['correoElectronico']?> </td>				
                <td> <?php if(!empty($formula['formulaMedica'])): ?>
                                        <a href="<?php echo Yii::app()->request->baseUrl."/".$formula['formulaMedica']?>" target="_blank" >Ver formula</a>
                            <?php endif;?> 
                </td>
            </tr>
        <?php endforeach; ?>
<?php endif; ?>
</table>
