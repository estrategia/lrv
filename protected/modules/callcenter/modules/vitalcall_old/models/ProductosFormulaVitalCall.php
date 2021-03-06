<?php

/**
 * This is the model class for table "t_ProductosFormulaVitalCall".
 *
 * The followings are the available columns in table 't_ProductosFormulaVitalCall':
 * @property string $idFormula
 * @property string $idProductoVitalCall
 * @property string $cantidad
 * @property string $dosis
 * @property string $intervalo
 * @property string $fechaCreacion
 * @property string $fechaCompra
 * 
 * @property ProductosVitalCall $objProductoVC
 * @property FormulasVitalCall[] $listFormulasVC
 */
class ProductosFormulaVitalCall extends CActiveRecord {

	public $id, $diasTotales;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosFormulaVitalCall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idFormula, idProductoVitalCall, cantidad, dosis, intervalo, fechaCreacion', 'required'),
            array('idFormula, idProductoVitalCall, cantidad, dosis, intervalo', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idFormula, idProductoVitalCall, cantidad, dosis, intervalo, fechaCreacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        	'objFormulaVC' => array(self::BELONGS_TO, 'FormulasVitalCall', 'idFormula'),
            'objProductoVC' => array(self::BELONGS_TO, 'ProductosVitalCall', 'idProductoVitalCall'),
            'listFormulasVC' => array(self::HAS_MANY, 'FormulasVitalCall', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idFormula' => 'Id Formula',
            'idProductoVitalCall' => 'Id Producto Vitall Call',
            'cantidad' => 'Cantidad',
            'dosis' => 'Dosis',
            'intervalo' => 'Intervalo',
            'fechaCreacion' => 'Fecha Creacion',
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

        $criteria->compare('idFormula', $this->idFormula, true);
        $criteria->compare('idProductoVitalCall', $this->idProductoVitalCall, true);
        $criteria->compare('cantidad', $this->cantidad, true);
        $criteria->compare('dosis', $this->dosis, true);
        $criteria->compare('intervalo', $this->intervalo, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);

        $data =  new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        
        Yii::app()->session[Yii::app()->params->vitalCall['sesion']['busquedaExportar']] = $data;
        
        return $data;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductosFormulaVitalCall the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
    public static function obtenerFormulasVencer(){
    	
    	// , DATEDIFF(now(),fechaCompra) AS diasTranscurridos,
    						/* ADDDATE(currentDate, INTERVAL (floor(cantidadComprada/(24/intervalo*dosis))-DATEDIFF(now(),fechaCompra) DAY) as fechaVencimiento*/
    	$diasRecordatorio = implode(", ", Yii::app()->params->vitalCall['diasRecordatorioFormula']);
    	return self::model()->findAll(
    		array(
    			'with' => array( 
	    			'objProductoVC' => array('with' => 'objProducto'),
	    			'objFormulaVC' => array ( 'with' => 'objUsuarioVC') ),	
    			'select' => '*, floor(cantidadUltimaCompra/(24/intervalo*dosis)) as diasTotales',
    			'condition' => 	"cantidadComprada < cantidad and cantidadComprada > 0 and 
    				(floor(cantidadUltimaCompra/(24/intervalo*dosis))-DATEDIFF(now(),fechaCompra) in ($diasRecordatorio))",
    		//	'order' => 'diasVencimiento ASC',	
    		));
    	
    	// 
    	 
    }
    
    public function getDiasRestantes(){
    	$datetime1 = new DateTime($this->fechaCompra);
    	$interval = date_create('now')->diff( $datetime1 );
    	return ($this->diasTotales - $interval->d);
    }
    
    public function getDiaVencimiento(){
    	$diasRestantes = $this->getDiasRestantes();
    	$fechaActual = date('Y-m-d');
    	$fechaVencimiento = strtotime ( "+$diasRestantes day" , strtotime ($fechaActual ) ) ;
    	return date ( 'Y-m-d' , $fechaVencimiento ); 
    }

}
