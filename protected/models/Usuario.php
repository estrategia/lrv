<?php

/**
 * This is the model class for table "m_Usuario".
 *
 * The followings are the available columns in table 'm_Usuario':
 * @property string $identificacionUsuario
 * @property string $clave
 * @property string $nombre
 * @property string $apellido
 * @property integer $codigoPerfil
 * @property integer $activo
 * @property string $fechaUltimoAcceso
 * @property string $correoElectronico
 * @property integer $invitado
 * @property integer $esClienteFiel
 *
 * The followings are the available model relations:
 * @property Perfilcompras $objPerfilCompras
 */
class Usuario extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('clave', 'required'),
            array('codigoPerfil, activo, invitado, esClienteFiel', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario, clave, nombre, apellido, correoElectronico', 'length', 'max' => 100),
            array('fechaUltimoAcceso, esClienteFiel', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('identificacionUsuario, clave, nombre, apellido, codigoPerfil, activo, fechaUltimoAcceso, correoElectronico, invitado, esClienteFiel', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objPerfil' => array(self::BELONGS_TO, 'Perfil', 'codigoPerfil'),
            'objUsuarioExtendida' => array(self::HAS_ONE, 'UsuarioExtendida', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'identificacionUsuario' => 'Identificacion Usuario',
            'clave' => 'Clave',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'codigoPerfil' => 'Perfil',
            'activo' => 'Activo',
            'fechaUltimoAcceso' => 'Fecha Ultimo Acceso',
            'correoElectronico' => 'Correo Electronico',
            'invitado' => 'Invitado',
            'esClienteFiel' => 'Cliente Fiel',
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

        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('clave', $this->clave, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('codigoPerfil', $this->codigoPerfil);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('fechaUltimoAcceso', $this->fechaUltimoAcceso, true);
        $criteria->compare('correoElectronico', $this->correoElectronico, true);
        $criteria->compare('invitado', $this->invitado);
        $criteria->compare('esClienteFiel', $this->esClienteFiel);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * @param string $password password para validar
     * return boolean Valida si parametro $password corresponde a la clave del usuario
     */
    public function validarContrasena($contrasena) {
        return $this->hash($contrasena) === $this->clave;
    }

    public function hash($contrasena) {
        return md5($contrasena);
    }
    
    public function beforeSave() {
        if($this->isNewRecord){
            $this->esClienteFiel = 1;
        }
        return parent::beforeSave();
    }
    
    public function getCodigoPerfil(){
        if($this->codigoPerfil == 1 && $this->esClienteFiel == 1 && in_array(date('j'), Yii::app()->params->clienteFiel['dias']) && $this->invitado==0){
            return 3;
        } 
        
        return $this->codigoPerfil;
    }

}
