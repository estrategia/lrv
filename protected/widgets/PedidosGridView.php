<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MobileGridView
 *
 * @author miguel.sanchez
 */
Yii::import('zii.widgets.grid.CGridView');

class PedidosGridView extends CGridView {
    /**
     * Renders a table body row.
     * @param integer $row the row number (zero-based).
     */
    public function renderTableRow($row) {
        parent::renderTableRow($row);
        echo "<tr>\n";
        echo "<td class='center' colspan='".count($this->columns)."'>\n";
        echo $this->dataProvider->data[$row]->objEstadoCompra->compraEstadoCliente;
        echo "</td>";
        echo "</tr>\n";
    }

}
