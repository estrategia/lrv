<?php

/**
 * This is the model class for table "t_LogBonos".
 *
 * The followings are the available columns in table 't_LogBonos':
 * @property integer $idLogBono
 * @property string $identificacionUsuario
 * @property integer $valorBono
 * @property string $fechaRegistro
 * @property integer $idOperador
 * @property string $comentario
 * @property string $idBonoTiendaTipo
 * @property string $idBonoTienda
 *
 * The followings are the available model relations:
 * @property Operador $objOperador
 * @property BonosTienda $objBonoTienda
 */
class LogBonos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_LogBonos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, valorBono, idOperador, comentario, idBonoTiendaTipo', 'required'),
            array('fechaRegistro', 'safe'),
            array('valorBono, idOperador', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('comentario', 'length', 'max' => 255),
            array('comentario', 'length', 'min' => 20),
            array('idBonoTienda', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idLogBono, identificacionUsuario, valorBono, fechaRegistro, idOperador, comentario, concepto, idBonoTienda', 'safe', 'on' => 'search'),
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
            'objBonoTienda' => array(self::BELONGS_TO, 'BonosTienda', 'idBonoTienda'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idLogBono' => 'Id Log Bono',
            'valorBono' => 'Valor Bono',
            'identificacionUsuario' => "Identificaci&oacute;n Cliente",
            'fechaRegistro' => 'Fecha Registro',
            'idOperador' => 'Agente',
            'comentario' => 'Comentario',
            'concepto' => 'Concepto',
            'idBonoTienda' => 'Bono Tienda',
        	'idBonoTiendaTipo' => 'Concepto'
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

        $criteria->compare('idLogBono', $this->idLogBono);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('valorBono', $this->valorBono);
        $criteria->compare('fechaRegistro', $this->fechaRegistro, true);
        $criteria->compare('idOperador', $this->idOperador);
        $criteria->compare('comentario', $this->comentario, true);
        $criteria->compare('concepto', $this->concepto, true);
        $criteria->compare('idBonoTiendaTipo', $this->idBonoTiendaTipo, true);
        $criteria->compare('idBonoTienda', $this->idBonoTienda, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogBonos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /*
     * @return CActiveRecord registro que se guarda en base de datos
     */
    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->fechaCompra = new CDbExpression('NOW()');
            $this->fechaRegistro = date('Y-m-d H:i:s');
        }

        return parent::beforeSave();
    }

}
