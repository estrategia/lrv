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
 * @property integer $estado
 * @property string $descripcion
 * @property string $contenido
 * @property string $rutaImagen
 *
 * The followings are the available model relations:
 * @property ImagenBanner[] $listImagenesBanners
 * @property ModuloSectorCiudad[] $listModulosSectoresCiudades
 * @property ProductosModulos[] $listProductosModulos
 * @property UbicacionModulos[] $listUbicacionesModulos
 */
class ModulosConfigurados extends CActiveRecord {
    const TIPO_BANNER = 1;
    const TIPO_PRODUCTOS = 2;
    const TIPO_IMAGENES = 3;
    const TIPO_HTML = 4;
    const TIPO_HTML_PRODUCTOS = 5;
    const TIPO_HTML_MENU = 6;

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
            array('tipo, inicio, fin, estado, dias', 'required'),
            array('tipo, estado', 'numerical', 'integerOnly' => true),
            array('dias', 'length', 'max' => 30),
            array('descripcion', 'length', 'max' => 255),
            array('nombreCategoriaTienda, rutaImagen', 'length', 'max' => 100),
            array('contenido', 'required', 'on' => 'contenido'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idModulo, tipo, inicio, fin, dias, estado, descripcion, contenido, rutaImagen', 'safe', 'on' => 'search'),
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
            'listModulosSectoresCiudades' => array(self::HAS_MANY, 'ModuloSectorCiudad', 'idModulo'),
            'listProductosModulos' => array(self::HAS_MANY, 'ProductosModulos', 'idModulo'),
            'listUbicacionesModulos' => array(self::HAS_MANY, 'UbicacionModulos', 'idModulo'),
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
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
            'contenido' => 'Contenido',
            'rutaImagen' => 'Ruta Imagen',
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
        $criteria->compare('estado', $this->estado);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('rutaImagen', $this->rutaImagen, true);

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
    
    public static function getModulosBanner(DateTime $fecha, $ubicacion){
        return ModulosConfigurados::model()->findAll(array(
                'with' => array('listImagenesBanners', 'listUbicacionesModulos'),
                'order' => 'listUbicacionesModulos.orden, listImagenesBanners.orden',
                'condition' => 't.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion',
                'params' => array(
                    ':estado' => 1,
                    ':tipo' => ModulosConfigurados::TIPO_BANNER,
                    ':dia' => "%" . $fecha->format("w") . "%",
                    ':fecha' => $fecha->format("Y-m-d"),
                    ':ubicacion' => $ubicacion
                )
            ));
    }
    
    public static function getModulosMenu(DateTime $fecha){
        return ModulosConfigurados::model()->findAll(array(
                'condition' => 't.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha',
                'params' => array(
                    ':estado' => 1,
                    ':tipo' => ModulosConfigurados::TIPO_HTML_MENU,
                    ':dia' => "%" . $fecha->format("w") . "%",
                    ':fecha' => $fecha->format("Y-m-d"),
                )
            ));
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

        if ($idUbicacion == UbicacionModulos::UBICACION_ESCRITORIO_HOME) {
            $modulosInicio = UbicacionModulos::model()->findAll(array(
                'with' => array('objModulo' => array('with' => array('listImagenesBanners',
                            'listProductosModulos' =>
                            array('with' =>
                                array('objProducto' =>
                                    array('with' =>
                                        array(
                                            'listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listFiltros',
                                            'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                                            'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                                            'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                                        )))), 'listModulosSectoresCiudades'))),
                'condition' => "((listModulosSectoresCiudades.codigoSector=:sector  AND listModulosSectoresCiudades.codigoCiudad=:ciudad) OR 
                                  listModulosSectoresCiudades.codigoCiudad=:todasciudades OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:todossectores))
                                        AND objModulo.dias like :dia AND t.ubicacion =:ubicacion and objModulo.inicio<=:fecha and objModulo.fin>=:fecha",
                'params' => array(
                    ':estado' => 1,
                    'ubicacion' => $idUbicacion,
                    'fecha' => Date("Y-m-d"),
                    'dia' => "%" . Date("w") . "%",
                    'sector' => $sector,
                    'ciudad' => $ciudad,
                    'todasciudades' => Yii::app()->params->ciudad['*'],
                    'todossectores' => Yii::app()->params->sector['*'],
                    'saldo' => 0,
                ),
                'order' => 'listImagenesBanners.orden'
            ));
        } else {
            $modulosInicio = UbicacionModulos::model()->findAll(array(
                'with' => array('objModulo' => array('with' => array('listImagenesBanners',
                            'listProductosModulos' =>
                            array('with' =>
                                array('objProducto' =>
                                    array('with' =>
                                        array(
                                            'listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listFiltros',
                                            'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                                            'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                                            'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                                        )))), 'listModulosSectoresCiudades')), 'objUbicacionCategorias'),
                'condition' => "((listModulosSectoresCiudades.codigoSector=:sector  AND listModulosSectoresCiudades.codigoCiudad=:ciudad) OR 
                                  listModulosSectoresCiudades.codigoCiudad=:todasciudades OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:todossectores))
                                   AND objModulo.dias like :dia AND t.ubicacion =:ubicacion and objModulo.inicio<=:fecha and objModulo.fin>=:fecha AND
                                                 objUbicacionCategorias.idCategoriaBi=:idCategoria",
                'params' => array(
                    'ubicacion' => $idUbicacion,
                    'fecha' => Date("Y-m-d"),
                    'dia' => "%" . Date("w") . "%",
                    'sector' => $sector,
                    'ciudad' => $ciudad,
                    'todasciudades' => Yii::app()->params->ciudad['*'],
                    'todossectores' => Yii::app()->params->sector['*'],
                    'saldo' => 0,
                    'idCategoria' => $idCategoria
                ),
                'order' => 'listImagenesBanners.orden'
            ));
        }

        return $modulosInicio;
    }

}
