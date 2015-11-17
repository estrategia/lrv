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
 * @property string $contenidoMovil
 *
 * The followings are the available model relations:
 * @property ImagenBanner[] $listImagenesBanners
 * @property ModuloSectorCiudad[] $listModulosSectoresCiudades
 * @property ProductosModulos[] $listProductosModulos
 * @property UbicacionModulos[] $listUbicacionesModulos
 */
//solucion versionamiento
class ModulosConfigurados extends CActiveRecord {

    const TIPO_BANNER = 1;
    const TIPO_PRODUCTOS = 2;
    const TIPO_IMAGENES = 3;
    const TIPO_HTML = 4;
    const TIPO_HTML_PRODUCTOS = 5;
    const TIPO_ENLACE_MENU = 6;
    const TIPO_PROMOCION_FLOTANTE = 7;
    const TIPO_PRODUCTOS_CUADRICULA = 8;
    const TIPO_GRUPO_MODULOS = 9;

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
            array('contenido', 'required', 'on' => 'contenido'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idModulo, tipo, inicio, fin, dias, estado, descripcion, contenido, contenidoMovil', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listImagenesBanners' => array(self::HAS_MANY, 'ImagenBanner', 'idModulo', 'order'=>'listImagenesBanners.orden ASC'),
            'listModulosSectoresCiudades' => array(self::HAS_MANY, 'ModuloSectorCiudad', 'idModulo'),
            'listProductosModulos' => array(self::HAS_MANY, 'ProductosModulos', 'idModulo'),
            'listUbicacionesModulos' => array(self::HAS_MANY, 'UbicacionModulos', 'idModulo'),
            'objMenuModulo' => array(self::BELONGS_TO, 'MenuModulo', 'idModulo'),
            'listModulosGrupo' => array(self::MANY_MANY, 'ModulosConfigurados', 't_GruposModulos(idGrupoModulo, idModulo)'),
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
            'contenidoMovil' => 'contenidoMovil',
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
        $criteria->compare('contenidoMovil', $this->contenidoMovil, true);

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

    public function getListaProductos($objSectorCiudad) {

        $listaCodigos = array();

        foreach ($this->listProductosModulos as $objProductoModulo) {
            $listaCodigos[] = $objProductoModulo->codigoProducto;
        }

        $listaProductos = array();

        if (!empty($listaCodigos)) {
            $criteria = array(
                'order' => 't.orden DESC',
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones'),
                'condition' => "t.activo=:activo AND t.codigoProducto IN (" . implode(",", $listaCodigos) . ") AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
                'params' => array(
                    ':activo' => 1,
                )
            );

            if ($objSectorCiudad !== null) {
                $criteria['with']['listSaldos'] = array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)');
                $criteria['with']['listPrecios'] = array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)');
                $criteria['with']['listSaldosTerceros'] = array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)');
                //$criteria['condition'] .= " AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)";
                //$criteria['params'][':saldo'] = 0;
                $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
                $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            }

            $listaProductos = Producto::model()->findAll($criteria);
        }

        return $listaProductos;
    }

    public static function getModulosBanner($objSectorCiudad, $ubicacion) {
        $fecha = new DateTime;

        $criteria = array(
            'with' => array('listImagenesBanners', 'listUbicacionesModulos', 'listModulosSectoresCiudades'),
            'order' => 'listUbicacionesModulos.orden, listImagenesBanners.orden',
            'condition' => 't.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion',
            'params' => array(
                ':estado' => 1,
                ':tipo' => ModulosConfigurados::TIPO_BANNER,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':ubicacion' => $ubicacion
            )
        );

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoCiudad;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoSector;
        }

        return ModulosConfigurados::model()->findAll($criteria);
    }

    public static function getModulosMenu($objSectorCiudad) {
        $fecha = new DateTime;

        $criteria = array(
            'with' => array('listModulosSectoresCiudades', 'objMenuModulo', 'listModulosSectoresCiudades'),
            'condition' => 't.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha',
            'params' => array(
                ':estado' => 1,
                ':tipo' => ModulosConfigurados::TIPO_ENLACE_MENU,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
            )
        );

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoCiudad;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoSector;
        }

        return ModulosConfigurados::model()->findAll($criteria);
    }

    public static function getModuloFlotante($objSectorCiudad, $ubicacion, $categoria = null) {
        $fecha = new DateTime;

        $criteria = array(
            'with' => array('listModulosSectoresCiudades'),
            'condition' => "t.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion",
            'params' => array(
                ':estado' => 1,
                ':tipo' => ModulosConfigurados::TIPO_PROMOCION_FLOTANTE,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':ubicacion' => $ubicacion,
            )
        );

        if ($categoria == null) {
            $criteria['with'][] = 'listUbicacionesModulos';
        } else {
            $criteria['with']['listUbicacionesModulos'] = array('with' => 'listUbicacionesCategorias');
            $criteria['condition'] .= " AND listUbicacionesCategorias.idCategoriaTienda = $categoria";
        }

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoCiudad;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoSector;
        }

        return ModulosConfigurados::model()->find($criteria);
    }
    
    public static function getModulosGrupo($idGrupo){
        $fecha = new DateTime;
        
        $objModulo = ModulosConfigurados::model()->find(array(
            'order' => 'listModulosGrupo_listModulosGrupo.orden',
            'with' => 'listModulosGrupo',
            'condition' => 't.estado=:estado AND t.inicio<=:fecha AND t.fin>=:fecha AND t.idModulo=:modulo',
            'params' => array(
                ':estado' => 1,
                ':fecha' => $fecha->format("Y-m-d"),
                ':modulo' => $idGrupo
            )
        ));
        
        if($objModulo==null){
            return array();
        }else{
            return $objModulo->listModulosGrupo;
        }
    }

    public static function getModulos($objSectorCiudad, $ubicacion, $categoria = null) {
        $fecha = new DateTime;

        $criteria = array(
            'order' => 'listUbicacionesModulos.orden',
            'with' => array('listModulosSectoresCiudades'),
            'condition' => "t.estado=:estado AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion",
            'params' => array(
                ':estado' => 1,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':ubicacion' => $ubicacion,
            )
        );
        
        if ($categoria == null) {
            $criteria['with'][] = 'listUbicacionesModulos';
        } else {
            $criteria['with']['listUbicacionesModulos'] = array('with' => 'listUbicacionesCategorias');
            $criteria['condition'] .= " AND listUbicacionesCategorias.idCategoriaTienda = $categoria";
        }
        
        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";
            
            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoCiudad;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoSector;
        }

        return ModulosConfigurados::model()->findAll($criteria);
    }
}
