<?php

/**
 * This is the model class for table "t_DocumentoCruce".
 *
 * The followings are the available columns in table 't_DocumentoCruce':
 * @property integer $idDocumentoCruce
 * @property integer $idCompra
 * @property string $documentoCruce
 * @property string $idComercial
 * @property integer $idOperador
 * @property string $fecha
 */
class DocumentoCruce extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_DocumentoCruce';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha', 'safe'),
            array('idCompra, idOperador', 'numerical', 'integerOnly' => true),
            array('documentoCruce', 'length', 'max' => 20),
            array('idComercial', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idDocumentoCruce, idCompra, documentoCruce, idComercial, idOperador, fecha', 'safe', 'on' => 'search'),
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
            'idDocumentoCruce' => 'Id Documento Cruce',
            'idCompra' => 'Id Compra',
            'documentoCruce' => 'Documento Cruce',
            'idComercial' => 'Id Comercial',
            'idOperador' => 'Id Operador',
            'fecha' => 'Fecha',
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

        $criteria->compare('idDocumentoCruce', $this->idDocumentoCruce);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('documentoCruce', $this->documentoCruce, true);
        $criteria->compare('idComercial', $this->idComercial, true);
        $criteria->compare('idOperador', $this->idOperador);
        $criteria->compare('fecha', $this->fecha, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DocumentoCruce the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->fecha = new CDbExpression('NOW()');
            $this->fecha = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
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

}
