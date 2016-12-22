<?php

/**
 * This is the model class for table "m_CodigoEspecial".
 *
 * The followings are the available columns in table 'm_CodigoEspecial':
 * @property integer $codigoEspecial
 * @property string $descripcion
 * @property string $rutaIcono
 * @property integer $confirmacionCompra
 * @property integer $condicionCompra
 */
class CodigoEspecial extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_CodigoEspecial';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rutaIcono, confirmacionCompra', 'required'),
            array('codigoEspecial, confirmacionCompra', 'numerical', 'integerOnly' => true),
            array('descripcion', 'length', 'max' => 500),
            array('rutaIcono', 'length', 'max' => 100),
            array('condicionCompra', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoEspecial, descripcion, rutaIcono, confirmacionCompra, condicionCompra', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoEspecial' => 'Codigo Especial',
            'descripcion' => 'Descripcion',
            'rutaIcono' => 'Ruta Icono',
            'confirmacionCompra' => 'Confirmación Compra',
            'condicionCompra' => 'Condición Compra',
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

        $criteria->compare('codigoEspecial', $this->codigoEspecial);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('rutaIcono', $this->rutaIcono, true);
        $criteria->compare('confirmacionCompra', $this->confirmacionCompra);
        $criteria->compare('condicionCompra', $this->condicionCompra);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CodigoEspecial the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function setState(CodigoEspecial $objCodigoEspecial){
    	$dataArray = array();
    	$keyState = __CLASS__ . "_Data";
    	
    	if(Yii::app()->user->hasState($keyState)){
    		$dataArray = Yii::app()->user->getState($keyState);
    	}
    	
    	$dataArray[$objCodigoEspecial->codigoEspecial] = $objCodigoEspecial;
    	Yii::app()->user->setState($keyState,$dataArray);
    }
    
    public static function getState($delete=true){
    	$keyState = __CLASS__ . "_Data";
    	$dataArray = Yii::app()->user->getState($keyState);
    	
    	if($delete)
    		Yii::app()->user->setState($keyState,null);
    	return $dataArray;
    }
    
    public static function hasState(){
    	$keyState = __CLASS__ . "_Data";
    	return Yii::app()->user->hasState($keyState);
    }

}
