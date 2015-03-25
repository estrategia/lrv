<div id="owl-productodetalle-inicio" class="owl-carousel owl-theme owl-productodetalle">
    <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio1.jpg" alt=""></a></div>
    <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio2.jpg" alt=""></a></div>
    <div class="item"><a href="<?php echo CController::createUrl('/sitio') ?>" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_inicio3.jpg" alt=""></a></div>
</div>

<!--
<select data-theme="a" data-native-menu="false">
    <optgroup label="Swedish Cars">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
    </optgroup>
    <optgroup label="German Cars">
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
    </optgroup>
</select> 

<div data-role="fieldcontain" data-theme="a">
    <select name="select-choice-8" data-theme="a" id="select-choice-8" data-native-menu="false">
        <optgroup label="USPS">
            <option value="standard">Standard: 7 day</option>
            <option value="rush">Rush: 3 days</option>
            <option value="express">Express: next day</option>
            <option value="overnight">Overnight</option>
        </optgroup>
        <optgroup label="FedEx">
            <option value="firstOvernight">First Overnight</option>
            <option value="expressSaver">Express Saver</option>
            <option value="ground">Ground</option>
        </optgroup>
    </select>
</div>
-->

<div class="ui-content c_cont_slc_ntg">
    <div class="ui-bar ui-bar-c ui-corner-all center ccont_index">
        <a href="<?php echo CController::createUrl('/sitio/entrega', array('tipo' => Yii::app()->params->entrega['tipo']['presencial'])) ?>" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-shadow c_btn_img">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_recoger.png" alt="Pasa por el pedido" onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_recoger_hover.png'" onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_recoger.png'" class="c_ndx_img">
        </a>
        <div class="ctxt_pedido bg_red">
            <h2>Quiero pasar por el pedido</h2>
            <!-- <p>Maecenas euismod, nunc vel laoreet posuere, eros dui tempor tortor, condimentum venenatis ex justo vitae dui.</p> -->
            <p><a href="#panel-info-presencial">Conocer más [+]</a></p>
        </div>
    </div>
    <!-- <div class="cdt_line_spc"><span></span></div> -->
    <!-- <div class="c_espacio"></div> -->
    <div class="space-1"></div>
    <div class="ui-bar ui-bar-c ui-corner-all center ccont_index">
        <a href="<?php echo CController::createUrl('/sitio/entrega', array('tipo' => Yii::app()->params->entrega['tipo']['domicilio'])) ?>" data-ajax="false" class="ui-btn ui-btn-inline ui-corner-all ui-shadow c_btn_img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio.png" alt="Domicilio" onmouseover="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio_hover.png'" onmouseout="this.src = '<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio.png'" class="c_ndx_img"></a>
        <div class="ctxt_pedido bg_yellow">
            <h2>Quiero que me lo entreguen a domicilio</h2>
            <!-- <p>Maecenas euismod, nunc vel laoreet posuere, eros dui tempor tortor, condimentum venenatis ex justo vitae dui.</p> -->
            <p><a href="#panel-info-domicilio">Conocer más [+]</a></p>
        </div>
    </div>
</div>

<?php $this->extraContentList[] = $this->renderPartial('_entregaDomicilio', null, true); ?>
<?php $this->extraContentList[] = $this->renderPartial('_entregaPresencial', null, true); ?>