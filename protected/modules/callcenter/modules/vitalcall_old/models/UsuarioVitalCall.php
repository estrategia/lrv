<?php

/**
 * This is the model class for table "m_UsuarioVitalCall".
 *
 * The followings are the available columns in table 'm_UsuarioVitalCall':
 * @property string $identificacionUsuario
 * @property string $nombre
 * @property string $apellido
 * @property string $correoElectronico
 * @property string $celular
 * @property string $telefono
 * @property string $extension
 * @property string $fechaCreacion
 * @property string $codigoActivacion
 * @property string $codigoActivacionValidacion
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property DireccionesDespachoVitalCall[] $listDireccionesVC
 * @property FormulasVitalCall[] $listFormulasVC
 */
class UsuarioVitalCall extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_UsuarioVitalCall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, nombre, apellido, correoElectronico, fechaCreacion, codigoActivacion, estado', 'required'),
            array('estado', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 200),
            array('nombre, apellido, correoElectronico', 'length', 'max' => 100),
            array('celular, telefono', 'length', 'max' => 19),
            array('extension', 'length', 'max' => 5),
            array('codigoActivacion, codigoActivacionValidacion', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('identificacionUsuario, nombre, apellido, correoElectronico, celular, telefono, extension, fechaCreacion, codigoActivacion, codigoActivacionValidacion, estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listDireccionesVC' => array(self::HAS_MANY, 'DireccionesDespachoVitalCall', 'identificacionUsuario'),
            'listFormulasVC' => array(self::HAS_MANY, 'FormulasVitalCall', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'identificacionUsuario' => 'Identificacion Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'correoElectronico' => 'Correo Electronico',
            'celular' => 'Celular',
            'telefono' => 'Telefono',
            'extension' => 'Extension',
            'fechaCreacion' => 'Fecha Creacion',
            'codigoActivacion' => 'Codigo Activacion',
            'codigoActivacionValidacion' => 'Codigo Activacion Validacion',
            'estado' => 'Estado',
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
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('correoElectronico', $this->correoElectronico, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('extension', $this->extension, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('codigoActivacion', $this->codigoActivacion, true);
        $criteria->compare('codigoActivacionValidacion', $this->codigoActivacionValidacion, true);
        $criteria->compare('estado', $this->estado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UsuarioVitalCall the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function generatePass($length) {
    	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    	$longitudCadena = strlen($cadena);
    	$pass = "";
    	$longitudPass = $length;
    
    	for ($i = 1; $i <= $longitudPass; $i++) {
    		$pos = rand(0, $longitudCadena - 1);
    		$pass .= substr($cadena, $pos, 1);
    	}
    	return $pass;
    }
    
    public function exportar() {
    	ini_set('memory_limit', '-1');
    	$content = '"Identificacion Usuario";"Nombre";"Apellido";"Correo electronico";"Celular";"Telefono";"Extension";"Fecha Creacion"'."\n";
    	$dataProvider = $this->search(true);
    
    	if ($dataProvider !== null) {
    		foreach ($dataProvider->getData() as $idx => $objUsuario) {
    			$content .= "$objUsuario->identificacionUsuario;$objUsuario->nombre;$objUsuario->apellido;$objUsuario->correoElectronico;$objUsuario->celular;$objUsuario->telefono;$objUsuario->extension;$objUsuario->fechaCreacion\n";
    		}
    	}
    
    	Yii::app()->request->sendFile('UsuariosVitalCall_' . date('YmdHis') . '.csv', $content);
    	Yii::app()->end();
    }

}
