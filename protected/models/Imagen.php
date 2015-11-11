<?php

/**
 * This is the model class for table "m_Imagen".
 *
 * The followings are the available columns in table 'm_Imagen':
 * @property string $idImagen
 * @property string $codigoProducto
 * @property string $nombreImagen
 * @property string $tituloImagen
 * @property string $descripcionImagen
 * @property string $tipoImagen
 * @property string $rutaImagen
 * @property integer $ordenImagen
 * @property string $estadoImagen
 *
 * The followings are the available model relations:
 * @property Producto $objProducto
 */
class Imagen extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Imagen';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoProducto, nombreImagen, tituloImagen, descripcionImagen, rutaImagen, ordenImagen', 'required'),
            array('ordenImagen', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            array('nombreImagen, tituloImagen, descripcionImagen, rutaImagen', 'length', 'max' => 100),
            array('tipoImagen, estadoImagen', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idImagen, codigoProducto, nombreImagen, tituloImagen, descripcionImagen, tipoImagen, rutaImagen, ordenImagen, estadoImagen', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idImagen' => 'Id Imagen',
            'codigoProducto' => 'Codigo Producto',
            'nombreImagen' => 'Nombre Imagen',
            'tituloImagen' => 'Titulo Imagen',
            'descripcionImagen' => 'Descripcion Imagen',
            'tipoImagen' => 'Tipo Imagen',
            'rutaImagen' => 'Ruta Imagen',
            'ordenImagen' => 'Orden Imagen',
            'estadoImagen' => 'Estado Imagen',
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

        $criteria->compare('idImagen', $this->idImagen, true);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('nombreImagen', $this->nombreImagen, true);
        $criteria->compare('tituloImagen', $this->tituloImagen, true);
        $criteria->compare('descripcionImagen', $this->descripcionImagen, true);
        $criteria->compare('tipoImagen', $this->tipoImagen, true);
        $criteria->compare('rutaImagen', $this->rutaImagen, true);
        $criteria->compare('ordenImagen', $this->ordenImagen);
        $criteria->compare('estadoImagen', $this->estadoImagen, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Imagen the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
