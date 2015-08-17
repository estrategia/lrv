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

    public static function generarDetalle($objDetalle) {
        if ($objDetalle != null) {
            self::generarElementoDetalle($objDetalle->mostrarDescripcion, "Descripción", $objDetalle->descripcionCorta);
            self::generarElementoDetalle($objDetalle->mostrarCaracteristicas, "Características", $objDetalle->caracteristicas);
            self::generarElementoDetalle($objDetalle->mostrarAtributo, "Atributo", $objDetalle->atributo);
            self::generarElementoDetalle($objDetalle->mostrarTamano, "Tamaño", $objDetalle->tamano);
            self::generarElementoDetalle($objDetalle->mostrarPeso, "Peso", $objDetalle->peso);
            self::generarElementoDetalle($objDetalle->mostrarMedida, "Medida", $objDetalle->medida);
            self::generarElementoDetalle($objDetalle->mostrarNaturaleza, "Naturaleza", $objDetalle->naturaleza);
            self::generarElementoDetalle($objDetalle->mostrarMaterial, "Material", $objDetalle->material);
            self::generarElementoDetalle($objDetalle->mostrarIdoneidad, "Idoneidad", $objDetalle->idoneidad);
            self::generarElementoDetalle($objDetalle->mostrarCalidad, "Calidad", $objDetalle->calidad);
            self::generarElementoDetalle($objDetalle->mostrarIngredientes, "Ingredientes", $objDetalle->ingredientes);
            self::generarElementoDetalle($objDetalle->mostrarUsos, "Usos", $objDetalle->usos);
            self::generarElementoDetalle($objDetalle->mostrarPrecauciones, "Precauciones", $objDetalle->precauciones);
            self::generarElementoDetalle($objDetalle->mostrarInformacionNutricional, "Información nutricional", $objDetalle->informacionNutricional);
            self::generarElementoDetalle($objDetalle->mostrarModoFabricacion, "Modo de fabricación", $objDetalle->modoFabricacion);
            self::generarElementoDetalle($objDetalle->mostrarOrigen, "Origen", $objDetalle->origen);
            self::generarElementoDetalle($objDetalle->mostrarComposicion, "Composición", $objDetalle->composicion);
            self::generarElementoDetalle($objDetalle->mostrarFormaEmpleo, "Forma de empleo", $objDetalle->formaEmpleo);
            self::generarElementoDetalle($objDetalle->mostrarViaAdministracion, "Vía de administración", $objDetalle->viaAdministracion);
            self::generarElementoDetalle($objDetalle->mostrarContraindicaciones, "Contraindicaciones", $objDetalle->contraindicaciones);
            self::generarElementoDetalle($objDetalle->mostrarRestricciones, "Restricciones", $objDetalle->restricciones);
            self::generarElementoDetalle($objDetalle->mostrarProhibiciones, "Prohibición", $objDetalle->prohibiciones);
            self::generarElementoDetalle($objDetalle->mostrarReglamentos, "Reglamentos", $objDetalle->reglamentos);
            self::generarElementoDetalle($objDetalle->mostrarAdvertencias, "Advertencias", $objDetalle->advertencias);
            self::generarElementoDetalle($objDetalle->mostrarPosologia, "Posología", $objDetalle->posologia);
        }
    }

    public static function generarElementoDetalle($mostrar, $titulo, $texto) {
        if ($mostrar == 1 && $texto != null) {
            echo "<div data-role='collapsible' data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='c_cont_dtl_prod ui-nodisc-icon ui-alt-icon'>";
            echo "<h3>$titulo</h3>";
            echo "<p>$texto</p>";
            echo "</div>";
        }
    }

}
