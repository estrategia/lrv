<?php

/**
 * This is the model class for table "t_BloqueosUsuarios".
 *
 * The followings are the available columns in table 't_BloqueosUsuarios':
 * @property string $idBloqueoUsuario
 * @property string $identificacionUsuario
 * @property integer $numeroCompras
 * @property integer $acumuladoCompras
 * @property string $anho
 * @property string $mes
 * @property integer $estado
 * @property string $fechaRegistro
 * @property string $fechaActualizacion
 *
 * The followings are the available model relations:
 * @property Compras[] $lisCompras
 */
class BloqueosUsuarios extends CActiveRecord {

    const ESTADO_BLOQUEADO = 1;
    const ESTADO_DESBLOQUEADO = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_BloqueosUsuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, numeroCompras, acumuladoCompras, anho, mes, estado, fechaRegistro, fechaActualizacion', 'required'),
            array('numeroCompras, acumuladoCompras, estado', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('anho', 'length', 'max' => 4),
            array('mes', 'length', 'max' => 2),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idBloqueoUsuario, identificacionUsuario, numeroCompras, acumuladoCompras, anho, mes, estado, fechaRegistro, fechaActualizacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objUsuario' => array(self::BELONGS_TO, 'Usuario', 'identificacionUsuario'),
            'listCompras' => array(self::MANY_MANY, 'Compras', 't_ComprasBloqueoUsuarios(idBloqueoUsuario, idCompra)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idBloqueoUsuario' => 'Id Bloqueo Usuario',
            'identificacionUsuario' => 'Identificacion Usuario',
            'numeroCompras' => 'Numero Compras',
            'acumuladoCompras' => 'Acumulado Compras',
            'anho' => 'Anho',
            'mes' => 'Mes',
            'estado' => 'Estado',
            'fechaRegistro' => 'Fecha Registro',
            'fechaActualizacion' => 'Fecha Actualizacion',
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

        $criteria->compare('idBloqueoUsuario', $this->idBloqueoUsuario, true);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('numeroCompras', $this->numeroCompras);
        $criteria->compare('acumuladoCompras', $this->acumuladoCompras);
        $criteria->compare('anho', $this->anho, true);
        $criteria->compare('mes', $this->mes, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('fechaRegistro', $this->fechaRegistro, true);
        $criteria->compare('fechaActualizacion', $this->fechaActualizacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BloqueosUsuarios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
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

    public function desbloquearCuenta() {
        if ($this->objUsuario !== null) {
            $objUsuario = $this->objUsuario;
            $objUsuario->activo=Usuario::ESTADO_ACTIVO;
            $this->estado = self::ESTADO_DESBLOQUEADO;

            if ($this->save()) {
                if ($objUsuario->save() > 0) {
                	
                	$contenidoCorreo = Yii::app()->controller->renderPartial(Yii::app()->params->rutasPlantillasCorreo['correoDesbloqueo'], array('identificacionUsuario' => $this->identificacionUsuario), true);
                	
                    $htmlCorreo = PlantillaCorreo::getContenido('desbloquearCuenta',$contenidoCorreo);
                    
                    try {
                        sendHtmlEmail($objUsuario->correoElectronico, "La Rebaja Virtual: Desbloqueo de cuenta", $htmlCorreo, Yii::app()->params->callcenter['correo']);
                    } catch (Exception $exc) {
                    }
                } else {
                    Yii::log("BloqueosUsuarios::desbloquearCuenta - Error al activar usuario [$this->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($this->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
                }
            } else {
                Yii::log("BloqueosUsuarios::desbloquearCuenta - Error al actualizar bloqueo [$this->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($this->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
            }
        }else{
            Yii::log("BloqueosUsuarios::desbloquearCuenta - Usuario no existe [$this->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($this->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
        }
    }

}
