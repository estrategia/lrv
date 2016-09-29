<?php

/**
 * This is the model class for table "t_ProductosVitallCall".
 *
 * The followings are the available columns in table 't_ProductosVitallCall':
 * @property string $idProductoVitalCall
 * @property string $codigoProducto
 * @property string $descripcion
 * @property integer $estado
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $fechaCreacion
 *
 * The followings are the available model relations:
 * @property FormulasVitalCall[] $listFormulasVC
 * @property Producto $objProducto
 */
class ProductosVitallCall extends CActiveRecord {

    protected $esVigente = null;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosVitallCall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoProducto, descripcion, fechaInicio, fechaFin, fechaCreacion', 'required'),
            array('estado', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            array('descripcion', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idProductoVitalCall, codigoProducto, descripcion, estado, fechaInicio, fechaFin, fechaCreacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'listFormulasVC' => array(self::MANY_MANY, 'FormulasVitalCall', 't_ProductosFormulaVitalCall(idProductoVitalCall, idFormula)'),
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idProductoVitalCall' => 'Id Producto Vitall Call',
            'codigoProducto' => 'Codigo Producto',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
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

        $criteria->compare('idProductoVitalCall', $this->idProductoVitalCall, true);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductosVitallCall the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function esVigente() {
        if ($this->esVigente !== null) {
            return $this->esVigente;
        }

        if ($this->estado == 1) {
            $fecha = new DateTime;
            $fechaInicio = DateTime::createFromFormat('Y-m-d H:i:s', $this->fechaInicio . ' 00:00:00');
            $fechaFin = DateTime::createFromFormat('Y-m-d H:i:s', $this->fechaFin . ' 23:59:59');

            $diff1 = $fechaInicio->diff($fecha);
            $diff2 = $fecha->diff($fechaFin);

            if ($diff1->invert == 1 || $diff2->invert == 1) {
                $this->esVigente = false;
                return false;
            }

            $this->esVigente = true;
            return true;
        }

        $this->esVigente = false;
        return false;
    }
    
    public function exportar() {
    	ini_set('memory_limit', '-1');
    	$content = '"Codigo Producto";"Nombre Producto";"Descripcion";"Estado";"Fecha Inicio";"Fecha Fin";"Fecha Creacion"'."\n";
    	$dataProvider = $this->search(true);
    
    	if ($dataProvider !== null) {
    		foreach ($dataProvider->getData() as $idx => $objProductoVitalCall) {
    			$producto = $objProductoVitalCall->objProducto->descripcionProducto;//$objProductoVitalCall->objProducto->descripcionProducto;
    			$content .= "$objProductoVitalCall->codigoProducto;$producto;$objProductoVitalCall->descripcion;$objProductoVitalCall->estado;$objProductoVitalCall->fechaInicio;$objProductoVitalCall->fechaFin;$objProductoVitalCall->fechaCreacion\n";
    		}
    	}
    
    	Yii::app()->request->sendFile('ProductosVitalCall_' . date('YmdHis') . '.csv', $content);
    	Yii::app()->end();
    }

}
