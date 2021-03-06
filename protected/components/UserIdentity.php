<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    const ERROR_USER_INACTIVE = 20;
    const ERROR_USER_ACCESS = 30;
    const ERROR_USER_VALIDATE = 31;

    /*private $_shortName;

    public function getShortName() {
        return $this->_shortName;
    }*/

    /**
     * Autentica un usuario
     * Verfica si usuario existe en base de datos
     * y que corresponda con su password
     * @return boolean si autenticacion es correcta
     */
    public function authenticate($automatico = false) {
        $usuario = Usuario::model()->find(array(
            'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.identificacionUsuario=:cedula',
            'params' => array(
                ':cedula' => $this->username
            )
        ));
        
        /*if ($forzar) {
            Yii::app()->session[Yii::app()->params->usuario['sesion']] = $usuario;
            $nombre = explode(' ', $usuario->nombre);
            $this->_shortName = $nombre[0];
            $this->setState('lastLoginTime', $usuario->fechaUltimoAcceso);
            $this->setState('shortName', $this->_shortName);

            $this->errorCode = self::ERROR_NONE;
            return !$this->errorCode;
        }*/

        if ($usuario === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($usuario->activo != Yii::app()->params->usuario['estado']['activo']) {
            $this->errorCode = self::ERROR_USER_INACTIVE;
        } else if (!$automatico && !$usuario->validarContrasena($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $nombre = explode(' ', $usuario->nombre);
            //$this->_shortName = $nombre[0];

            $this->setState('lastLoginTime', $usuario->fechaUltimoAcceso);
            $this->setState('shortName', $nombre[0]);

            $this->errorCode = self::ERROR_NONE;
           // $usuario->fechaAccesoAnterior = ;
            $usuario->fechaUltimoAcceso = new CDbExpression('NOW()');

            if ($usuario->validate()) {
                try {
                    $usuario->save(); //para actualizar hora de ultimo acceso
                    Yii::app()->session[Yii::app()->params->usuario['sesion']] = $usuario;
                    $usuario_encriptado = encrypt($this->username,Yii::app()->params->sesion['claveCookie']);
                    _setCookie(Yii::app()->params->usuario['sesion'], $usuario_encriptado);
                    //Yii::app()->shoppingCart->setCodigoPerfil($usuario->codigoPerfil);
                } catch (Exception $exc) {
                    $this->errorCode = self::ERROR_USER_ACCESS;
                    Yii::log($exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }
            } else {
                $this->errorCode = self::ERROR_USER_VALIDATE;
            }
        }

        return !$this->errorCode;
    }
    
    /*
    public function authenticateAutomatic() {
        $usuario = Usuario::model()->find(array(
            'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.identificacionUsuario=:cedula',
            'params' => array(
                ':cedula' => $this->username
            )
        ));
        
        if ($usuario === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($usuario->activo != Yii::app()->params->usuario['estado']['activo']) {
            $this->errorCode = self::ERROR_USER_INACTIVE;
        } else {
            $nombre = explode(' ', $usuario->nombre);
            //$this->_shortName = $nombre[0];

            $this->setState('lastLoginTime', $usuario->fechaUltimoAcceso);
            $this->setState('shortName', $nombre[0]);

            $this->errorCode = self::ERROR_NONE;
            $usuario->fechaUltimoAcceso = new CDbExpression('NOW()');

            if($usuario->validate()) {
                try {
                    $usuario->save(); //para actualizar hora de ultimo acceso
                    Yii::app()->session[Yii::app()->params->usuario['sesion']] = $usuario;
                    $password_encriptado = encrypt($this->password,$this->username);
                    _setCookie(Yii::app()->params->usuario['sesion'], "$this->username-$password_encriptado");
                    //Yii::app()->shoppingCart->setCodigoPerfil($usuario->codigoPerfil);
                } catch (Exception $exc) {
                    $this->errorCode = self::ERROR_USER_ACCESS;
                    Yii::log($exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }
            } else {
                $this->errorCode = self::ERROR_USER_VALIDATE;
            }
        }

        return !$this->errorCode;
    }
*/
}
