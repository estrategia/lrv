<?php

/**
 * This is the model class for table "m_ProductoDetalle".
 *
 * The followings are the available columns in table 'm_ProductoDetalle':
 * @property string $codigoProducto
 * @property integer $mostrarDescripcion
 * @property string $descripcionCorta
 * @property integer $mostrarIdoneidad
 * @property string $idoneidad
 * @property integer $mostrarCalidad
 * @property string $calidad
 * @property integer $mostrarIngredientes
 * @property string $ingredientes
 * @property integer $mostrarUsos
 * @property string $usos
 * @property integer $mostrarPrecauciones
 * @property string $precauciones
 * @property integer $mostrarInformacionNutricional
 * @property string $informacionNutricional
 * @property integer $mostrarModoFabricacion
 * @property string $modoFabricacion
 * @property integer $mostrarOrigen
 * @property string $origen
 * @property integer $mostrarComposicion
 * @property string $composicion
 * @property integer $mostrarFormaEmpleo
 * @property string $formaEmpleo
 * @property integer $mostrarViaAdministracion
 * @property string $viaAdministracion
 * @property integer $mostrarContraindicaciones
 * @property string $contraindicaciones
 * @property integer $mostrarRestricciones
 * @property string $restricciones
 * @property integer $mostrarProhibiciones
 * @property string $prohibiciones
 * @property integer $mostrarReglamentos
 * @property string $reglamentos
 * @property integer $mostrarAdvertencias
 * @property string $advertencias
 * @property integer $mostrarPosologia
 * @property string $posologia
 * @property integer $mostrarCaracteristicas
 * @property string $caracteristicas
 * @property integer $mostrarAtributo
 * @property string $atributo
 * @property integer $mostrarTamano
 * @property string $tamano
 * @property integer $mostrarPeso
 * @property string $peso
 * @property integer $mostrarMedida
 * @property string $medida
 * @property integer $mostrarNaturaleza
 * @property string $naturaleza
 * @property integer $mostrarMaterial
 * @property string $material
 *
 * The followings are the available model relations:
 * @property Producto $objProducto
 */
class ProductoDetalle extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_ProductoDetalle';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mostrarDescripcion, mostrarIdoneidad, mostrarCalidad, mostrarIngredientes, mostrarUsos, mostrarPrecauciones, mostrarInformacionNutricional, mostrarModoFabricacion, mostrarOrigen, mostrarComposicion, mostrarFormaEmpleo, mostrarViaAdministracion, mostrarContraindicaciones, mostrarRestricciones, mostrarProhibiciones, mostrarReglamentos, mostrarAdvertencias, mostrarPosologia, mostrarCaracteristicas, mostrarAtributo, mostrarTamano, mostrarPeso, mostrarMedida, mostrarNaturaleza, mostrarMaterial', 'required'),
            array('mostrarDescripcion, mostrarIdoneidad, mostrarCalidad, mostrarIngredientes, mostrarUsos, mostrarPrecauciones, mostrarInformacionNutricional, mostrarModoFabricacion, mostrarOrigen, mostrarComposicion, mostrarFormaEmpleo, mostrarViaAdministracion, mostrarContraindicaciones, mostrarRestricciones, mostrarProhibiciones, mostrarReglamentos, mostrarAdvertencias, mostrarPosologia, mostrarCaracteristicas, mostrarAtributo, mostrarTamano, mostrarPeso, mostrarMedida, mostrarNaturaleza, mostrarMaterial', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            array('descripcionCorta', 'length', 'max' => 200),
            array('idoneidad, calidad, ingredientes, usos, precauciones, informacionNutricional, modoFabricacion, origen, composicion, formaEmpleo, viaAdministracion, contraindicaciones, restricciones, prohibiciones, reglamentos, advertencias, posologia, caracteristicas, atributo, tamano, peso, medida, naturaleza, material', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoProducto, mostrarDescripcion, descripcionCorta, mostrarIdoneidad, idoneidad, mostrarCalidad, calidad, mostrarIngredientes, ingredientes, mostrarUsos, usos, mostrarPrecauciones, precauciones, mostrarInformacionNutricional, informacionNutricional, mostrarModoFabricacion, modoFabricacion, mostrarOrigen, origen, mostrarComposicion, composicion, mostrarFormaEmpleo, formaEmpleo, mostrarViaAdministracion, viaAdministracion, mostrarContraindicaciones, contraindicaciones, mostrarRestricciones, restricciones, mostrarProhibiciones, prohibiciones, mostrarReglamentos, reglamentos, mostrarAdvertencias, advertencias, mostrarPosologia, posologia, mostrarCaracteristicas, caracteristicas, mostrarAtributo, atributo, mostrarTamano, tamano, mostrarPeso, peso, mostrarMedida, medida, mostrarNaturaleza, naturaleza, mostrarMaterial, material', 'safe', 'on' => 'search'),
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
            'codigoProducto' => 'Codigo Producto',
            'mostrarDescripcion' => 'Mostrar Descripcion',
            'descripcionCorta' => 'Descripcion Corta',
            'mostrarIdoneidad' => 'Mostrar Idoneidad',
            'idoneidad' => 'Idoneidad',
            'mostrarCalidad' => 'Mostrar Calidad',
            'calidad' => 'Calidad',
            'mostrarIngredientes' => 'Mostrar Ingredientes',
            'ingredientes' => 'Ingredientes',
            'mostrarUsos' => 'Mostrar Usos',
            'usos' => 'Usos',
            'mostrarPrecauciones' => 'Mostrar Precauciones',
            'precauciones' => 'Precauciones',
            'mostrarInformacionNutricional' => 'Mostrar Informacion Nutricional',
            'informacionNutricional' => 'Informacion Nutricional',
            'mostrarModoFabricacion' => 'Mostrar Modo Fabricacion',
            'modoFabricacion' => 'Modo Fabricacion',
            'mostrarOrigen' => 'Mostrar Origen',
            'origen' => 'Origen',
            'mostrarComposicion' => 'Mostrar Composicion',
            'composicion' => 'Composicion',
            'mostrarFormaEmpleo' => 'Mostrar Forma Empleo',
            'formaEmpleo' => 'Forma Empleo',
            'mostrarViaAdministracion' => 'Mostrar Via Administracion',
            'viaAdministracion' => 'Via Administracion',
            'mostrarContraindicaciones' => 'Mostrar Contraindicaciones',
            'contraindicaciones' => 'Contraindicaciones',
            'mostrarRestricciones' => 'Mostrar Restricciones',
            'restricciones' => 'Restricciones',
            'mostrarProhibiciones' => 'Mostrar Prohibiciones',
            'prohibiciones' => 'Prohibiciones',
            'mostrarReglamentos' => 'Mostrar Reglamentos',
            'reglamentos' => 'Reglamentos',
            'mostrarAdvertencias' => 'Mostrar Advertencias',
            'advertencias' => 'Advertencias',
            'mostrarPosologia' => 'Mostrar Posologia',
            'posologia' => 'Posologia',
            'mostrarCaracteristicas' => 'Mostrar Caracteristicas',
            'caracteristicas' => 'Caracteristicas',
            'mostrarAtributo' => 'Mostrar Atributo',
            'atributo' => 'Atributo',
            'mostrarTamano' => 'Mostrar Tamano',
            'tamano' => 'Tamano',
            'mostrarPeso' => 'Mostrar Peso',
            'peso' => 'Peso',
            'mostrarMedida' => 'Mostrar Medida',
            'medida' => 'Medida',
            'mostrarNaturaleza' => 'Mostrar Naturaleza',
            'naturaleza' => 'Naturaleza',
            'mostrarMaterial' => 'Mostrar Material',
            'material' => 'Material',
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

        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('mostrarDescripcion', $this->mostrarDescripcion);
        $criteria->compare('descripcionCorta', $this->descripcionCorta, true);
        $criteria->compare('mostrarIdoneidad', $this->mostrarIdoneidad);
        $criteria->compare('idoneidad', $this->idoneidad, true);
        $criteria->compare('mostrarCalidad', $this->mostrarCalidad);
        $criteria->compare('calidad', $this->calidad, true);
        $criteria->compare('mostrarIngredientes', $this->mostrarIngredientes);
        $criteria->compare('ingredientes', $this->ingredientes, true);
        $criteria->compare('mostrarUsos', $this->mostrarUsos);
        $criteria->compare('usos', $this->usos, true);
        $criteria->compare('mostrarPrecauciones', $this->mostrarPrecauciones);
        $criteria->compare('precauciones', $this->precauciones, true);
        $criteria->compare('mostrarInformacionNutricional', $this->mostrarInformacionNutricional);
        $criteria->compare('informacionNutricional', $this->informacionNutricional, true);
        $criteria->compare('mostrarModoFabricacion', $this->mostrarModoFabricacion);
        $criteria->compare('modoFabricacion', $this->modoFabricacion, true);
        $criteria->compare('mostrarOrigen', $this->mostrarOrigen);
        $criteria->compare('origen', $this->origen, true);
        $criteria->compare('mostrarComposicion', $this->mostrarComposicion);
        $criteria->compare('composicion', $this->composicion, true);
        $criteria->compare('mostrarFormaEmpleo', $this->mostrarFormaEmpleo);
        $criteria->compare('formaEmpleo', $this->formaEmpleo, true);
        $criteria->compare('mostrarViaAdministracion', $this->mostrarViaAdministracion);
        $criteria->compare('viaAdministracion', $this->viaAdministracion, true);
        $criteria->compare('mostrarContraindicaciones', $this->mostrarContraindicaciones);
        $criteria->compare('contraindicaciones', $this->contraindicaciones, true);
        $criteria->compare('mostrarRestricciones', $this->mostrarRestricciones);
        $criteria->compare('restricciones', $this->restricciones, true);
        $criteria->compare('mostrarProhibiciones', $this->mostrarProhibiciones);
        $criteria->compare('prohibiciones', $this->prohibiciones, true);
        $criteria->compare('mostrarReglamentos', $this->mostrarReglamentos);
        $criteria->compare('reglamentos', $this->reglamentos, true);
        $criteria->compare('mostrarAdvertencias', $this->mostrarAdvertencias);
        $criteria->compare('advertencias', $this->advertencias, true);
        $criteria->compare('mostrarPosologia', $this->mostrarPosologia);
        $criteria->compare('posologia', $this->posologia, true);
        $criteria->compare('mostrarCaracteristicas', $this->mostrarCaracteristicas);
        $criteria->compare('caracteristicas', $this->caracteristicas, true);
        $criteria->compare('mostrarAtributo', $this->mostrarAtributo);
        $criteria->compare('atributo', $this->atributo, true);
        $criteria->compare('mostrarTamano', $this->mostrarTamano);
        $criteria->compare('tamano', $this->tamano, true);
        $criteria->compare('mostrarPeso', $this->mostrarPeso);
        $criteria->compare('peso', $this->peso, true);
        $criteria->compare('mostrarMedida', $this->mostrarMedida);
        $criteria->compare('medida', $this->medida, true);
        $criteria->compare('mostrarNaturaleza', $this->mostrarNaturaleza);
        $criteria->compare('naturaleza', $this->naturaleza, true);
        $criteria->compare('mostrarMaterial', $this->mostrarMaterial);
        $criteria->compare('material', $this->material, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductoDetalle the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
