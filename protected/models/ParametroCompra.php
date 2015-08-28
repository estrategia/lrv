<?php

/**
 * This is the model class for table "m_ParametroCompra".
 *
 * The followings are the available columns in table 'm_ParametroCompra':
 * @property string $idParametroCompra
 * @property integer $codigoPerfil
 * @property integer $esClienteFiel
 * @property integer $esDiaClienteFiel
 * @property integer $codigoPerfilCompra
 * @property integer $asignaPuntos
 *
 * The followings are the available model relations:
 * @property MPerfil $codigoPerfil0
 * @property MPerfil $codigoPerfilCompra0
 */
class ParametroCompra extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_ParametroCompra';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoPerfil, esClienteFiel, esDiaClienteFiel, codigoPerfilCompra, asignaPuntos', 'required'),
            array('codigoPerfil, esClienteFiel, esDiaClienteFiel, codigoPerfilCompra, asignaPuntos', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idParametroCompra, codigoPerfil, esClienteFiel, esDiaClienteFiel, codigoPerfilCompra, asignaPuntos', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'codigoPerfil0' => array(self::BELONGS_TO, 'MPerfil', 'codigoPerfil'),
            //'codigoPerfilCompra0' => array(self::BELONGS_TO, 'MPerfil', 'codigoPerfilCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idParametroCompra' => 'Id Parametro Compra',
            'codigoPerfil' => 'Codigo Perfil',
            'esClienteFiel' => 'Es Cliente Fiel',
            'esDiaClienteFiel' => 'Es Dia Cliente Fiel',
            'codigoPerfilCompra' => 'Codigo Perfil Compra',
            'asignaPuntos' => 'Asigna Puntos',
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

        $criteria->compare('idParametroCompra', $this->idParametroCompra, true);
        $criteria->compare('codigoPerfil', $this->codigoPerfil);
        $criteria->compare('esClienteFiel', $this->esClienteFiel);
        $criteria->compare('esDiaClienteFiel', $this->esDiaClienteFiel);
        $criteria->compare('codigoPerfilCompra', $this->codigoPerfilCompra);
        $criteria->compare('asignaPuntos', $this->asignaPuntos);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ParametroCompra the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function validaAsignacionPuntos($asignaPuntos, $tieneDescuento){
        return ($asignaPuntos==1 || ($asignaPuntos==2 && !$tieneDescuento));
    }

}
