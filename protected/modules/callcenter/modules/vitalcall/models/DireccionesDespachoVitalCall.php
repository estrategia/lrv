<?php

/**
 * This is the model class for table "t_DireccionesDespachoVitalCall".
 *
 * The followings are the available columns in table 't_DireccionesDespachoVitalCall':
 * @property string $idDireccionesDespachoVitalCall
 * @property string $identificacionUsuario
 * @property string $direccion
 * @property string $barrio
 * @property string $codigoCiudad
 * @property string $codigoSector
 *
 * The followings are the available model relations:
 * @property Ciudad $objCiudad
 * @property Sector $objSector
 * @property UsuarioVitalCall $objUsuarioVC
 */
class DireccionesDespachoVitalCall extends CActiveRecord {
	private $_objSectorCiudad = null;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_DireccionesDespachoVitalCall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, direccion, barrio, codigoCiudad, codigoSector', 'required'),
            array('identificacionUsuario, direccion', 'length', 'max' => 200),
            array('barrio', 'length', 'max' => 100),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idDireccionesDespachoVitalCall, identificacionUsuario, direccion, barrio, codigoCiudad, codigoSector', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
            'objUsuarioVC' => array(self::BELONGS_TO, 'UsuarioVitalCall', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idDireccionesDespachoVitalCall' => 'Id Direcciones Despacho Vital Call',
            'identificacionUsuario' => 'Identificacion Usuario',
            'direccion' => 'Direccion',
            'barrio' => 'Barrio',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
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

        $criteria->compare('idDireccionesDespachoVitalCall', $this->idDireccionesDespachoVitalCall, true);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('barrio', $this->barrio, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DireccionesDespachoVitalCall the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getObjSectorCiudad(){
    	if($this->_objSectorCiudad==null && !empty($this->codigoCiudad) && !empty($this->codigoSector)){
    		$this->_objSectorCiudad = SectorCiudad::model()->find(array(
    				'with' => array('objCiudad','objSector'),
    				'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector',
    				'params' => array(
    						':ciudad' => $this->codigoCiudad,
    						':sector' => $this->codigoSector
    				)
    		));
    	}
    	
    	return $this->_objSectorCiudad;
    }

}
