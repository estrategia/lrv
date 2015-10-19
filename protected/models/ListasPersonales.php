<?php

/**
 * This is the model class for table "t_ListasPersonales".
 *
 * The followings are the available columns in table 't_ListasPersonales':
 * @property integer $idLista
 * @property string $identificacionUsuario
 * @property string $nombreLista
 * @property string $fechaCreacion
 * @property string $fechaModificacion
 * @property integer $diasRecordar
 * @property integer $diaRecordar
 * @property string $fechaRecordar
 * @property integer $diasAnticipacion
 * @property integer $recordarCorreo
 * @property integer $recordarNotificacion
 * @property integer $estadoLista
 *
 * The followings are the available model relations:
 * @property Usuario $objUsuario
 * @property ListasPersonalesDetalle[] $listDetalle
 */
class ListasPersonales extends CActiveRecord {
    public $estadoLista = 0;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ListasPersonales';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, nombreLista', 'required'),
            array('diasRecordar, diaRecordar, diasAnticipacion, recordarCorreo, recordarNotificacion, estadoLista, activa', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('nombreLista', 'length', 'max' => 20),
            array('fechaCreacion, fechaModificacion, fechaRecordar', 'safe'),
            array('diasRecordar, diaRecordar, diasAnticipacion, fechaRecordar', 'default', 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idLista, identificacionUsuario, nombreLista, fechaCreacion, fechaModificacion, diasRecordar, diaRecordar, fechaRecordar, diasAnticipacion, recordarCorreo, recordarNotificacion, estadoLista, activa', 'safe', 'on' => 'search'),
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
            'listDetalle' => array(self::HAS_MANY, 'ListasPersonalesDetalle', 'idLista'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idLista' => 'Lista',
            'identificacionUsuario' => 'Identificación Usuario',
            'nombreLista' => 'Nombre Lista',
            'fechaCreacion' => 'Fecha Creación',
            'fechaModificacion' => 'Fecha Modificación',
            'diasRecordar' => 'Días Recordar',
            'diaRecordar' => 'Día Recordar',
            'fechaRecordar' => 'Fecha Recordar',
            'diasAnticipacion' => 'Días Anticipación',
            'recordarCorreo' => 'Recordar Correo',
            'recordarNotificacion' => 'Recordar Notificacion',
            'estadoLista' => 'Recordar',
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
    public function search($params = null) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idLista', $this->idLista);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario);
        $criteria->compare('nombreLista', $this->nombreLista, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('fechaModificacion', $this->fechaModificacion, true);
        $criteria->compare('diasRecordar', $this->diasRecordar);
        $criteria->compare('diaRecordar', $this->diaRecordar);
        $criteria->compare('fechaRecordar', $this->fechaRecordar, true);
        $criteria->compare('diasAnticipacion', $this->diasAnticipacion);
        $criteria->compare('recordarCorreo', $this->recordarCorreo);
        $criteria->compare('recordarNotificacion', $this->recordarNotificacion);
        $criteria->compare('estadoLista', $this->estadoLista);
        $criteria->compare('activa', $this->activa);

        if ($params === null) {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }
        
        if(isset($params['order'])){
            $criteria->order = $params['order'];
        }
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => isset($params['pageSize']) ? $params['pageSize'] : 10,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ListasPersonales the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->fechaCreacion = new CDbExpression('NOW()');
        }
        
        $this->fechaModificacion = new CDbExpression('NOW()');
        return parent::beforeSave();
    }

}
