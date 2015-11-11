<?php

/**
 * This is the model class for table "t_ComprasObservaciones".
 *
 * The followings are the available columns in table 't_ComprasObservaciones':
 * @property integer $idCompraobservacion
 * @property integer $idCompra
 * @property string $observacion
 * @property integer $idOperador
 * @property string $fecha
 * @property integer $notificarCliente
 * @property integer $idTipoObservacion
 *
 * The followings are the available model relations:
 * @property Operador $objOperador
 * @property Compras $objCompra
 * @property TipoObservacion $objTipoObservacion
 */
class ComprasObservaciones extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ComprasObservaciones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCompra, idOperador, notificarCliente, idTipoObservacion', 'numerical', 'integerOnly' => true),
            array('observacion, fecha', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompraobservacion, idCompra, observacion, idOperador, fecha, notificarCliente, idTipoObservacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objOperador' => array(self::BELONGS_TO, 'Operador', 'idOperador'),
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
            'objTipoObservacion' => array(self::BELONGS_TO, 'TipoObservacion', 'idTipoObservacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompraobservacion' => 'Id Compra observacion',
            'idCompra' => 'Id Compra',
            'observacion' => 'observacion',
            'idOperador' => 'Id Operador',
            'fecha' => 'Fecha',
            'notificarCliente' => 'Notificar Cliente',
            'idTipoObservacion' => 'Observacion',
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

        $criteria->compare('idCompraobservacion', $this->idCompraobservacion);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('observacion', $this->observacion, true);
        $criteria->compare('idOperador', $this->idOperador);
        $criteria->compare('fecha', $this->fecha, true);
        $criteria->compare('notificarCliente', $this->notificarCliente);
        $criteria->compare('idTipoObservacion', $this->idTipoObservacion);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Comprasobservaciones the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /*
     * @return CActiveRecord registro que se guarda en base de datos
     */
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
