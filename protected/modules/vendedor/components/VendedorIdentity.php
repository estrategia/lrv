<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class VendedorIdentity extends CUserIdentity {
    const ERROR_USER_INACTIVE = 20;
    public $user = null;
    
    /**
     * Autentica un usuario
     * Verfica si usuario existe en base de datos
     * y que corresponda con su password
     * @return boolean si autenticacion es correcta
     */
    public function authenticate() {
        $user = Operador::model()->find(array(
            'with' => array('objOperadorVendedor'),
            'condition' => 't.usuario=:usuario AND t.perfil =:perfil',
            'params' => array(
                ':usuario' => $this->username,
                ':perfil' => Yii::app()->params->callcenter['perfilesOperador']['mensajeroVendedor']
            )
        ));
        
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->activo != Yii::app()->params->usuario['estado']['activo']) {
            $this->errorCode = self::ERROR_USER_INACTIVE;
        } else if (!$user->validarContrasena($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
            $this->user = $user;
            
            $usuario_encriptado = encrypt($this->username,Yii::app()->params->sesion['claveCookie']);
            _setCookie(Yii::app()->params->vendedor['sesion']['usuario'], $usuario_encriptado);
        }
        return !$this->errorCode;
    }

}
