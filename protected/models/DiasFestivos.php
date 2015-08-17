<?php

/**
 * This is the model class for table "t_DiasFestivos".
 *
 * The followings are the available columns in table 't_DiasFestivos':
 * @property string $IdDiaFestivo
 * @property string $fechaDiaFestivo
 * @property string $nombreDiaFestivo
 * @property string $diaDeLaSemana
 */
class DiasFestivos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_DiasFestivos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fechaDiaFestivo, nombreDiaFestivo, diaDeLaSemana', 'required'),
            array('nombreDiaFestivo', 'length', 'max' => 45),
            array('diaDeLaSemana', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdDiaFestivo, fechaDiaFestivo, nombreDiaFestivo, diaDeLaSemana', 'safe', 'on' => 'search'),
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
            'IdDiaFestivo' => 'Id Dia Festivo',
            'fechaDiaFestivo' => 'Fecha Dia Festivo',
            'nombreDiaFestivo' => 'Nombre Dia Festivo',
            'diaDeLaSemana' => 'Dia De La Semana',
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

        $criteria->compare('IdDiaFestivo', $this->IdDiaFestivo, true);
        $criteria->compare('fechaDiaFestivo', $this->fechaDiaFestivo, true);
        $criteria->compare('nombreDiaFestivo', $this->nombreDiaFestivo, true);
        $criteria->compare('diaDeLaSemana', $this->diaDeLaSemana, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DiasFestivos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Determina si un dia es domingo o festivo
     * @param DateTime $dia
     * @return bool
     */
    public static function esDominicalFestivo(DateTime $dia = null) {
        if ($dia === null) {
            $dia = new DateTime;
        }

        //si es domingo
        if ($dia->format('w') == 0) {
            return true;
        }

        $festivo = self::model()->find(array(
            'condition' => 'fechaDiaFestivo=:dia',
            'params' => array('dia' => $dia->format('Y-m-d'))
        ));

        return $festivo !== null;
    }

    /**
     * Determina si un dia es domingo o festivo
     * @param DateTime $dia
     * @return bool
     */
    public static function esFestivo(DateTime $dia = null) {
        if ($dia === null) {
            $dia = new DateTime;
        }

        $festivo = self::model()->find(array(
            'condition' => 'fechaDiaFestivo=:dia',
            'params' => array('dia' => $dia->format('Y-m-d'))
        ));

        return $festivo !== null;
    }

}
