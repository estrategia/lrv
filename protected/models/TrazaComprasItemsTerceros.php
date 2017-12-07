<?php

/**
 * This is the model class for table "t_TrazaComprasItemsTerceros".
 *
 * The followings are the available columns in table 't_TrazaComprasItemsTerceros':
 * @property string $idTraza
 * @property integer $idCompraItem
 * @property integer $idEstadoItemTercero
 *
 * The followings are the available model relations:
 * @property MEstadosComprasItemsTerceros $idEstadoItemTercero0
 * @property TComprasItems $idCompraItem0
 */
class TrazaComprasItemsTerceros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_TrazaComprasItemsTerceros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCompraItem, idEstadoItemTercero', 'required'),
			array('idCompraItem, idEstadoItemTercero', 'numerical', 'integerOnly'=>true),
			array('fechaCreacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTraza, idCompraItem, idEstadoItemTercero', 'safe', 'on'=>'search'),
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
			'estado' => array(self::BELONGS_TO, 'EstadosComprasItemsTerceros', 'idEstadoItemTercero'),
			'item' => array(self::BELONGS_TO, 'TomprasItems', 'idCompraItem'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTraza' => 'Id Traza',
			'idCompraItem' => 'Id Compra Item',
			'idEstadoItemTercero' => 'Id Estado Item Tercero',
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

		$criteria->compare('idTraza',$this->idTraza,true);
		$criteria->compare('idCompraItem',$this->idCompraItem);
		$criteria->compare('idEstadoItemTercero',$this->idEstadoItemTercero);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TrazaComprasItemsTerceros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
