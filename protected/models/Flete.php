<?php

/**
 * This is the model class for table "m_Flete".
 *
 * The followings are the available columns in table 'm_Flete':
 * @property integer $idOperadorLogistico
 * @property integer $bodegaVirtual
 * @property string $codigoCiudad
 * @property integer $rango1
 * @property integer $rango2
 * @property integer $tiempoEntregaInicial
 * @property integer $tiempoEntregaFinal
 * @property integer $valorKiloAdicional
 *
 * The followings are the available model relations:
 * @property MOperadorLogistico $idOperadorLogistico0
 * @property MCiudad $codigoCiudad0
 */
class Flete extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Flete';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idOperadorLogistico, bodegaVirtual, codigoCiudad, rango1, rango2, tiempoEntregaInicial, tiempoEntregaFinal', 'required'),
			array('idOperadorLogistico, bodegaVirtual, rango1, rango2, tiempoEntregaInicial, tiempoEntregaFinal, valorKiloAdicional', 'numerical', 'integerOnly'=>true),
			array('codigoCiudad', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOperadorLogistico, bodegaVirtual, codigoCiudad, rango1, rango2, tiempoEntregaInicial, tiempoEntregaFinal, valorKiloAdicional', 'safe', 'on'=>'search'),
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
			'objOperadorLogistico' => array(self::BELONGS_TO, 'OperadorLogistico', 'idOperadorLogistico'),
			'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
			'objBodegaVirtual' => array(self::BELONGS_TO, 'BodegaVirtual', 'bodegaVirtual'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOperadorLogistico' => 'Id Operador Logistico',
			'bodegaVirtual' => 'Bodega Virtual',
			'codigoCiudad' => 'Codigo Ciudad',
			'rango1' => 'Rango1',
			'rango2' => 'Rango2',
			'tiempoEntregaInicial' => 'Tiempo Entrega Inicial',
			'tiempoEntregaFinal' => 'Tiempo Entrega Final',
			'valorKiloAdicional' => 'Valor Kilo Adicional',
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

		$criteria->compare('idOperadorLogistico',$this->idOperadorLogistico);
		$criteria->compare('bodegaVirtual',$this->bodegaVirtual);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('rango1',$this->rango1);
		$criteria->compare('rango2',$this->rango2);
		$criteria->compare('tiempoEntregaInicial',$this->tiempoEntregaInicial);
		$criteria->compare('tiempoEntregaFinal',$this->tiempoEntregaFinal);
		$criteria->compare('valorKiloAdicional',$this->valorKiloAdicional);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Flete the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getFechaMinimaEntrega(){
		$fecha = date('Y-m-j');
		$nuevafecha = strtotime ( '+'.$this->tiempoEntregaInicial.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		
		return $nuevafecha;
	}
	
	public function getFechaMaximaEntrega(){
		$fecha = date('Y-m-j');
		$nuevafecha = strtotime ( '+'.$this->tiempoEntregaFinal.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		
		return $nuevafecha;
	}
}
