<?php

/**
 * This is the model class for table "m_ModulosConfigurados".
 *
 * The followings are the available columns in table 'm_ModulosConfigurados':
 * @property integer $idModulo
 * @property integer $tipo
 * @property string $inicio
 * @property string $fin
 * @property string $dias
 * @property integer $orden
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property MImagenBanner[] $mImagenBanners
 * @property MModuloSectorCiudad[] $mModuloSectorCiudads
 * @property TProductosModulos[] $tProductosModuloses
 * @property TUbicacionModulos[] $tUbicacionModuloses
 */
class ModulosConfigurados extends CActiveRecord {
    const TIPO_ESCRITORIO_BANNER = 1;
    const TIPO_LISTA_PRODUCTOS = 2;
    const TIPO_ESCRITORIO_IMAGENES = 3;
    const TIPO_MOVIL_BANNER_HOME = 4;
    const TIPO_MOVIL_BANNER_INICIO = 5;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_ModulosConfigurados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo, inicio, fin, orden', 'required'),
            array('tipo, orden', 'numerical', 'integerOnly' => true),
            array('dias', 'length', 'max' => 30),
            array('descripcion', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idModulo, tipo, inicio, fin, dias, orden, descripcion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listImagenesBanners' => array(self::HAS_MANY, 'ImagenBanner', 'idModulo'),
            'objImagenBanners' => array(self::HAS_MANY, 'ImagenBanner', 'idModulo'),
            'objModuloSectorCiudad' => array(self::HAS_MANY, 'ModuloSectorCiudad', 'idModulo'),
            'objProductosModulos' => array(self::HAS_MANY, 'ProductosModulos', 'idModulo'),
            'objUbicacionModulos' => array(self::HAS_MANY, 'UbicacionModulos', 'idModulo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idModulo' => 'Id Modulo',
            'tipo' => 'Tipo',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            'dias' => 'Dias',
            'orden' => 'Orden',
            'descripcion' => 'Descripcion',
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

        $criteria->compare('idModulo', $this->idModulo);
        $criteria->compare('tipo', $this->tipo);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fin', $this->fin, true);
        $criteria->compare('dias', $this->dias, true);
        $criteria->compare('orden', $this->orden);
        $criteria->compare('descripcion', $this->descripcion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ModulosConfigurados the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function traerModulos($idUbicacion, $idCategoria = null) {
        $objSectorCiudad = null;
        $sector = $ciudad = "";
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']])) {
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
            $sector = $objSectorCiudad->codigoSector;
            $ciudad = $objSectorCiudad->codigoCiudad;
        } else {
            $sector = Yii::app()->params->sector['*'];
            $ciudad = Yii::app()->params->ciudad['*'];
        }

        if ($idUbicacion == 1) {
            $modulosInicio = UbicacionModulos::model()->findAll(array(
                'with' => array('objModulo' => array('with' => array('objImagenBanners',
                            'objProductosModulos' =>
                            array('with' =>
                                array('objProducto' =>
                                    array('with' =>
                                        array(
                                            'listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listFiltros',
                                            'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                                            'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                                            'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                                        )))), 'objModuloSectorCiudad'))),
                'condition' => "objModuloSectorCiudad.codigoSector=:sector  AND objModuloSectorCiudad.codigoCiudad=:ciudad AND 
                                                 objModulo.dias like :dia AND t.ubicacion =:ubicacion and objModulo.inicio<=:fecha and objModulo.fin>=:fecha",
                'params' => array(
                    'ubicacion' => $idUbicacion,
                    'fecha' => Date("Y-m-d"),
                    'dia' => "%" . Date("w") . "%",
                    'sector' => $sector,
                    'ciudad' => $ciudad,
                    'saldo' => 0,
                ),
                'order' => 't.orden,objImagenBanners.orden'
            ));
        } else {
            $modulosInicio = UbicacionModulos::model()->findAll(array(
                'with' => array('objModulo' => array('with' => array('objImagenBanners',
                            'objProductosModulos' =>
                            array('with' =>
                                array('objProducto' =>
                                    array('with' =>
                                        array(
                                            'listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listFiltros',
                                            'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                                            'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                                            'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                                        )))), 'objModuloSectorCiudad')), 'objUbicacionCategorias'),
                'condition' => "objModuloSectorCiudad.codigoSector=:sector  AND objModuloSectorCiudad.codigoCiudad=:ciudad AND 
                                                 objModulo.dias like :dia AND t.ubicacion =:ubicacion and objModulo.inicio<=:fecha and objModulo.fin>=:fecha AND
                                                 objUbicacionCategorias.idCategoriaBi=:idCategoria",
                'params' => array(
                    'ubicacion' => $idUbicacion,
                    'fecha' => Date("Y-m-d"),
                    'dia' => "%" . Date("w") . "%",
                    'sector' => $sector,
                    'ciudad' => $ciudad,
                    'saldo' => 0,
                    'idCategoria' => $idCategoria
                ),
                'order' => 't.orden,objImagenBanners.orden'
            ));
        }

        return $modulosInicio;
    }

}
