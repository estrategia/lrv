<?php

/**
 * This is the model class for table "t_ComprasPuntoVentaAsistida".
 *
 * The followings are the available columns in table 't_ComprasPuntoVentaAsistida':
 * @property integer $idCompraPuntoVenta
 * @property integer $idProducto
 * @property string $idComercial
 * @property integer $idCompra
 * @property integer $cantidadUnidad
 * @property integer $cantidadFraccion
 * @property integer $subTotalUnidades
 * @property integer $subTotalFracciones
 */
class ComprasPuntoVentaAsistida extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ComprasPuntoVentaAsistida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoProducto, idComercial, idComercialDestino, idCompra, subTotalUnidades, subTotalFracciones', 'required'),
			array('codigoProducto, idCompra, cantidadUnidad, cantidadFraccion, subTotalUnidades, subTotalFracciones', 'numerical', 'integerOnly'=>true),
			array('idComercial', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCompraPuntoVenta, codigoProducto,idComercialDestino,  idComercial, idCompra, cantidadUnidad, cantidadFraccion, subTotalUnidades, subTotalFracciones', 'safe', 'on'=>'search'),
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
			'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
			'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCompraPuntoVenta' => 'Id Compra Punto Venta',
			'codigoProducto' => 'Id Producto',
			'idComercial' => 'Id Comercial',
			'idCompra' => 'Id Compra',
			'cantidadUnidad' => 'Cantidad Unidad',
			'cantidadFraccion' => 'Cantidad Fraccion',
			'subTotalUnidades' => 'Sub Total Unidades',
			'subTotalFracciones' => 'Sub Total Fracciones',
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

		$criteria->compare('idCompraPuntoVenta',$this->idCompraPuntoVenta);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('idComercial',$this->idComercial,true);
		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('cantidadUnidad',$this->cantidadUnidad);
		$criteria->compare('cantidadFraccion',$this->cantidadFraccion);
		$criteria->compare('subTotalUnidades',$this->subTotalUnidades);
		$criteria->compare('subTotalFracciones',$this->subTotalFracciones);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComprasPuntoVentaAsistida the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	public function modificarUnidadesVap($cantidad,$producto){
		 
		$sumaUnidades = $this->cantidadUnidad;
		// $cantDiff = $cantidad - $this->unidades;
		$cantDiff = $cantidad - $sumaUnidades;
		//igual
		if ($cantDiff == 0) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Actualización exitosa.'));
			Yii::app()->end();
		}
		
		//aumentar --> verificar saldo
		if ($cantDiff > 0) {
			$objProducto = Producto::model()->find(array(
					'with' => array(
							'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
					),
					'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND (listPrecios.codigoCiudad IS NOT NULL)',
					'params' => array(
							':activo' => 1,
							':codigo' => $this->codigoProducto,
							':ciudad' => $this->objCompra->codigoCiudad,
							':sector' => $this->objCompra->codigoSector,
					),
			));
		
			if ($objProducto === null) {
				throw new Exception('Producto no disponible.');
			}
		}
		
		$this->cantidadUnidad = $cantidad;
		$objItem = ComprasItems::model()->find(array(
				'condition' => 'codigoProducto =:producto AND idCompra=:compra',
				'params' => array(
						'producto' => $this->codigoProducto,
						'compra' => $this->idCompra
				)
		));
		
		$objItem->unidades += $cantDiff;
		
		Yii::log("cantDiff: $cantDiff", CLogger::LEVEL_INFO, 'error');
		
		$precioSubTotal = ($objItem->precioBaseUnidad - $objItem->descuentoUnidad) * $objItem->unidades;
		
		$precioTotal = $objItem->precioBaseUnidad - $objItem->descuentoUnidad ;
		$precioDiff = $precioTotal * $cantDiff;
		$this->subTotalUnidades = $cantidad * ($objItem->precioBaseUnidad - $objItem->descuentoUnidad);
		
		
		$objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
		$objItem->idOperador = Yii::app()->controller->module->user->id;
		$objItem->precioTotalUnidad = $objItem->unidades * ($objItem->precioBaseUnidad - $objItem->descuentoUnidad); 
		$objCompra = $this->objCompra;
	
 		$objCompra->impuestosCompra = round(Precio::calcularImpuesto($precioSubTotal, $objItem->objImpuesto->porcentaje));
 		$objCompra->baseImpuestosCompra = round(Precio::calcularBaseImpuesto($precioSubTotal, $objItem->objImpuesto->porcentaje));

		$objCompra->subtotalCompra = $precioSubTotal ;
		// $objCompra->subtotalCompra = $precioSubTotal;
		
		$transaction = Yii::app()->db->beginTransaction();
		
		if (!$this->save()) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
		}
		if (!$objItem->save()) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
		}
		
		if ($objCompra->totalCompra < 0) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Total compra no puede ser negativo');
		}
		
		if (!$objCompra->save()) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Error de actualización compra: ' . $objCompra->validateErrorsResponse());
		}
		$transaction->commit();
	}
	
	public function modificarFraccionesVap($cantidad,$producto){
		
		// esjis isoals fjdfie
		$sumaUnidades = $this->cantidadUnidad;
		// $cantDiff = $cantidad - $this->unidades;
		$cantDiff = $cantidad - $sumaUnidades;
		//igual
		if ($cantDiff == 0) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Actualización exitosa.'));
			Yii::app()->end();
		}
		
		//aumentar --> verificar saldo
		if ($cantDiff > 0) {
			$objProducto = Producto::model()->find(array(
					'with' => array(
							'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
					),
					'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND (listPrecios.codigoCiudad IS NOT NULL)',
					'params' => array(
							':activo' => 1,
							':codigo' => $this->codigoProducto,
							':ciudad' => $this->objCompra->codigoCiudad,
							':sector' => $this->objCompra->codigoSector,
					),
			));
		
			if ($objProducto === null) {
				throw new Exception('Producto no disponible.');
			}
		}
		
		$this->cantidadUnidad = $cantidad;
		$objItem = ComprasItems::model()->find(array(
				'condition' => 'codigoProducto =:producto AND idCompra=:compra',
				'params' => array(
						'producto' => $this->codigoProducto,
						'compra' => $this->idCompra
				)
		));
		
		$objItem->unidades += $cantDiff;
		
		Yii::log("cantDiff: $cantDiff", CLogger::LEVEL_INFO, 'error');
		
		$precioSubTotal = ($objItem->precioBaseUnidad - $objItem->descuentoUnidad) * $objItem->unidades;
		
		$precioTotal = $objItem->precioBaseUnidad - $objItem->descuentoUnidad ;
		$precioDiff = $precioTotal * $cantDiff;
		$this->subTotalUnidades = $cantidad * ($objItem->precioBaseUnidad - $objItem->descuentoUnidad);
		
		
		$objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
		$objItem->idOperador = Yii::app()->controller->module->user->id;
		$objItem->precioTotalUnidad = $objItem->unidades * ($objItem->precioBaseUnidad - $objItem->descuentoUnidad);
		$objCompra = $this->objCompra;
		
		$objCompra->impuestosCompra = round(Precio::calcularImpuesto($precioSubTotal, $objItem->objImpuesto->porcentaje));
		$objCompra->baseImpuestosCompra = round(Precio::calcularBaseImpuesto($precioSubTotal, $objItem->objImpuesto->porcentaje));
		
		$objCompra->subtotalCompra = $precioSubTotal ;
		// $objCompra->subtotalCompra = $precioSubTotal;
		
		$transaction = Yii::app()->db->beginTransaction();
		
		if (!$this->save()) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
		}
		if (!$objItem->save()) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
		}
		
		if ($objCompra->totalCompra < 0) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Total compra no puede ser negativo');
		}
		
		if (!$objCompra->save()) {
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
			throw new Exception('Error de actualización compra: ' . $objCompra->validateErrorsResponse());
		}
		$transaction->commit();
	
	}
}
