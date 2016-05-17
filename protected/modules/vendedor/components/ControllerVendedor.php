<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ControllerVendedor extends Controller {

    public $menu = array();
    public $showMenu = true;
    public $objSectorCiudad;

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function init() {
        $this->pageTitle = Yii::app()->name;
        //      $this->isMobile = true;
        $this->layout = 'mobile';

        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']] != null) {
            $this->objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];
        }
        $this->verificarSesion();
        //Yii::app()->session[Yii::app()->params->vendedor['sesion']['tipoEntrega']] = 2;
        $this->pageTitle = Yii::app()->name;
        $this->getSectorName();
        $this->registerJs();
        $this->registerCss();
        $this->getSectorName();
    }

    public function verificarSesion() {
        if (Yii::app()->controller->module->user->isGuest) {
            $cookieUsuario = _getCookie(Yii::app()->params->vendedor['sesion']['usuario']);
            
            if ($cookieUsuario != null) {
            //    $cookieUsuario = explode("-", $cookieUsuario);

              //  if (count($cookieUsuario) == 1) {
                    $usuario_desencriptado = decrypt($cookieUsuario, Yii::app()->params->sesion['claveCookie']);
                   
                    $objUsuario = Operador::model()->find(array(
                        'condition' => 't.usuario=:usuario AND t.perfil =:perfil',
                        'params' => array(
                            ':usuario' => $usuario_desencriptado,
                            ':perfil' => VendedorIdentity::PERFIL_VENDEDOR
                        )
                    ));

                   
                    if ($objUsuario !== null) {
                        
                        $identity = new VendedorIdentity($objUsuario->usuario, $objUsuario->clave);
                        $identity->authenticate();
                         Yii::app()->controller->module->user->login($identity);
//                        $identity = new UserIdentity($objUsuario->usuario, $objUsuario->clave);
//                        $identity->authenticate(true);
//                        Yii::app()->controller->module->user->login($identity);
                    }
            //    }
//                else if (count($cookieUsuario) == 2) {
//                    $objUsuario = Usuario::model()->findByPk($cookieUsuario[0]);
//
//                    if ($objUsuario !== null) {
//                        $usuario_encriptado = encrypt($objUsuario->identificacionUsuario, Yii::app()->params->sesion['claveCookie']);
//                        _setCookie(Yii::app()->params->usuario['sesion'], $usuario_encriptado);
//                        $identity = new UserIdentity($objUsuario->identificacionUsuario, $objUsuario->clave);
//                        $identity->authenticate(true);
//                        Yii::app()->user->login($identity);
//                    }
//                }
            }
        }
    }

    public function getSectorName() {
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']] != null) {
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];
            //$objSubSector = Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']];
            $this->sectorName = $objSectorCiudad->objCiudad->nombreCiudad;
            //if ($objSubSector != null)
            //    $this->sectorName .= " - " . $objSubSector->nombreSubSector;
            if ($objSectorCiudad->objSector->codigoSector != 0)
                $this->sectorName .= " - " . $objSectorCiudad->objSector->nombreSector;
        }else {
            $this->sectorName = "Seleccionar ciudad";
        }
    }

    public function registerJs() {
        /* $cs = Yii::app()->clientScript;
          $cs->scriptMap = array(
          'jquery.js' => false,
          'jquery.ui.js' => false,
          );

          Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquery/jquery-1.10.0.min.js", CClientScript::POS_HEAD);
          Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquerymobile/js/jquery.mobile-1.4.5.min.js", CClientScript::POS_HEAD);
          Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquery/jquery.validate.min.js", CClientScript::POS_HEAD); */
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquerymobile/js/jquery.mobile-1.4.5.min.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.min.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquerymobile-windows/jqm-windows.mdialog.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/common.min.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/vendedor.js", CClientScript::POS_HEAD);

        //Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/mobile.min.js", CClientScript::POS_HEAD);
    }

//custom application css
    public function registerCss() {
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/jquerymobile/css/themes/default/jquery.mobile-1.4.5.min.css");
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.css");
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.css");
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.theme.css");
        //Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/mobile.css");
    }

}
