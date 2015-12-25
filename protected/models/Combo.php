<?php

/**
 * This is the model class for table "m_Combo".
 *
 * The followings are the available columns in table 'm_Combo':
 * @property integer $idCombo
 * @property string $descripcionCombo
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property integer $estadoCombo
 *
 * The followings are the available model relations:
 * @property ComboProducto[] $listProductosCombo
 * @property ComboSectorCiudad[] $listComboSectorCiudad
 * @property ImagenCombo[] $listImagenes
 */
class Combo extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Combo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('descripcionCombo, fechaInicio, fechaFin', 'required'),
            array('estadoCombo, idBeneficio, tipoBeneficio', 'numerical', 'integerOnly' => true),
            array('descripcionCombo', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCombo, descripcionCombo, fechaInicio, fechaFin, estadoCombo, idBeneficio, tipoBeneficio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listProductosCombo' => array(self::HAS_MANY, 'ComboProducto', 'idCombo'),
            'listProductos' => array(self::MANY_MANY, 'Producto', 'm_ComboProducto(idCombo, codigoProducto)'),
            'listComboSectorCiudad' => array(self::HAS_MANY, 'ComboSectorCiudad', 'idCombo'),
            'listImagenesCombo' => array(self::HAS_MANY, 'ImagenCombo', 'idCombo'),
            'listImagenesComboGrande' => array(self::HAS_MANY, 'ImagenCombo', 'idCombo', 'on'=>'listImagenesComboGrande.idImagenCombo IS NULL OR (listImagenesComboGrande.estadoImagen=1 AND listImagenesComboGrande.tipoImagen='. YII::app()->params->producto['tipoImagen']['grande'] . ')'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCombo' => 'Id Combo',
            'descripcionCombo' => 'Descripcion Combo',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'estadoCombo' => 'Estado Combo',
            'idBeneficio' => 'Beneficio', 
            'tipoBeneficio' => 'Tipo Beneficio'
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

        $criteria->compare('idCombo', $this->idCombo);
        $criteria->compare('descripcionCombo', $this->descripcionCombo, true);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('estadoCombo', $this->estadoCombo);
        $criteria->compare('idBeneficio', $this->idBeneficio);
        if(!empty($this->tipoBeneficio)){
            $criteria->compare('tipoBeneficio', $this->tipoBeneficio);
        }
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Combo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function afterFind() {
        $this->descripcionCombo = trim($this->descripcionCombo);
        parent::afterFind();
    }

    /**
     * Retorna el tipo de imagen de un producto, si no se detecta, retorna null
     * @param int tipo de imagen
     * @return Imagen imagen del producto
     */
    public function objImagen($tipo) {
        $obj = null;

        foreach ($this->listImagenesCombo as $imagen) {
            if ($imagen->tipoImagen == $tipo && $imagen->estadoImagen == 1) {
                $obj = $imagen;
                break;
            }
        }
        return $obj;
    }
    
    public function rutaImagen(){
        $objImagen = $this->objImagen(YII::app()->params->producto['tipoImagen']['mini']);
        if($objImagen == null)
            return Yii::app()->params->producto['noImagen']['mini'];
        
        $rutaImagen = Yii::app()->params->carpetaImagen['combos'][YII::app()->params->producto['tipoImagen']['mini']] . $objImagen->rutaImagen;
        $directorio = Yii::getPathOfAlias('webroot'). $rutaImagen;
        
        if(!file_exists($directorio)){
            return Yii::app()->params->producto['noImagen']['mini'];
        }
        
        return $rutaImagen;
    }

    /**
     * Retorna lista de imagenes grandes del combo
     * @return array imagen del producto
     */
    public function listImagenesGrandes() {
        $list = array();

        foreach ($this->listImagenesComboGrande as $objImagen) {
            $rutaImagen = Yii::app()->params->carpetaImagen['combos'][YII::app()->params->producto['tipoImagen']['grande']] . $objImagen->rutaImagen;
            $directorio = Yii::getPathOfAlias('webroot') . $rutaImagen;

            if (file_exists($directorio)) {
               $list[] = $objImagen;
            }
        }
        return $list;
    }

    public function getSaldo($codigoCiudad, $codigoSector) {
        foreach ($this->listComboSectorCiudad as $objSaldo) {
            if ($objSaldo->codigoCiudad == $codigoCiudad && $objSaldo->codigoSector == $codigoSector) {
                return $objSaldo;
            }
        }

        return null;
    }

    public function getCodigo() {
        return "C-$this->idCombo";
    }
    
    public function getCadenaUrl(){
        return str_replace(array(" ","/"),"-", $this->descripcionCombo).".html";
    }

}
