<?php

/**
 * This is the model class for table "t_Beneficios".
 *
 * The followings are the available columns in table 't_Beneficios':
 * @property integer $idBeneficio
 * @property integer $idBeneficioSincronizado
 * @property integer $tipo
 * @property string $fechaIni
 * @property string $fechaFin
 * @property integer $dsctoUnid
 * @property integer $dsctoFrac
 * @property integer $vtaUnid
 * @property integer $vtaFrac
 * @property integer $pagoUnid
 * @property integer $pagoFrac
 * @property integer $cuentaCop
 * @property integer $nitCop
 * @property integer $porcCop
 * @property integer $cuentaProv
 * @property string $nitProv
 * @property integer $porcProv
 * @property integer $promoFiel
 * @property string $mensaje
 * @property integer $swobligaCli
 * @property string $fechaCreacionBeneficio
 *
 * The followings are the available model relations:
 * @property BeneficioTipo $objBeneficioTipo
 */
class Beneficios extends CActiveRecord {

    public $searchProductoUnidad;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Beneficios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo, idBeneficioSincronizado, fechaIni, fechaFin, fechaCreacionBeneficio', 'required'),
            array('tipo, idBeneficioSincronizado, dsctoUnid, dsctoFrac, vtaUnid, vtaFrac, pagoUnid, pagoFrac, cuentaCop, nitCop, porcCop, cuentaProv, porcProv, promoFiel, swobligaCli', 'numerical', 'integerOnly' => true),
            array('nitProv', 'length', 'max' => 45),
            array('mensaje', 'length', 'max'=>140),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idBeneficio, idBeneficioSincronizado, tipo, fechaIni, fechaFin, dsctoUnid, dsctoFrac, vtaUnid, vtaFrac, pagoUnid, pagoFrac, cuentaCop, nitCop, porcCop, cuentaProv, nitProv, porcProv, promoFiel, mensaje, swobligaCli, fechaCreacionBeneficio,searchProductoUnidad', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objBeneficioTipo' => array(self::BELONGS_TO, 'BeneficioTipo', 'tipo'),
            'objCombo' => array(self::BELONGS_TO, 'Combo', '', 'on' => 't.idBeneficio = objCombo.IdBeneficio'),
            'listPuntosVenta' => array(self::MANY_MANY, 'PuntoVenta', 't_BeneficiosPuntosVenta(idBeneficio, idComercial)'),
            'listBeneficiosProductos' => array(self::HAS_MANY, 'BeneficiosProductos', 'idBeneficio'),
            'listCedulas' => array(self::HAS_MANY, 'BeneficiosCedulas', 'idBeneficio'),
            'suscripciones' => array(self::HAS_ONE, 'SuscripcionesProductosUsuario', '','on' => 't.idBeneficio = suscripciones.idBeneficio'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idBeneficio' => 'Id Beneficio Producto',
            'idBeneficioSincronizado' => 'Id Beneficio Sincronizado',
            'tipo' => 'Tipo',
            'fechaIni' => 'Fecha Ini',
            'fechaFin' => 'Fecha Fin',
            'dsctoUnid' => 'Dscto Unid',
            'dsctoFrac' => 'Dscto Frac',
            'vtaUnid' => 'Vta Unid',
            'vtaFrac' => 'Vta Frac',
            'pagoUnid' => 'Pago Unid',
            'pagoFrac' => 'Pago Frac',
            'cuentaCop' => 'Cuenta Cop',
            'nitCop' => 'Nit Cop',
            'porcCop' => 'Porc Cop',
            'cuentaProv' => 'Cuenta Prov',
            'nitProv' => 'Nit Prov',
            'porcProv' => 'Porc Prov',
            'promoFiel' => 'Promo Fiel',
            'mensaje' => 'Mensaje',
            'swobligaCli' => 'Swobliga Cli',
            'fechaCreacionBeneficio' => 'Fecha Creacion Beneficio',
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

        $criteria->compare('idBeneficio', $this->idBeneficio);
        $criteria->compare('idBeneficioSincronizado', $this->idBeneficioSincronizado);
        $criteria->compare('tipo', $this->tipo);
        $criteria->compare('fechaIni', $this->fechaIni, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('dsctoUnid', $this->dsctoUnid);
        $criteria->compare('dsctoFrac', $this->dsctoFrac);
        $criteria->compare('vtaUnid', $this->vtaUnid);
        $criteria->compare('vtaFrac', $this->vtaFrac);
        $criteria->compare('pagoUnid', $this->pagoUnid);
        $criteria->compare('pagoFrac', $this->pagoFrac);
        $criteria->compare('cuentaCop', $this->cuentaCop);
        $criteria->compare('nitCop', $this->nitCop);
        $criteria->compare('porcCop', $this->porcCop);
        $criteria->compare('cuentaProv', $this->cuentaProv);
        $criteria->compare('nitProv', $this->nitProv, true);
        $criteria->compare('porcProv', $this->porcProv);
        $criteria->compare('promoFiel', $this->promoFiel);
        $criteria->compare('mensaje',$this->mensaje,true);
        $criteria->compare('swobligaCli', $this->swobligaCli);
        $criteria->compare('fechaCreacionBeneficio', $this->fechaCreacionBeneficio, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    
    public function searchBeneficiosCombos(){
       $criteria = new CDbCriteria;

       $criteria->with = array('listBeneficiosProductos' => array('with' => 'objProducto',),'objCombo');
       $criteria->condition  =  't.fechaFin >=:fecha AND  t.tipo in ('.implode(",", Yii::app()->params->beneficios['recambios']).') ';
       $criteria->params  = array(
                    'fecha' => date("Y-m-d"),
                );
        
       if(!empty($this->searchProductoUnidad ) && $this->searchProductoUnidad != null){
         $criteria->with['listBeneficiosProductos']['condition']= "objProducto.codigoProducto='$this->searchProductoUnidad' OR objProducto.descripcionProducto LIKE '%$this->searchProductoUnidad%'";
       }
       
        $criteria->compare('idBeneficio', $this->idBeneficio);
        $criteria->compare('idBeneficioSincronizado', $this->idBeneficioSincronizado);
        
        if(!empty($this->tipo)){
            $criteria->compare('t.tipo', $this->tipo);
        }
        $criteria->compare('fechaIni', $this->fechaIni, true);   
        $criteria->compare('fechaFin', $this->fechaFin, true); 
        
         return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Beneficios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
}
