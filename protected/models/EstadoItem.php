<?php

/**
 * This is the model class for table "m_EstadoItem".
 *
 * The followings are the available columns in table 'm_EstadoItem':
 * @property integer $idEstadoItem
 * @property string $estadoItem
 *
 * The followings are the available model relations:
 * @property ComprasItems[] $listItems
 */
class EstadoItem extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_EstadoItem';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('estadoItem', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idEstadoItem, estadoItem', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listItems' => array(self::HAS_MANY, 'ComprasItems', 'idEstadoItem'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idEstadoItem' => 'Id Estado Item',
            'estadoItem' => 'Estado Item',
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

        $criteria->compare('idEstadoItem', $this->idEstadoItem);
        $criteria->compare('estadoItem', $this->estadoItem, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return EstadoItem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
