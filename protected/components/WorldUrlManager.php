<?php

class WorldUrlManager
{
	static function initRules()
	{
		
		$sitios = ModulosConfigurados::model()->findAll("urlAmigable IS NOT NULL AND urlAmigable != ''");
		
		foreach($sitios as $sitio){
			
			Yii::app()->getUrlManager()->addRules([$sitio->urlAmigable => 'contenido/ver/tipo/grupo/contenido/'.$sitio->idModulo]);
		}
		return true;
	}
}