<?php

/**
 * This is the model class for table "t_HorariosPuntoVenta".
 *
 * The followings are the available columns in table 't_HorariosPuntoVenta':
 * @property integer $idHorarioPuntoDeVenta
 * @property string $horarioInicio
 * @property string $horarioFin
 *
 */
class HorarioPuntoVenta extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_HorariosPuntoVenta';
    }

    public static function getHorariosDias() {
        return array(
            '0' => array('atributo' => 'horarioAperturaDomingo', 'foranea' => 'objHorarioAperturaDomingo'),
            '1' => array('atributo' => 'horarioAperturaLunesASabado', 'foranea' => 'objHorarioAperturaLunesASabado'),
            '2' => array('atributo' => 'horarioAperturaLunesASabado', 'foranea' => 'objHorarioAperturaLunesASabado'),
            '3' => array('atributo' => 'horarioAperturaLunesASabado', 'foranea' => 'objHorarioAperturaLunesASabado'),
            '4' => array('atributo' => 'horarioAperturaLunesASabado', 'foranea' => 'objHorarioAperturaLunesASabado'),
            '5' => array('atributo' => 'horarioAperturaLunesASabado', 'foranea' => 'objHorarioAperturaLunesASabado'),
            '6' => array('atributo' => 'horarioAperturaLunesASabado', 'foranea' => 'objHorarioAperturaLunesASabado'),
            'festivo' => array('atributo' => 'horarioAperturaFestivo', 'foranea' => 'objHorarioAperturaFestivo')
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('horarioInicio, horarioFin', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idHorarioPuntoDeVenta, horarioInicio, horarioFin', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idHorarioPuntoDeVenta' => 'Idhorario Punto De Venta',
            'horarioInicio' => 'Horario Inicio',
            'horarioFin' => 'Horario Fin',
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

        $criteria->compare('idHorarioPuntoDeVenta', $this->idHorarioPuntoDeVenta);
        $criteria->compare('horarioInicio', $this->horarioInicio, true);
        $criteria->compare('horarioFin', $this->horarioFin, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HorarioPuntoVenta the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
