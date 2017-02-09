<?php

/**
 * This is the model class for table "m_Categoria".
 *
 * The followings are the available columns in table 'm_Categoria':
 * @property integer $idCategoriaBI
 * @property integer $idCategoria
 * @property string $nombreCategoria
 * @property integer $nivel
 * @property integer $padre
 */
class Categoria extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Categoria';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCategoriaBI, idCategoria, nombreCategoria, nivel, padre', 'required'),
            array('idCategoriaBI, idCategoria, nivel, padre', 'numerical', 'integerOnly' => true),
            array('nombreCategoria', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCategoriaBI, idCategoria, nombreCategoria, nivel, padre', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listCategoriasTienda' => array(self::MANY_MANY, 'CategoriaTienda', 'm_CategoriasCategoriaTienda(idCategoriaTienda, idCategoriaBI)'),
            'listCategoriasTiendaCategoria' => array(self::BELONGS_TO, 'CategoriasCategoriaTienda', '',
                'on' => 'listCategoriasHijasHijas.idCategoriaBI = listCategoriasTiendaCategoria.idCategoriaBI AND listCategoriasTiendaCategoria.idCategoriaTienda =:idcategoriatienda '),
            'listCategoriasHijas' => array(self::HAS_MANY, 'Categoria', 'padre'),
            'listCategoriasHijasHijas' => array(self::HAS_MANY, 'Categoria', 'padre'),
        	'listComprasCategoria' => array(self::HAS_MANY, 'ComprasUsuariosCategorias', 'idCategoriaBI'),	
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCategoriaBI' => 'Id Categoria Bi',
            'idCategoria' => 'Id Categoria',
            'nombreCategoria' => 'Nombre Categoria',
            'nivel' => 'Nivel',
            'padre' => 'Padre',
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

        $criteria->compare('idCategoriaBI', $this->idCategoriaBI);
        $criteria->compare('idCategoria', $this->idCategoria);
        $criteria->compare('nombreCategoria', $this->nombreCategoria, true);
        $criteria->compare('nivel', $this->nivel);
        $criteria->compare('padre', $this->padre);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Categoria the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function productosDivision($division,$isMobile) {
        $objSectorCiudad = null;
        $listCategoriasHijas = array();
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
        
        $categoriasHijas = CategoriaTienda::model()->findAll(array(
            'with' => array('objCategoriaPadre', 'listCategoriasBI'),
            'condition' => 't.idCategoriaPadre=:division AND t.tipoDispositivo=:dispositivo',
            'params' => array(
                ':division' => $division,
                ':dispositivo' => $isMobile ? CategoriaTienda::DISPOSITIVO_MOVIL : CategoriaTienda::DISPOSITIVO_ESCRITORIO
            ),
        ));
        
        if($categoriasHijas == null){
            return false;
        }
        
        // obtener Array de las categorias Hijas
        $listIdsCategoriaBI = array();

        foreach($categoriasHijas as $categoria){
            $listCategoriasHijas[] = $categoria->idCategoriaTienda;
            foreach ($categoria->listCategoriasBI as $objCategoriaBI) {
                $listIdsCategoriaBI[] = $objCategoriaBI->idCategoriaBI;
            }
        }
        
        $parametrosProductos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'order' => 'rand() LIMIT 12',
                'with' => array('listImagenes', 'objCodigoEspecial', ),
                'condition' => "t.activo=:activo AND t.idCategoriaBI IN (" . implode(",", $listIdsCategoriaBI) . ") AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
                'params' => array(
                    ':activo' => 1,
                ),
              
            );
        } else {
            $parametrosProductos = array(
                'order' => 'rand() LIMIT 12',
                'with' => array(
                    'listImagenes', 'objCodigoEspecial', 
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => "t.activo=:activo AND t.idCategoriaBI IN (" . implode(",", $listIdsCategoriaBI) . ") AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL) AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)",
                'params' => array(
                    ':activo' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                ),
               
            );

        }

        $listProductos = Producto::model()->findAll($parametrosProductos);
        
        foreach ($listProductos as $objProducto) {
        	if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
        		CodigoEspecial::setState($objProducto->objCodigoEspecial);
        	}
        }

        return $listProductos;
    }
    
    
    public static function obtenerPadrePrincipal($categoria){
    	$categoriaModel = self::model()->find(array(
    			'condition' => 'idCategoriaBI =:categoria',
    			'params' => array(
    					':categoria' => $categoria
    			)
    	));
    	
    	if($categoriaModel->padre != 0){
    		return self::obtenerPadrePrincipal($categoriaModel->padre);
    	}else{
    		return $categoria;
    	}
    }

}
