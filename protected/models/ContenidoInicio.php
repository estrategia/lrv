<?php

/**
 * This is the model class for table "t_ContenidoInicio".
 *
 * The followings are the available columns in table 't_ContenidoInicio':
 * @property integer $idContenidoInicio
 * @property string $descripcion
 * @property integer $genero
 * @property integer $tipo
 * @property string $contenido
 * @property string $contenidoMovil
 * @property string $fechaInicio
 * @property string $fechaFin
 */
class ContenidoInicio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ContenidoInicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, genero, contenido, contenidoMovil, fechaInicio, fechaFin, tipo', 'required'),
			array('genero', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idContenidoInicio, descripcion, genero, tipo, contenido, contenidoMovil, fechaInicio, fechaFin', 'safe', 'on'=>'search'),
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
			'idContenidoInicio' => 'Id Contenido Inicio',
			'descripcion' => 'Descripcion',
			'tipo' => 'Tipo',
			'genero' => 'Genero',
			'contenido' => 'Contenido',
			'contenidoMovil' => 'Contenido Movil',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
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

		$criteria->compare('idContenidoInicio',$this->idContenidoInicio);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('genero',$this->genero);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('contenidoMovil',$this->contenidoMovil,true);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContenidoInicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getContenidoNoAutenticado(){
		
		return self::model()->find(array(
				'condition' => 'tipo =:tipo
								AND :fecha BETWEEN fechaInicio AND fechaFin',
				'params' => array(
					':fecha' => Date("Y-m-d"), 
					':tipo' => Yii::app()->params->contenidoInicio['tiposContenido']['noAutenticado']
				)
		));
	}
	
	public static function getContenidoCumpleanhos($objUsuario){
		
		if($objUsuario instanceof Usuario){
			// Verificar si esta cumpliendo anhos
			
			if(date("j") == date("j", strtotime($objUsuario->objUsuarioExtendida->fechaNacimiento))  && 
							date("n") == date("n", strtotime($objUsuario->objUsuarioExtendida->fechaNacimiento)) ){
				
				$model =  self::model()->find(array(
						'condition' => 'tipo =:tipo AND (genero=:genero OR genero=:ambos)
										AND :fecha BETWEEN fechaInicio AND fechaFin',
						'params' => array(
								':fecha' => Date("Y-m-d"),
								':tipo' => Yii::app()->params->contenidoInicio['tiposContenido']['cumpleanos'],
								':genero' => $objUsuario->objUsuarioExtendida->genero,
								':ambos' => Yii::app()->params->contenidoInicio['ambosGeneros']
						)
				));
				
				return $model;
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	public static function getContenidoSinListas($objUsuario){
		if($objUsuario instanceof Usuario){
			
				if(empty($objUsuario->listListasPersonales)){
					return self::model()->find(array(
						'condition' => 'tipo =:tipo AND (genero=:genero OR genero=:ambos)
										AND :fecha BETWEEN fechaInicio AND fechaFin',
						'params' => array(
								':fecha' => Date("Y-m-d"),
								':tipo' => Yii::app()->params->contenidoInicio['tiposContenido']['sinLista'],
								':genero' => $objUsuario->objUsuarioExtendida->genero,
								':ambos' => Yii::app()->params->contenidoInicio['ambosGeneros'],
						)
				));
		  }else{
				return null;
			}
		}
	}
	
	public static function getContenidoSinCompras($objUsuario){
		if($objUsuario instanceof Usuario){
				
			if(empty($objUsuario->listListasPersonales)){
				return self::model()->find(array(
						'condition' => 'tipo =:tipo AND (genero=:genero OR genero=:ambos)
										AND :fecha BETWEEN fechaInicio AND fechaFin',
						'params' => array(
								':fecha' => Date("Y-m-d"),
								':tipo' => Yii::app()->params->contenidoInicio['tiposContenido']['noCompra'],
								':genero' => $objUsuario->objUsuarioExtendida->genero,
								':ambos' => Yii::app()->params->contenidoInicio['ambosGeneros'],
						)
				));
			}else{
				return null;
			}
		}
	}
	
	public static function getContenidoUsuarioNoIngresa($objUsuario){
		if($objUsuario instanceof Usuario){
			$fechaActual = new DateTime();
			
			if(isset(Yii::app()->user->lastLoginTime))
				$fechaUltimoAcceso = new DateTime(Yii::app()->user->lastLoginTime);
			else
				$fechaUltimoAcceso = new DateTime(Date("Y-m-d H:i:s"));
							
			$interval = $fechaActual->diff($fechaUltimoAcceso);
			
			if($interval->format('%R%a') > Yii::app()->params->contenidoInicio['tiempoNoIngreso']){
				return self::model()->find(array(
						'condition' => 'tipo =:tipo AND (genero=:genero OR genero=:ambos)
										AND :fecha BETWEEN fechaInicio AND fechaFin',
						'params' => array(
								':fecha' => Date("Y-m-d"),
								':tipo' => Yii::app()->params->contenidoInicio['tiposContenido']['noIngresa'],
								':genero' => $objUsuario->objUsuarioExtendida->genero,
								':ambos' => Yii::app()->params->contenidoInicio['ambosGeneros'],
						)
				));
			}else{
				return null;
			}
		}
	}
}
