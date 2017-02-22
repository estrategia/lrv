<?php 
/**
 * This is the model class for table "m_PlantillaCorreo".
 *
 * The followings are the available columns in table 'm_PlantillaCorreo':
 * @property string $nombrePlantilla
 * @property string $contenido
 * @property string $encabezado
 * @property string $pieDePagina
 */
  class PlantillaCorreo extends CActiveRecord
  {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_PlantillaCorreo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombrePlantilla, contenido', 'required'),
            array('nombrePlantilla', 'length', 'max' => 60),
            // array('descripcion', 'length', 'max' => 80),
            // // The following rule is used by search().
            // // @todo Please remove those attributes that should not be searched.
            // array('idBeneficioTipo, tipo, descripcion, fechaCreacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'nombrePlantilla' => 'Nombre',
            'contenido' => 'Contenido',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        // $criteria->compare('idBeneficioTipo', $this->idBeneficioTipo);
        // $criteria->compare('tipo', $this->tipo);
        // $criteria->compare('descripcion', $this->descripcion, true);
        // $criteria->compare('fechaCreacion', $this->fechaCreacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PlantillaCorreo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
    public static function getContenido($nombrePlantilla, $contenidoCorreo){
    	$header = PlantillaCorreo::model()->find(array(
    			'condition' => 'nombrePlantilla =:nombre',
    			'params' => array(
    					':nombre' => Yii::app()->params->plantillasCorreo['header'],
    			)
    	));
    		
    	$footer = PlantillaCorreo::model()->find(array(
    			'condition' => 'nombrePlantilla =:nombre',
    			'params' => array(
    					':nombre' => Yii::app()->params->plantillasCorreo['footer'],
    			)
    	));
    		
    	$plantilla = PlantillaCorreo::model()->find(array(
    			'condition' => 'nombrePlantilla =:nombre',
    			'params' => array(
    					':nombre' => Yii::app()->params->plantillasCorreo[$nombrePlantilla],
    			)
    	));
    		
    	if(isset($plantilla->contenido)){
    		$plantilla->contenido = str_replace("@contenido", $contenidoCorreo, $plantilla->contenido);
    		$contenidoCorreo = $plantilla->contenido;
    	}
    	
    	$htmlCorreo = Yii::app()->controller->renderPartial('application.views.common.correo', array(
    			'contenido' => $contenidoCorreo,
    			'header' => isset($header->contenido)? $header->contenido:'',
    			'footer' => isset($footer->contenido)? $footer->contenido:'',
    	), true, true);
    	
    		
    	return $htmlCorreo;
    }
    
    public static function getContenidoConsola($nombrePlantilla, $contenidoCorreo){
    	$header = PlantillaCorreo::model()->find(array(
    			'condition' => 'nombrePlantilla =:nombre',
    			'params' => array(
    					':nombre' => Yii::app()->params->plantillasCorreo['header'],
    			)
    	));
    
    	$footer = PlantillaCorreo::model()->find(array(
    			'condition' => 'nombrePlantilla =:nombre',
    			'params' => array(
    					':nombre' => Yii::app()->params->plantillasCorreo['footer'],
    			)
    	));
    
    	$plantilla = PlantillaCorreo::model()->find(array(
    			'condition' => 'nombrePlantilla =:nombre',
    			'params' => array(
    					':nombre' => Yii::app()->params->plantillasCorreo[$nombrePlantilla],
    			)
    	));
    
    	if(isset($plantilla->contenido)){
    		$plantilla->contenido = str_replace("@contenido", $contenidoCorreo, $plantilla->contenido);
    		$contenidoCorreo = $plantilla->contenido;
    	}
    	$ccc = new CController('context');
    	$htmlCorreo = $ccc->renderInternal(Yii::getPathOfAlias('application.views.common.correo').'.php', array('contenido' => $contenidoCorreo,
    			'header' => isset($header->contenido)? $header->contenido:'',
    			'footer' => isset($footer->contenido)? $footer->contenido:'',), true);
    
    	return $htmlCorreo;
    }
    
   
  }
?>