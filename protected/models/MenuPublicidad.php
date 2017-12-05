<?php

/**
 * This is the model class for table "m_MenuPublicidad".
 *
 * The followings are the available columns in table 'm_MenuPublicidad':
 * @property string $codigoPublicidad
 * @property string $imagenDesktop
 * @property string $imagenMovil
 *
 * The followings are the available model relations:
 * @property MMenuItemPublicidad[] $mMenuItemPublicidads
 */
class MenuPublicidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_MenuPublicidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idModulo', 'required'),
			array('imagenDesktop, imagenMovil', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idModulo, imagenDesktop, imagenMovil', 'safe', 'on'=>'search'),
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
			'listMenuItemPublicidad' => array(self::HAS_MANY, 'MenuItemPublicidad', 'idModulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'imagenDesktop' => 'Imagen Desktop',
			'imagenMovil' => 'Imagen Movil',
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

		$criteria->compare('imagenDesktop',$this->imagenDesktop,true);
		$criteria->compare('imagenMovil',$this->imagenMovil,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuPublicidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function obtenerDatosCampania(){
		$campania = $nombreMicrositioRefer =  "";
		$search = false;
		foreach($_REQUEST as $param => $value){
			if($param == "nombre"){
				$campania = $value;
				break;
			}
		}
		
		$urlRefer = Yii::app()->request->urlReferrer;
		
		if(!empty ($urlRefer)){
			$requestURI = explode( '/',$urlRefer);
			$requestURI = array_values( array_filter( $requestURI ) );
			
			$nombreMicrositioRefer = $requestURI[count($requestURI)-1];
		}
		
		$params = array(
				'with' => 'listMenuItemPublicidad',
				'condition' => "TRUE",
		);
		
		if(!empty($campania)){
			$params['condition'] .= " AND t.codigoPublicidad =:campaniaA" ;
			$params['params'][':campaniaA'] = $campania;
			$search = true;
		}
		
		if(!empty($nombreMicrositioRefer)){
			$params['condition'] .= " AND t.codigoPublicidad =:campaniaB" ;
			$params['params'][':campaniaB'] = $nombreMicrositioRefer;
			$search = true;
		}
		return $search ? self::model()->find($params):null;
	}
}
