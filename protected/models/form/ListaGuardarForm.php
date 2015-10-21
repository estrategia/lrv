<?php

/**
 * Description of RegistroForm
 *
 * @author miguel.sanchez
 */
class ListaGuardarForm extends CFormModel {

    public $idLista;
    public $identificacionUsuario;
    public $tipo;
    public $codigo;
    public $unidades;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('idLista', 'required', 'message' => 'Seleccionar {attribute}'),
            array('identificacionUsuario, tipo, codigo, unidades', 'safe'),
            array('idLista', 'validarLista'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'idLista' => 'Lista personal',
            'identificacionUsuario' => 'Usuario'
        );
    }

    /**
     * Valida existencia de usuario con correo ingresado
     */
    public function validarLista() {
        if (!$this->hasErrors()) {
            $model = ListasPersonales::model()->find(array(
                'condition' => 'identificacionUsuario=:usuario AND idLista=:lista',
                'params' => array(
                    ':usuario' => $this->identificacionUsuario,
                    ':lista' => $this->idLista
                )
            ));

            if ($model === null) {
                $this->addError('idLista', $this->getAttributeLabel('idLista') . ' no existente');
            }
        }
    }

    public function listData() {
        return ListasPersonales::model()->findAll(array(
            'condition' => 'identificacionUsuario=:usuario AND activa = 1',
            'params' => array(
                ':usuario' => $this->identificacionUsuario
            )
        ));
    }

}
