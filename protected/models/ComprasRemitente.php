<?php

/**
 * This is the model class for table "t_ComprasRemitente".
 *
 * The followings are the available columns in table 't_ComprasRemitente':
 * @property integer $idCompra
 * @property integer $cedulaRemitente
 * @property integer $recogida
 * @property string $nombreRemitente
 * @property integer $telefonoRemitente
 * @property string $correoRemitente
 * @property string $direccionRemitente
 * @property string $barrioRemitente
 */
class ComprasRemitente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ComprasRemitente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCompra, cedulaRemitente, recogida, nombreRemitente, telefonoRemitente, correoRemitente', 'required'),
			array('idCompra, cedulaRemitente, recogida, telefonoRemitente', 'numerical', 'integerOnly'=>true),
			array('nombreRemitente, correoRemitente, direccionRemitente, barrioRemitente', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCompra, cedulaRemitente, asistida, nombreRemitente, telefonoRemitente, correoRemitente, direccionRemitente, barrioRemitente', 'safe', 'on'=>'search'),
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
			//	'objPuntoVenta' => array(self::BELONGS_TO, 'PuntoVenta', '', 'on' => 'objPuntoVenta.idComercial = t.puntoVentaDestino' ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCompra' => 'Id Compra',
			'cedulaRemitente' => 'Cedula',
			'asistida' => 'Asistida',
			'nombreRemitente' => 'Nombre',
			'telefonoRemitente' => 'Telefono',
			'correoRemitente' => 'Correo',
			'direccionRemitente' => 'Direccion',
			'barrioRemitente' => 'Barrio',
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

		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('cedulaRemitente',$this->cedulaRemitente);
		$criteria->compare('asistida',$this->asistida);
		$criteria->compare('nombreRemitente',$this->nombreRemitente,true);
		$criteria->compare('telefonoRemitente',$this->telefonoRemitente);
		$criteria->compare('correoRemitente',$this->correoRemitente,true);
		$criteria->compare('direccionRemitente',$this->direccionRemitente,true);
		$criteria->compare('barrioRemitente',$this->barrioRemitente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComprasRemitente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function behaviors() {
		return array(
				'ValidateModelBehavior' => array(
						'class' => 'application.components.behaviors.ValidateModelBehavior',
						'model' => $this
				),
		);
	}
}
