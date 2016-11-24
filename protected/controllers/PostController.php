<?php
//controlador de prueba
class PostController extends Controller {
	public function actionRead($title="nada"){
		CVarDumper::dump($_GET,10,true);
		
		echo "<br>";
		
    	//prueba
		echo "test read<br>";
		 
		echo "TITLE: $title<br>";
    }
}
