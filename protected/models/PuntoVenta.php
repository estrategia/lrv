<?php

/**
 * This is the model class for table "m_PuntoVenta".
 *
 * The followings are the available columns in table 'm_PuntoVenta':
 * @property integer $idPuntoDeVenta
 * @property integer $idSede
 * @property integer $idZona
 * @property integer $idCEDI
 * @property integer $idSector
 * @property integer $idTipoNegocio
 * @property string $idComercial
 * @property integer $codigoContable
 * @property string $idCentroCostos
 * @property string $nombrePuntoDeVenta
 * @property string $nombreCortoPuntoDeVenta
 * @property string $direccionPuntoDeVenta
 * @property string $barrioConIndicaciones
 * @property integer $idUbicacion
 * @property string $codigoCiudad
 * @property integer $estado
 * @property string $eMailPuntoDeVenta
 * @property integer $estratoPuntoDeVenta
 * @property string $cedulaAdministrador
 * @property string $cedulaSubAdministrador
 * @property string $ipCamara
 * @property string $direccionIPServidor
 * @property string $rutaImagenMapa
 * @property double $dmensionFondo
 * @property double $dimensionAncho
 * @property double $areaLocal
 * @property string $resoluciones
 * @property string $direccionGoogle
 * @property double $latitudGoogle
 * @property double $longitudGoogle
 * @property string $fechaCreacionRegistro
 * @property string $fechaModificacionRegistro
 * @property string $callCenter
 * @property integer $horarioAperturaLunesASabado
 * @property integer $horarioAperturaDomingo
 * @property integer $horarioAperturaFestivo
 * @property integer $horarioAperturaEspecial
 * @property integer $horarioDomicilioLunesASabado
 * @property integer $horarioDomicilioDomingo
 * @property integer $horarioDomicilioFestivo
 * @property integer $horarioDomicilioEspecial
 * @property integer $idSectorLRV
 */
class PuntoVenta extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_PuntoVenta';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idComercial, codigoContable, idCentroCostos, nombrePuntoDeVenta, nombreCortoPuntoDeVenta, codigoCiudad, fechaCreacionRegistro, fechaModificacionRegistro, idSectorLRV', 'required'),
            array('idSede, idZona, idCEDI, idSector, idTipoNegocio, codigoContable, idUbicacion, estado, estratoPuntoDeVenta, horarioAperturaLunesASabado, horarioAperturaDomingo, horarioAperturaFestivo, horarioAperturaEspecial, horarioDomicilioLunesASabado, horarioDomicilioDomingo, horarioDomicilioFestivo, horarioDomicilioEspecial, idSectorLRV', 'numerical', 'integerOnly' => true),
            array('dmensionFondo, dimensionAncho, areaLocal, latitudGoogle, longitudGoogle', 'numerical'),
            array('idComercial', 'length', 'max' => 10),
            array('idCentroCostos, resoluciones, direccionGoogle', 'length', 'max' => 255),
            array('nombrePuntoDeVenta, nombreCortoPuntoDeVenta, direccionPuntoDeVenta, eMailPuntoDeVenta, rutaImagenMapa', 'length', 'max' => 100),
            array('barrioConIndicaciones', 'length', 'max' => 60),
            array('codigoCiudad', 'length', 'max' => 11),
            array('cedulaAdministrador, cedulaSubAdministrador, ipCamara, direccionIPServidor', 'length', 'max' => 20),
            array('callCenter', 'length', 'max' => 2),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPuntoDeVenta, idSede, idZona, idCEDI, idSector, idTipoNegocio, idComercial, codigoContable, idCentroCostos, nombrePuntoDeVenta, nombreCortoPuntoDeVenta, direccionPuntoDeVenta, barrioConIndicaciones, idUbicacion, codigoCiudad, estado, eMailPuntoDeVenta, estratoPuntoDeVenta, cedulaAdministrador, cedulaSubAdministrador, ipCamara, direccionIPServidor, rutaImagenMapa, dmensionFondo, dimensionAncho, areaLocal, resoluciones, direccionGoogle, latitudGoogle, longitudGoogle, fechaCreacionRegistro, fechaModificacionRegistro, callCenter, horarioAperturaLunesASabado, horarioAperturaDomingo, horarioAperturaFestivo, horarioAperturaEspecial, horarioDomicilioLunesASabado, horarioDomicilioDomingo, horarioDomicilioFestivo, horarioDomicilioEspecial, idSectorLRV', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listServicios' => array(self::MANY_MANY, 'TipoServicio', 't_ServiciosPuntoVenta(idTipoServicio, idPuntoDeVenta)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPuntoDeVenta' => 'Id Punto De Venta',
            'idSede' => 'Id Sede',
            'idZona' => 'Id Zona',
            'idCEDI' => 'Id Cedi',
            'idSector' => 'Id Sector',
            'idTipoNegocio' => 'Id Tipo Negocio',
            'idComercial' => 'Id Comercial',
            'codigoContable' => 'Codigo Contable',
            'idCentroCostos' => 'Id Centro Costos',
            'nombrePuntoDeVenta' => 'Nombre Punto De Venta',
            'nombreCortoPuntoDeVenta' => 'Nombre Corto Punto De Venta',
            'direccionPuntoDeVenta' => 'Direccion Punto De Venta',
            'barrioConIndicaciones' => 'Barrio Con Indicaciones',
            'idUbicacion' => 'Id Ubicacion',
            'codigoCiudad' => 'Codigo Ciudad',
            'estado' => 'Estado',
            'eMailPuntoDeVenta' => 'E Mail Punto De Venta',
            'estratoPuntoDeVenta' => 'Estrato Punto De Venta',
            'cedulaAdministrador' => 'Cedula Administrador',
            'cedulaSubAdministrador' => 'Cedula Sub Administrador',
            'ipCamara' => 'Ip Camara',
            'direccionIPServidor' => 'Direccion Ipservidor',
            'rutaImagenMapa' => 'Ruta Imagen Mapa',
            'dmensionFondo' => 'Dmension Fondo',
            'dimensionAncho' => 'Dimension Ancho',
            'areaLocal' => 'Area Local',
            'resoluciones' => 'Resoluciones',
            'direccionGoogle' => 'Direccion Google',
            'latitudGoogle' => 'Latitud Google',
            'longitudGoogle' => 'Longitud Google',
            'fechaCreacionRegistro' => 'Fecha Creacion Registro',
            'fechaModificacionRegistro' => 'Fecha Modificacion Registro',
            'callCenter' => 'Call Center',
            'horarioAperturaLunesASabado' => 'Horario Apertura Lunes Asabado',
            'horarioAperturaDomingo' => 'Horario Apertura Domingo',
            'horarioAperturaFestivo' => 'Horario Apertura Festivo',
            'horarioAperturaEspecial' => 'Horario Apertura Especial',
            'horarioDomicilioLunesASabado' => 'Horario Domicilio Lunes Asabado',
            'horarioDomicilioDomingo' => 'Horario Domicilio Domingo',
            'horarioDomicilioFestivo' => 'Horario Domicilio Festivo',
            'horarioDomicilioEspecial' => 'Horario Domicilio Especial',
            'idSectorLRV' => 'Id Sector Lrv',
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

        $criteria->compare('idPuntoDeVenta', $this->idPuntoDeVenta);
        $criteria->compare('idSede', $this->idSede);
        $criteria->compare('idZona', $this->idZona);
        $criteria->compare('idCEDI', $this->idCEDI);
        $criteria->compare('idSector', $this->idSector);
        $criteria->compare('idTipoNegocio', $this->idTipoNegocio);
        $criteria->compare('idComercial', $this->idComercial, true);
        $criteria->compare('codigoContable', $this->codigoContable);
        $criteria->compare('idCentroCostos', $this->idCentroCostos, true);
        $criteria->compare('nombrePuntoDeVenta', $this->nombrePuntoDeVenta, true);
        $criteria->compare('nombreCortoPuntoDeVenta', $this->nombreCortoPuntoDeVenta, true);
        $criteria->compare('direccionPuntoDeVenta', $this->direccionPuntoDeVenta, true);
        $criteria->compare('barrioConIndicaciones', $this->barrioConIndicaciones, true);
        $criteria->compare('idUbicacion', $this->idUbicacion);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('eMailPuntoDeVenta', $this->eMailPuntoDeVenta, true);
        $criteria->compare('estratoPuntoDeVenta', $this->estratoPuntoDeVenta);
        $criteria->compare('cedulaAdministrador', $this->cedulaAdministrador, true);
        $criteria->compare('cedulaSubAdministrador', $this->cedulaSubAdministrador, true);
        $criteria->compare('ipCamara', $this->ipCamara, true);
        $criteria->compare('direccionIPServidor', $this->direccionIPServidor, true);
        $criteria->compare('rutaImagenMapa', $this->rutaImagenMapa, true);
        $criteria->compare('dmensionFondo', $this->dmensionFondo);
        $criteria->compare('dimensionAncho', $this->dimensionAncho);
        $criteria->compare('areaLocal', $this->areaLocal);
        $criteria->compare('resoluciones', $this->resoluciones, true);
        $criteria->compare('direccionGoogle', $this->direccionGoogle, true);
        $criteria->compare('latitudGoogle', $this->latitudGoogle);
        $criteria->compare('longitudGoogle', $this->longitudGoogle);
        $criteria->compare('fechaCreacionRegistro', $this->fechaCreacionRegistro, true);
        $criteria->compare('fechaModificacionRegistro', $this->fechaModificacionRegistro, true);
        $criteria->compare('callCenter', $this->callCenter, true);
        $criteria->compare('horarioAperturaLunesASabado', $this->horarioAperturaLunesASabado);
        $criteria->compare('horarioAperturaDomingo', $this->horarioAperturaDomingo);
        $criteria->compare('horarioAperturaFestivo', $this->horarioAperturaFestivo);
        $criteria->compare('horarioAperturaEspecial', $this->horarioAperturaEspecial);
        $criteria->compare('horarioDomicilioLunesASabado', $this->horarioDomicilioLunesASabado);
        $criteria->compare('horarioDomicilioDomingo', $this->horarioDomicilioDomingo);
        $criteria->compare('horarioDomicilioFestivo', $this->horarioDomicilioFestivo);
        $criteria->compare('horarioDomicilioEspecial', $this->horarioDomicilioEspecial);
        $criteria->compare('idSectorLRV', $this->idSectorLRV);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PuntoVenta the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
