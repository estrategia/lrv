<?php

/**
 * This is the model class for table "m_UsuarioExtendida".
 *
 * The followings are the available columns in table 'm_UsuarioExtendida':
 * @property string $identificacionUsuario
 * @property string $genero
 * @property string $fechaNacimiento
 * @property string $fechaRegistro
 * @property string $codigoProfesion
 * @property string $recuperacionFecha
 * @property string $recuperacionCodigo
 *
 * The followings are the available model relations:
 * @property Usuario $objUsuario
 */
class UsuarioExtendida extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_UsuarioExtendida';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fechaRegistro', 'safe'),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('codigoProfesion', 'length', 'max' => 255),
            array('genero', 'in', 'range' => array(1, 2), 'allowEmpty' => true),
            array('fechaNacimiento', 'date', 'format' => 'yyyy-M-d', 'allowEmpty' => true),
            array('genero, fechaNacimiento, recuperacionFecha, recuperacionCodigo', 'default', 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('identificacionUsuario, genero, fechaNacimiento, fechaRegistro, codigoProfesion, recuperacionFecha, recuperacionCodigo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'ObjUsuario' => array(self::BELONGS_TO, 'Usuario', 'identificacionUsuario'),
            'ObjProfesion' => array(self::BELONGS_TO, 'ProfesionCliente', 'codigoProfesion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'identificacionUsuario' => 'Identificación usuario',
            'genero' => 'Género',
            'fechaNacimiento' => 'Fecha de nacimiento',
            'fechaRegistro' => 'Fecha de registro',
            'codigoProfesion' => 'Profesión',
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

        $criteria->compare('identificacionUsuario', $this->identificacionUsuario);
        $criteria->compare('genero', $this->genero, true);
        $criteria->compare('fechaNacimiento', $this->fechaNacimiento, true);
        $criteria->compare('fechaRegistro', $this->fechaRegistro, true);
        $criteria->compare('codigoProfesion', $this->codigoProfesion);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UsuarioExtendida the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        if($this->isNewRecord){
            //$this->fechaRegistro = new CDbExpression('NOW()');
            $this->fechaRegistro = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
    }

}
