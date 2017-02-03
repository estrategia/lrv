<?php

/**
 * This is the model class for table "m_FormaPago".
 *
 * The followings are the available columns in table 'm_FormaPago':
 * @property integer $idFormaPago
 * @property string $formaPago
 * @property integer $estadoFormaPago
 * @property string codigoPOS
 * @property integer $ventaVendedor
 * @property integer $ventaVitalCall
 */
class FormaPago extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_FormaPago';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('formaPago, codigoPOS', 'required'),
            array('estadoFormaPago, ventaVendedor, ventaVitalCall', 'numerical', 'integerOnly' => true),
            array('formaPago', 'length', 'max' => 50),
            array('codigoPOS', 'length', 'max' => 5),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idFormaPago, formaPago, estadoFormaPago, codigoPOS, ventaVendedor, ventaVitalCall', 'safe', 'on' => 'search'),
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
            'idFormaPago' => 'Id Forma Pago',
            'formaPago' => 'Forma Pago',
            'estadoFormaPago' => 'Estado Forma Pago',
            'codigoPOS' => 'Código POS',
        	'ventaVendedor' => 'Venta vendedor',
        	'ventaVitalCall' => 'Venta club paciente',
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

        $criteria->compare('idFormaPago', $this->idFormaPago);
        $criteria->compare('formaPago', $this->formaPago, true);
        $criteria->compare('estadoFormaPago', $this->estadoFormaPago);
        $criteria->compare('ventaVendedor', $this->ventaVendedor);
        $criteria->compare('ventaVitalCall', $this->ventaVitalCall);
        $criteria->compare('codidoPOS', $this->codidoPOS);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FormaPago the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
    public static function getFormasPago($case = null){
    	$condiciones=array(
    		'order' => 'formaPago',
    		'condition' => 'estadoFormaPago=:estado',
    		'params' => array(':estado' => 1)
    	);
    	
    	
    	switch($case){
    		case 1:{
    			if(Yii::app()->shoppingCart->isUnitStored()){
    				$condiciones['condition'].= " AND ventaBodega =:formaBodega";
    				$condiciones['params'][':formaBodega'] = 1;
    			}
    		}break;
    		case 2:{
    			if(Yii::app()->shoppingCart->isUnitStored()){
    				$condiciones['condition'].= " AND ventaBodega =:formaBodega";
    				$condiciones['params'][':formaBodega'] = 1;
    			}
    			$condiciones['condition'].=" AND idFormaPago <> :credirebaja";
    			$condiciones['params'][':credirebaja'] = Yii::app()->params->formaPago['idCredirebaja'];
    		}break;
    		case 3:{
    			if(Yii::app()->shoppingCartVitalCall->isUnitStored()){
    				$condiciones['condition'].= " AND ventaBodega =:formaBodega";
    				$condiciones['params'][':formaBodega'] = 1;
    			}
    			$condiciones['condition'].=" AND ventaVitalCall=:estadoVitalCall";
    			$condiciones['params'][':estadoVitalCall'] = 1;
    		}break;
    		case 4:{
    			if(Yii::app()->shoppingCartNationalSale->isUnitStored()){
    				$condiciones['condition'].= " AND ventaBodega =:formaBodega";
    				$condiciones['params'][':formaBodega'] = 1;
    			}
    			$condiciones['condition'].=" AND ventaVitalCall=:estadoVitalCall";
    			$condiciones['params'][':estadoVitalCall'] = 1;
    		}break;
    		case 5:{
    			if(Yii::app()->shoppingCartSalesman->isUnitStored()){
    				$condiciones['condition'].= " AND ventaBodega =:formaBodega";
    				$condiciones['params'][':formaBodega'] = 1;
    			}
    			$condiciones['condition'].=" AND ventaVendedor=:ventavendedor";
    			$condiciones['params'][':ventavendedor'] = 1;
    		}break;
    		case 6:{
    			if(Yii::app()->shoppingCartSalesman->isUnitStored()){
    				$condiciones['condition'].= " AND ventaBodega =:formaBodega";
    				$condiciones['params'][':formaBodega'] = 1;
    			}
    			$condiciones['condition'].=" AND ventaVendedor=:ventavendedor AND idFormaPago <> :credirebaja";
    			$condiciones['params'][':credirebaja'] = Yii::app()->params->formaPago['idCredirebaja'];
    			$condiciones['params'][':ventavendedor'] = 1;
    		}break;
    	}
    	
    	return self::model()->findAll($condiciones);
    	
    }

}
