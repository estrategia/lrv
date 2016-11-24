<?php

/**
 * This is the model class for table "t_CalificacionesProductos".
 *
 * The followings are the available columns in table 't_CalificacionesProductos':
 * @property integer $idCalificacion
 * @property string $codigoProducto
 * @property string $identificacionUsuario
 * @property integer $calificacion
 * @property string $titulo
 * @property string $comentario
 * @property string $fecha
 * @property integer $aprobado
 *
 * The followings are the available model relations:
 * @property Producto $objProducto
 * @property Usuario $objUsuario
 */
class ProductosCalificaciones extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosCalificaciones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoProducto, identificacionUsuario, aprobado,calificacion, titulo, comentario', 'required', 'on' => 'registro','message' => '{attribute} no puede estar vacío'),
            array('calificacion, aprobado', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            array('identificacionUsuario', 'length', 'max' => 10),
            array('titulo', 'length', 'max' => 100),
            array('comentario', 'length', 'max' => 500),
            array('fecha', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCalificacion, codigoProducto, identificacionUsuario, calificacion, titulo, comentario, fecha, aprobado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
            'objUsuario' => array(self::BELONGS_TO, 'Usuario', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCalificacion' => 'Id Calificacion',
            'codigoProducto' => 'Codigo Producto',
            'identificacionUsuario' => 'Identificacion Usuario',
            'calificacion' => 'Calificacion',
            'titulo' => 'Titulo',
            'comentario' => 'Comentario',
            'fecha' => 'Fecha',
            'aprobado' => 'Aprobado',
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

        $criteria->with = array('objProducto', 'objUsuario');
        $criteria->compare('idCalificacion', $this->idCalificacion);
        $criteria->compare('t.codigoProducto', $this->codigoProducto, true);
        $criteria->compare('t.identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('calificacion', $this->calificacion);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('comentario', $this->comentario, true);
        $criteria->compare('fecha', $this->fecha, true);
        $criteria->compare('aprobado', $this->aprobado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CalificacionesProductos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDiferencia() {
        $fecha = new DateTime();

        $fechaCalificacion = DateTime::createFromFormat('Y-m-d H:i:s', $this->fecha);
        $fechaCalificacion->modify('+1 day');
        $diff = $fechaCalificacion->diff($fecha);

        if ($diff->invert == 0) {
            $diff = new DateInterval('PT0S');
        }

        return $diff;
    }
    
    public function beforeSave() {
        if($this->isNewRecord){
            //$this->fecha = new CDbExpression('NOW()');
            $this->fecha = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
    }
    
    /**
     * Metodo que hereda comportamiento de ValidateModelBehavior
     * @return void
     */
    public function behaviors() {
        return array(
            'ValidateModelBehavior' => array(
                'class' => 'application.components.behaviors.ValidateModelBehavior',
                'model' => $this
            ),
        );
    }

}
