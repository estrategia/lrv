<?php

/**
 * This is the model class for table "t_BonosTienda".
 *
 * The followings are the available columns in table 't_BonosTienda':
 * @property string $idBonoTienda
 * @property string $identificacionUsuario
 * @property string $concepto
 * @property integer $valor
 * @property string $vigenciaInicio
 * @property string $vigenciaFin
 * @property integer $minimoCompra
 * @property integer $tipo
 * @property integer $estado
 * @property string $fechaCreacion
 * @property integer $idCompra
 * @property string $fechaUso
 * @property integer $valorCompra
 *
 * The followings are the available model relations:
 * @property Compras $objCompra
 */
class BonosTienda extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_BonosTienda';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, concepto, valor, vigenciaInicio, vigenciaFin, minimoCompra, tipo', 'required', 'message' => '{attribute} no puede estar vac&iacute;o'),
            array('valor, minimoCompra', 'numerical', 'integerOnly' => true, 'min' => 0),
            array('tipo, estado, idCompra, valorCompra', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario, concepto', 'length', 'max' => 50),
            array('vigenciaInicio, vigenciaFin', 'date', 'format' => 'yyyy-M-d'),
            array('vigenciaFin', 'validateDate'),
            array('fechaCreacion, fechaUso', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idBonoTienda, identificacionUsuario, concepto, valor, vigenciaInicio, vigenciaFin, minimoCompra, tipo, estado, fechaCreacion, idCompra, fechaUso, valorCompra', 'safe', 'on' => 'search'),
        );
    }

    public function validateDate($attribute, $params) {
        if ($attribute == 'vigenciaFin') {
            $vigenciaInicio = DateTime::createFromFormat('Y-m-d', $this->vigenciaInicio);
            $vigenciaFin = DateTime::createFromFormat('Y-m-d', $this->vigenciaFin);
            $diff = $vigenciaInicio->diff($vigenciaFin);

            if ($diff->invert == 1) {
                $this->addError($attribute, $this->getAttributeLabel($attribute) . ' debe ser mayor a vigencia inicio');
            }
        } else {
            $this->addError($attribute, $this->getAttributeLabel($attribute) . ' validaci&oacute;n incorrecta.');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idBonoTienda' => 'Id bono tienda',
            'identificacionUsuario' => 'Identificaci&oacute;n usuario',
            'concepto' => 'Concepto',
            'valor' => 'Valor',
            'vigenciaInicio' => 'Vigencia inicio',
            'vigenciaFin' => 'Vigencia fin',
            'minimoCompra' => 'M&iacute;nimo compra',
            'tipo' => 'Tipo',
            'estado' => 'Estado',
            'fechaCreacion' => 'Fecha creaci&oacute;n',
            'idCompra' => '#Compra',
            'fechaUso' => 'Fecha uso',
            'valorCompra' => 'Valor compra',
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
    public function search($todo = false) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idBonoTienda', $this->idBonoTienda);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('concepto', $this->concepto, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('vigenciaInicio', $this->vigenciaInicio, true);
        $criteria->compare('vigenciaFin', $this->vigenciaFin, true);
        $criteria->compare('minimoCompra', $this->minimoCompra, true);
        $criteria->compare('tipo', $this->tipo);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('fechaUso', $this->fechaUso, true);
        $criteria->compare('valorCompra', $this->valorCompra);

        if ($todo) {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'pagination' => false
            ));
        } else {

            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BonosTienda the static model class
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
    
    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->fechaCreacion = new CDbExpression('NOW()');
            $this->fechaCreacion = date('Y-m-d H:i:s');
        }

        return parent::beforeSave();
    }

    public function exportar() {
        Yii::import('application.vendors.phpexcel.PHPExcel', true);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Reporte Bonos");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getSheet(0)->setTitle('Bonos');

        //$objPHPExcel->setActiveSheetIndex(0);
        $objWorksheet = $objPHPExcel->getSheet(0);
        $objWorksheet->setTitle('Bonos');

        $col = 0;
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Bono');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Usuario');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Concepto');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Valor');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Vigencia Inicio');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Vigencia Fin');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Minimo Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Tipo');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Estado');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Fecha Creacion');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Fecha Uso');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Valor Compra');

        for ($col = 0; $col < 13; $col++) {
            $objWorksheet->getStyleByColumnAndRow($col, 1)->getFont()->setBold(true);
        }

        $dataProvider = $this->search(true);

        if ($dataProvider !== null) {
            foreach ($dataProvider->getData() as $idx => $objBono) {
                $objPHPExcel->setActiveSheetIndex(0);
                $objWorksheet = $objPHPExcel->getSheet(0);
                $col = 0;
                $fila = $idx + 2;
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->idBonoTienda);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->identificacionUsuario);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->concepto);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->valor);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->vigenciaInicio);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->vigenciaFin);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->minimoCompra);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, Yii::app()->params->callcenter["bonos"]["tipoNombre"][$objBono->tipo]);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, Yii::app()->params->callcenter["bonos"]["estadoNombre"][$objBono->estado]);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->fechaCreacion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->idCompra);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->fechaUso);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objBono->valorCompra);
            }
        }

        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="reporte_bonos_' . date('YmdHis') . '.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

}
