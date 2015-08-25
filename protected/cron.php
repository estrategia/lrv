<?php
defined('YII_DEBUG') or define('YII_DEBUG',true);
 
// including Yii
$yii=dirname(__FILE__).'/../../yii-1.1.16.bca042/framework/yii.php';
$config=dirname(__FILE__).'/config/console.php';

require_once($yii);
 
// creating and running console application
Yii::createConsoleApplication($config)->run();