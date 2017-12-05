<?php

/**
 * This is the model class for table "m_UsuarioTercero".
 *
 * The followings are the available columns in table 'm_UsuarioTercero':
 * @property integer $idOperador
 * @property string $nombreOperador
 * @property string $nombreContacto
 * @property string $telefonoContacto
 * @property string $correoContacto
 * @property string $correoNotificaciones
 * @property string $codigoProveedor
 * @property integer $estado
 */
class UsuarioTercero extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_UsuarioTercero';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreOperador, nombreContacto, telefonoContacto, correoContacto, correoNotificaciones, codigoProveedor, clave', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombreOperador, nombreContacto, correoContacto, correoNotificaciones', 'length', 'max'=>255),
			array('telefonoContacto', 'length', 'max'=>45),
			array('codigoProveedor', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOperador, nombreOperador, nombreContacto, telefonoContacto, correoContacto, correoNotificaciones, codigoProveedor, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOperador' => 'Id Operador',
			'nombreOperador' => 'Nombre Operador',
			'nombreContacto' => 'Nombre Contacto',
			'telefonoContacto' => 'Telefono Contacto',
			'correoContacto' => 'Correo Contacto',
			'correoNotificaciones' => 'Correo Notificaciones',
			'codigoProveedor' => 'Proveedor',
			'estado' => 'Estado',
			'clave' => 'Clave'
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idOperador',$this->idOperador);
		$criteria->compare('nombreOperador',$this->nombreOperador,true);
		$criteria->compare('nombreContacto',$this->nombreContacto,true);
		$criteria->compare('telefonoContacto',$this->telefonoContacto,true);
		$criteria->compare('correoContacto',$this->correoContacto,true);
		$criteria->compare('correoNotificaciones',$this->correoNotificaciones,true);
		$criteria->compare('codigoProveedor',$this->codigoProveedor,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuarioTercero the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validateExist($attribute, $params) {
        if (!$this->hasErrors()) {
            $model = null;

            if ($this->isNewRecord) {
                $model = self::model()->find(array(
                    'condition' => "$attribute=:value",
                    'params' => array(
                        'value' => $this->getAttribute($attribute)
                    )
                ));
            } else {
                $model = self::model()->find(array(
                    'condition' => "idOperador<>:id AND $attribute=:value",
                    'params' => array(
                        'id' => $this->idOperador,
                        'value' => $this->getAttribute($attribute)
                    )
                ));
            }

            if ($model !== null)
                $this->addError($attribute, $this->getAttributeLabel($attribute) . ' ya existe.');
        }
    }

    public function validarContrasena($contrasena) {
        return $this->hash($contrasena) === $this->clave;
    }

    public function hash($contrasena) {
        return md5($contrasena);
    }
    
    public static function listData(){
        return self::model()->findAll(array('condition'=>'activo=:activo','params'=>array(':activo'=>1)));
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
