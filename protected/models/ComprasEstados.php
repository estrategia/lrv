<?php

/**
 * This is the model class for table "t_ComprasEstados".
 *
 * The followings are the available columns in table 't_ComprasEstados':
 * @property integer $idCompraEstado
 * @property integer $idCompra
 * @property integer $idEstadoCompra
 * @property integer $idOperador
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property EstadoCompra $objEstadoCompra
 * @property Operador $objOperador
 * @property Compras $objCompra
 */
class ComprasEstados extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ComprasEstados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCompra, idEstadoCompra', 'required'),
            array('idCompra, idEstadoCompra, idOperador', 'numerical', 'integerOnly' => true),
            array('fecha','safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompraEstado, idCompra, idEstadoCompra, idOperador, fecha', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objEstadoCompra' => array(self::BELONGS_TO, 'EstadoCompra', 'idEstadoCompra'),
            'objOperador' => array(self::BELONGS_TO, 'Operador', 'idOperador'),
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompraEstado' => 'Id Compra Estado',
            'idCompra' => 'Id Compra',
            'idEstadoCompra' => 'Id Compra Estado Operador',
            'idOperador' => 'Id Operador',
            'fecha' => 'Fecha',
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

        $criteria->compare('idCompraEstado', $this->idCompraEstado);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('idEstadoCompra', $this->idEstadoCompra);
        $criteria->compare('idOperador', $this->idOperador);
        $criteria->compare('fecha', $this->fecha, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ComprasEstadoOperadores the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->fecha = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
    }
    
    /**
     * Metodo que hereda comportamiento de ValidateModelBehavior
     * @return void
     */
    public function behaviors() {
        return array(
            'ValidateModelBehavior' => array(
                'class' => 'application.components.behaviors.ValidateModelBehavior',
                'model' => $this
            ),
        );
    }
}
