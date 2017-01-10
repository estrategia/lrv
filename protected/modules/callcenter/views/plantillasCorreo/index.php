<?php
  $this->breadcrumbs = array(
    'Plantillas de correo',
    'Listado',
  );
  $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'pager' => array 
    (
      'class' => 'CLinkPager',
      'pagesize' => 3
    ),
    'columns' => array 
    (
      array
      (
        'header' => 'Nombre',
        'value' => '$data->nombrePlantilla'
      ),
      array
      (
        'header' => 'Contenido',
        'value' => '$data->contenido'
      ),
      array
      (
        'header' => '',
        'class' => 'CButtonColumn',
        'template' => '{actualizar}',
        'buttons' => array
        (
          'actualizar' => array
          (
            'label' => 'Actualizar',
            // 'url' => 'Yii::app()->createUrl("actualizar",array("$id" => $data->id))'
            'url' => 'Yii::app()->baseUrl . "/callcenter/plantillasCorreo/actualizar?id=" . $data->id'

          )
        )
      )
    )
  ));
?>