<?php
class AuthHeader
{
    public $login;
    public $pwd;
    public $Id_CodFacturacion;
    public $Nombre_Cargue;

    public function __construct($login, $pwd, $Id_CodFacturacion, $Nombre_Cargue)
    {
        $this->login = $login;
        $this->pwd = $pwd;
        $this->Id_CodFacturacion = $Id_CodFacturacion;
        $this->Nombre_Cargue = $Nombre_Cargue;
    }
} 
?>