<?php
defined('YII_DEBUG') or define('YII_DEBUG',true);
//defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// including Yii
$yii=dirname(__FILE__).'/../../yii-1.1.16.bca042/framework/yii.php';
$config=dirname(__FILE__).'/config/console.php';
$utils = dirname(__FILE__).'/helpers/utils.php';

require_once($yii);
require_once($utils);
 
// creating and running console application
Yii::createConsoleApplication($config)->run();