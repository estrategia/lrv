<?php

/**
 * This is the model class for table "t_FormulasVitalCall".
 *
 * The followings are the available columns in table 't_FormulasVitalCall':
 * @property string $idFormula
 * @property string $identificacionUsuario
 * @property string $registroMedico
 * @property string $nombreMedico
 * @property string $institucion
 * @property string $telefono
 * @property string $correoElectronico
 * @property string $fechaCreacion
 *
 * The followings are the available model relations:
 * @property UsuarioVitalCall $objUsuarioVC
 * @property ProductosVitallCall[] $listProductosVC
 */
class FormulasVitalCall extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_FormulasVitalCall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, registroMedico, nombreMedico, institucion, telefono, correoElectronico, fechaCreacion', 'required'),
            array('identificacionUsuario', 'length', 'max' => 200),
            array('registroMedico, telefono', 'length', 'max' => 50),
            array('nombreMedico, institucion, correoElectronico', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idFormula, identificacionUsuario, registroMedico, nombreMedico, institucion, telefono, correoElectronico, fechaCreacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objUsuarioVC' => array(self::BELONGS_TO, 'UsuarioVitalCall', 'identificacionUsuario'),
            'listProductosVC' => array(self::MANY_MANY, 'ProductosVitalCall', 't_ProductosFormulaVitalCall(idFormula, idProductoVitalCall)'),
                //'listProductosFormulaVC' => array(self::MANY_MANY, 'ProductosVitallCall', 't_ProductosFormulaVitalCall(idFormula, idProductoVitallCall)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idFormula' => 'Id Formula',
            'identificacionUsuario' => 'Identificacion Usuario',
            'registroMedico' => 'Registro Medico',
            'nombreMedico' => 'Nombre Medico',
            'institucion' => 'Institucion',
            'telefono' => 'Telefono',
            'correoElectronico' => 'Correo Electronico',
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
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('registroMedico', $this->registroMedico, true);
        $criteria->compare('nombreMedico', $this->nombreMedico, true);
        $criteria->compare('institucion', $this->institucion, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('correoElectronico', $this->correoElectronico, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FormulasVitalCall the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
