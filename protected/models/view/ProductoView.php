<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoView
 *
 * @author miguel.sanchez
 */
class ProductoView {

    public static function generarDetalle($objDetalle,$layout=0) {
        if ($objDetalle != null) {
            self::generarElementoDetalle($objDetalle->mostrarDescripcion, "Descripción", $objDetalle->descripcionCorta,$layout);
            self::generarElementoDetalle($objDetalle->mostrarCaracteristicas, "Características", $objDetalle->caracteristicas,$layout);
            self::generarElementoDetalle($objDetalle->mostrarAtributo, "Atributo", $objDetalle->atributo,$layout);
            self::generarElementoDetalle($objDetalle->mostrarTamano, "Tamaño", $objDetalle->tamano,$layout);
            self::generarElementoDetalle($objDetalle->mostrarPeso, "Peso", $objDetalle->peso,$layout);
            self::generarElementoDetalle($objDetalle->mostrarMedida, "Medida", $objDetalle->medida,$layout);
            self::generarElementoDetalle($objDetalle->mostrarNaturaleza, "Naturaleza", $objDetalle->naturaleza,$layout);
            self::generarElementoDetalle($objDetalle->mostrarMaterial, "Material", $objDetalle->material,$layout);
            self::generarElementoDetalle($objDetalle->mostrarIdoneidad, "Idoneidad", $objDetalle->idoneidad,$layout);
            self::generarElementoDetalle($objDetalle->mostrarCalidad, "Calidad", $objDetalle->calidad,$layout);
            self::generarElementoDetalle($objDetalle->mostrarIngredientes, "Ingredientes", $objDetalle->ingredientes,$layout);
            self::generarElementoDetalle($objDetalle->mostrarUsos, "Usos", $objDetalle->usos,$layout);
            self::generarElementoDetalle($objDetalle->mostrarPrecauciones, "Precauciones", $objDetalle->precauciones,$layout);
            self::generarElementoDetalle($objDetalle->mostrarInformacionNutricional, "Información nutricional", $objDetalle->informacionNutricional,$layout);
            self::generarElementoDetalle($objDetalle->mostrarModoFabricacion, "Modo de fabricación", $objDetalle->modoFabricacion,$layout);
            self::generarElementoDetalle($objDetalle->mostrarOrigen, "Origen", $objDetalle->origen,$layout);
            self::generarElementoDetalle($objDetalle->mostrarComposicion, "Composición", $objDetalle->composicion,$layout);
            self::generarElementoDetalle($objDetalle->mostrarFormaEmpleo, "Forma de empleo", $objDetalle->formaEmpleo,$layout);
            self::generarElementoDetalle($objDetalle->mostrarViaAdministracion, "Vía de administración", $objDetalle->viaAdministracion,$layout);
            self::generarElementoDetalle($objDetalle->mostrarContraindicaciones, "Contraindicaciones", $objDetalle->contraindicaciones,$layout);
            self::generarElementoDetalle($objDetalle->mostrarRestricciones, "Restricciones", $objDetalle->restricciones,$layout);
            self::generarElementoDetalle($objDetalle->mostrarProhibiciones, "Prohibición", $objDetalle->prohibiciones,$layout);
            self::generarElementoDetalle($objDetalle->mostrarReglamentos, "Reglamentos", $objDetalle->reglamentos,$layout);
            self::generarElementoDetalle($objDetalle->mostrarAdvertencias, "Advertencias", $objDetalle->advertencias,$layout);
            self::generarElementoDetalle($objDetalle->mostrarPosologia, "Posología", $objDetalle->posologia,$layout);
        }
    }

    public static function generarElementoDetalle($mostrar, $titulo, $texto, $layout) {
        if ($mostrar == 1 && $texto != null) {
            
            if($layout==0){
                echo "<div data-role='collapsible' data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='c_cont_dtl_prod ui-nodisc-icon ui-alt-icon'>";
                echo "<h3>$titulo</h3>";
                echo "<p>$texto</p>";
                echo "</div>";
            }else{
              echo   "<div class='container'>
                        <div class='row line-bottom2'>
                                   <div class='col-md-12'>
                                           <span class='glyphicon glyphicon-chevron-right der' aria-hidden='true'></span>&nbsp;<h4 style='display:inline-block;'>$titulo</h4>";
             echo                           "<p>$texto</p>";
             echo   "               </div>
                        </div>
                      </div>  ";
                
            }
           
        }
    }

}
