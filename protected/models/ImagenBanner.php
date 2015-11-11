<?php

/**
 * This is the model class for table "m_ImagenBanner".
 *
 * The followings are the available columns in table 'm_ImagenBanner':
 * @property integer $idBanner
 * @property string $nombre
 * @property integer $rutaImagen
 * @property integer $tipoContenido
 * @property string $contenido
 * @property string $contenidoMovil
 * @property integer $idModulo
 * @property integer $orden
 *
 * The followings are the available model relations:
 * @property ModulosConfigurados $objModuloConfigurado
 */
class ImagenBanner extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_ImagenBanner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nombre, rutaImagen, tipoContenido, idModulo, orden', 'required'),
            array('rutaImagen, tipoContenido, idModulo, orden', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 45),
            array('contenido', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idBanner, nombre, rutaImagen, tipoContenido, contenido, contenidoMovil, idModulo, orden', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objModulo' => array(self::BELONGS_TO, 'ModulosConfigurados', 'idModulo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idBanner' => 'Id Banner',
            'nombre' => 'Nombre',
            'rutaImagen' => 'Ruta Imagen',
            'tipoContenido' => 'Tipo Contenido',
            'contenido' => 'Contenido',
            'contenidoMovil' => 'contenidoMovil',
            'idModulo' => 'Id Modulo',
            'orden' => 'Orden',
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

        $criteria->compare('idBanner', $this->idBanner);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('rutaImagen', $this->rutaImagen);
        $criteria->compare('tipoContenido', $this->tipoContenido);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('contenidoMovil', $this->contenidoMovil, true);
        $criteria->compare('idModulo', $this->idModulo);
        $criteria->compare('orden', $this->orden);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ImagenBanner the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
