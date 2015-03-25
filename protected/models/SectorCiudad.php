<?php

/**
 * This is the model class for table "m_SectorCiudad".
 *
 * The followings are the available columns in table 'm_SectorCiudad':
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $estadoCiudadSector
 * @property string $horaFin
 */
class SectorCiudad extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_SectorCiudad';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoCiudad, codigoSector', 'required'),
            array('codigoCiudad, codigoSector, estadoCiudadSector', 'length', 'max' => 10),
            array('horaFin', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoCiudad, codigoSector, estadoCiudadSector, horaFin', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'estadoCiudadSector' => 'Estado Ciudad Sector',
            'horaFin' => 'Hora Fin',
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

        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('estadoCiudadSector', $this->estadoCiudadSector, true);
        $criteria->compare('horaFin', $this->horaFin, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SectorCiudad the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function listDataSubsector_old(){
        $listCiudadesSectores = Ciudad::model()->findAll(array(
            'with' => array('listSectores'),
            'order' => 't.orden',
            'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
            'params' => array(
                ':estadoCiudadSector' => 1,
                ':estadoSector' => 1,
                ':estadoCiudad' => 1,
            )
        ));

        $listCiudadesSubsectores = Ciudad::model()->findAll(array(
            'with' => array(
                'listSubSectores' => array(
                    'condition' => 'listSubSectores.estadoSubSector=1',
                    'order' => 'listSubSectores.nombreSubSector',
                    'with' => array(
                        'listReferencias' => array(
                            'condition' => 'listReferencias.estadoReferencia=1',
                            'order' => 'listReferencias.nombreReferencia',
                            'with' => array(
                                'listSectores' => array(
                                    'order' => 'listSectores.nombreSector'
                                )))))),
        ));

        $idxCiudadesSubSectores = array();
        foreach ($listCiudadesSubsectores as $indice => $ciudad) {
            $idxCiudadesSubSectores[$ciudad->codigoCiudad] = $indice;
        }

        $listUbicacion = array();

        foreach ($listCiudadesSectores as $ciudad) {
            if (!empty($ciudad->listSectores)) {
                if (isset($idxCiudadesSubSectores[$ciudad->codigoCiudad])) {
                    foreach ($listCiudadesSubsectores[$idxCiudadesSubSectores[$ciudad->codigoCiudad]]->listSubSectores as $subSector) {
                        $arrayItem = array();
                        $arrayItem['label'] = "$ciudad->nombreCiudad - $subSector->nombreSubSector";
                        foreach ($subSector->listReferencias as $referencia) {
                            foreach ($referencia->listSectores as $sector) {
                                $arrayItem['group'][] = array(
                                    'label' => $sector->nombreSector,
                                    'value' => "$referencia->codigoCiudad-$sector->codigoSector",
                                );
                            }
                        }
                        $listUbicacion[] = $arrayItem;
                    }
                } else if ($ciudad->listSectores[0]->codigoSector == 0) {
                    $listUbicacion[] = array(
                        'group' => null,
                        'label' => $ciudad->nombreCiudad,
                        'value' => "$ciudad->codigoCiudad-0",
                    );
                } else {
                    $arrayItem = array();
                    $arrayItem['label'] = "$ciudad->nombreCiudad";
                    foreach ($ciudad->listSectores as $sector) {
                        $arrayItem['group'][] = array(
                            'label' => $sector->nombreSector,
                            'value' => "$ciudad->codigoCiudad-$sector->codigoSector",
                        );
                    }
                    $listUbicacion[] = $arrayItem;
                }
            }
        }
        
        return $listUbicacion;
    }
    
    public static function listDataSubsector(){
        $listCiudadesSectores = Ciudad::model()->findAll(array(
            'with' => array('listSectores'),
            'order' => 't.orden',
            'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
            'params' => array(
                ':estadoCiudadSector' => 1,
                ':estadoSector' => 1,
                ':estadoCiudad' => 1,
            )
        ));

        $listCiudadesSubsectores = Ciudad::model()->findAll(array(
            'with' => array(
                'listSubSectores' => array(
                    'condition' => 'listSubSectores.estadoSubSector=1',
                    'order' => 'listSubSectores.nombreSubSector',
                    'with' => array(
                        'listReferencias' => array(
                            'condition' => 'listReferencias.estadoReferencia=1',
                            'order' => 'listReferencias.nombreReferencia',
                            'with' => array(
                                'listSectores' => array(
                                    'order' => 'listSectores.nombreSector'
                                )))))),
        ));

        $idxCiudadesSubSectores = array();
        foreach ($listCiudadesSubsectores as $indice => $ciudad) {
            $idxCiudadesSubSectores[$ciudad->codigoCiudad] = $indice;
        }

        $listUbicacion = array();

        foreach ($listCiudadesSectores as $ciudad) {
            if (!empty($ciudad->listSectores)) {
                if (isset($idxCiudadesSubSectores[$ciudad->codigoCiudad])) {
                    foreach ($listCiudadesSubsectores[$idxCiudadesSubSectores[$ciudad->codigoCiudad]]->listSubSectores as $subSector) {
                        $group = "$ciudad->nombreCiudad - $subSector->nombreSubSector";
                        foreach ($subSector->listReferencias as $referencia) {
                            foreach ($referencia->listSectores as $sector) {
                                $listUbicacion[] = array(
                                    'label' => $sector->nombreSector,
                                    'value' => "$referencia->codigoCiudad-$sector->codigoSector",
                                    'group' => $group,
                                );
                            }
                        }
                    }
                } else if ($ciudad->listSectores[0]->codigoSector == 0) {
                    $listUbicacion[] = array(
                        'label' => $ciudad->nombreCiudad,
                        'value' => "$ciudad->codigoCiudad-0",
                    );
                } else {
                    $group = "$ciudad->nombreCiudad";
                    foreach ($ciudad->listSectores as $sector) {
                        $listUbicacion[] = array(
                            'label' => $sector->nombreSector,
                            'value' => "$ciudad->codigoCiudad-$sector->codigoSector",
                            'group' => $group,
                        );
                    }
                }
            }
        }
        
        return $listUbicacion;
    }

}
