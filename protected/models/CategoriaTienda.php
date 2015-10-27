<?php

/**
 * This is the model class for table "m_CategoriaTienda".
 *
 * The followings are the available columns in table 'm_CategoriaTienda':
 * @property integer $idCategoriaTienda
 * @property integer $idCategoriaPadre
 * @property string $nombreCategoriaTienda
 * @property integer $orden
 * @property integer $visible
 * @property string $rutaImagen
 * @property integer $tipoDispositivo
 *
 * The followings are the available model relations:
 * @property Categoria[] $listCategoriasBI
 * @property CategoriaTienda $objCategoriaPadre
 */
class CategoriaTienda extends CActiveRecord {
    const DISPOSITIVO_MOVIL = 1;
    const DISPOSITIVO_ESCRITORIO = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_CategoriaTienda';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombreCategoriaTienda, orden', 'required'),
            array('idCategoriaPadre, orden, visible, tipoDispositivo', 'numerical', 'integerOnly' => true),
            array('nombreCategoriaTienda, rutaImagen', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCategoriaTienda, idCategoriaPadre, nombreCategoriaTienda, orden, visible, rutaImagen, tipoDispositivo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listCategoriasBI' => array(self::MANY_MANY, 'Categoria', 'm_CategoriasCategoriaTienda(idCategoriaTienda, idCategoriaBI)'),
            'objCategoriaPadre' => array(self::BELONGS_TO, 'CategoriaTienda', 'idCategoriaPadre'),
            'listCategoriasHijas' => array(self::HAS_MANY, 'CategoriaTienda', 'idCategoriaPadre'),
            'listCategoriasHijasMenu' => array(self::HAS_MANY, 'CategoriaTienda', 'idCategoriaPadre', 'condition' => 'listCategoriasHijasMenu.visible=1', 'order' => 'listCategoriasHijasMenu.orden ASC'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCategoriaTienda' => 'Id Categoria Tienda',
            'idCategoriaPadre' => 'Id Categoria Padre',
            'nombreCategoriaTienda' => 'Nombre Categoria Tienda',
            'orden' => 'Orden',
            'visible' => 'Visible',
            'rutaImagen' => 'Ruta Imagen',
            'tipoDispositivo' => 'tipoDispositivo',
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

        $criteria->compare('idCategoriaTienda', $this->idCategoriaTienda);
        $criteria->compare('idCategoriaPadre', $this->idCategoriaPadre);
        $criteria->compare('nombreCategoriaTienda', $this->nombreCategoriaTienda, true);
        $criteria->compare('orden', $this->orden);
        $criteria->compare('visible', $this->visible);
        $criteria->compare('rutaImagen', $this->rutaImagen, true);
        $criteria->compare('tipoDispositivo', $this->tipoDispositivo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CategoriaTienda the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
