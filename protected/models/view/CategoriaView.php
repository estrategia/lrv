<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaView
 *
 * @author miguel.sanchez
 */
class CategoriaView {
    /**
     * Retorna arreglo de categorias con subniveles
     * @return array arreglo de categorias con subniveles
     */
    public static function generarMenu() {
        $categorias = CategoriaTienda::model()->findAll(array(
            'order' => 't.orden',
            'condition' => 't.visible=:visible AND t.idCategoriaPadre IS NULL',
            'params' => array(
                ':visible' => 1
            )
        ));

        echo "<div data-role='collapsibleset' data-inset='true'  data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='c_cont_catg_prod ui-nodisc-icon ui-alt-icon'>";
        self::generarSubMenu($categorias, 1);
        echo "</div>";
    }

    /**
     * Retorna arreglo de subcategorias con subniveles
     * @param $categorias arreglo de subcategorias
     * @return array arreglo de subcategorias con subniveles
     */
    private static function generarSubMenu(&$categorias, $nivel) {
        $cantidad = count($categorias);
        foreach ($categorias as $indice => $categoria) {
            $categoriaItems = $categoria->listCategoriasHijasMenu;
            $claseCategoria = "catg_n$nivel";

            if (empty($categoriaItems)) {
                if ($nivel == 1) {
                    $clase = "";
                    
                    /*if($indice == 0)
                        $clase = "ui-first-child";
                    if($indice == ($cantidad -1))
                        $clase = "ui-last-child";*/
                    
                    //echo "<div data-role='collapsible' data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='ui-nodisc-icon ui-alt-icon cbtn_catg_contdiv'></div>";
                    echo "<a class='ui-collapsible-inset ui-corner-all ui-btn ui-btn-icon-right ui-btn-inherit ui-icon-carat-r align-left $clase c_btn_catg $claseCategoria' href='" . Yii::app()->createUrl('/catalogo/categoria', array('categoria' => $categoria->idCategoriaTienda)) . "' data-ajax='false'>";
                    echo "<img src='" . Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['categorias'] . $categoria->rutaImagen . "' class='ui-li-icon'>";
                    echo "<span>";
                    echo "$categoria->nombreCategoriaTienda";
                    echo "</span>";
                    echo "</a>";
                } else if ($nivel == 2) {                    
                    echo "<a class='ui-collapsible-inset ui-corner-all ui-collapsible-themed-content ui-collapsible-collapsed ui-btn ui-btn-icon-right ui-icon-carat-r align-left c_btn_catg_02 $claseCategoria' href='" . Yii::app()->createUrl('/catalogo/categoria', array('categoria' => $categoria->idCategoriaTienda)) . "' data-ajax='false'>$categoria->nombreCategoriaTienda</a>";
                }
            } else {
                echo "<div data-role='collapsible' data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='ui-nodisc-icon ui-alt-icon  cbtn_catg_contdiv $claseCategoria'>";
                echo "<h3>";
                if ($categoria->objCategoriaPadre == null) {
                    echo "<img src='" . Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['categorias'] . $categoria->rutaImagen . "' class='ui-li-icon'>";
                }
                echo "$categoria->nombreCategoriaTienda";
                echo "</h3>";
                if ($nivel == 1) {
                    self::generarSubMenu($categoriaItems, $nivel+1);
                } else if ($nivel == 2) {
                    self::generarSubMenuItem($categoriaItems, $nivel+1);
                }

                echo "</div>";
            }
        }
    }

    private static function generarSubMenuItem(&$categorias, $nivel) {
        echo "<ul data-role='listview'>";
        foreach ($categorias as $categoria) {
            echo "<li><a href='" . Yii::app()->createUrl('/catalogo/categoria', array('categoria' => $categoria->idCategoriaTienda)) . "' data-ajax='false'>$categoria->nombreCategoriaTienda</a></li>";
        }
        echo "</ul>";
    }
}
