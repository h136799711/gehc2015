<?php

require_once("./config.php");
require_once("./classes/ComposeImg.class.php");
require_once("./classes/WXLib.class.php");
//路径配置
$savepath = __ROOT_PATH__."/img/compose/";
$imgpath = __ROOT_PATH__."/img/text/";
$fontpath =  __ROOT_PATH__."/fonts/SIMLI.TTF";

$wxlib = new WXLib(APPID,APPSECRET,__SERVER_PATH__.'/json/');
$filepath = __ROOT_PATH__."/img/text/red/2/2.jpg";

$json = json_decode($wxlib->uploadImg($filepath));

if($json->media_id){
header('Content-type: image/jpeg'); 
	echo $wxlib->downloadImg($json->media_id);
}else{
	echo $json->errmsg;
}

