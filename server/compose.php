<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

require_once("config.php");

require_once("classes/ComposeImg.class.php");
require_once("classes/WXLib.class.php");
$positions = require_once ("./textpos.data.php");
$colors = require_once ("./color.data.php");

//路径配置
$savepath = __ROOT_PATH__."/img/compose/";
$imgpath = __ROOT_PATH__."/img/text/";
$fontpath =  __ROOT_PATH__."/fonts/SIMLI.TTF";
$dntUpload = true;
//$_POST['imgid'] = 4;
//$_POST['txt'] = "福如";
//$_POST['imgname'] = "2/2.jpg";
//$_POST['color'] = "red";
// POST 参数如下
// imgid 图片id 
// txt 文字
// imgname 图片路径 相对
// color 颜色 代码 

if (isset($_POST['imgid']) && isset($_POST['txt']) && isset($_POST['imgname'])) {
	$id = $_POST['imgid'];
	//文字
	$text = $_POST['txt'];
	$imgname = $_POST['imgname'];
	if(isset($_POST['color'])){
		$color = $_POST['color'];
	}else{
		$color = "red";
	}
	//字的位置数组
	$posArr = $positions["$id"];
	
	$compImg = new ComposeImg($savepath,$imgpath,$fontpath);
	
	$filename = $compImg->process($text,$color.'/'.$imgname,$colors[$color],$posArr);	
	if($dntUpload){
	$wxlib = new WXLib(APPID,APPSECRET,__SERVER_PATH__.'/json/');
	$json = json_decode($wxlib->uploadImg(__ROOT_PATH__.'/'.$filename));
	}
	if($filename === false || is_null($json)){
		$result = array('result' => -1, 'info' => '请重试！');
	}else{
			if($dntUpload){
				$result = array('result' => 0, 'info' => array('imgsrc'=>SITE_URL.$filename,'media_id'=>''));
			}else{
		if($json->media_id){
			
		$result = array('result' => 0, 'info' => array('imgsrc'=>SITE_URL.$filename,'media_id'=>$json->media_id)) ;
		}else{		
			$result = array('result' => -1, 'info' => $json->errmsg);
		}
			}
			
	}
	
} else {
	$result = array('result' => -1, 'info' => '缺少参数！');
}

echo json_encode($result);
