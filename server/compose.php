<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

require_once("config.php");

require_once("classes/ComposeImg.class.php");
$positions = require_once ("./textpos.data.php");
$colors = require_once ("./color.data.php");

//路径配置
$savepath = __ROOT_PATH__."/img/compose/";
$imgpath = __ROOT_PATH__."/img/text/";
$fontpath =  __ROOT_PATH__."/fonts/SIMLI.ttf";

//$_POST['imgid'] = 2;
//$_POST['txt'] = "福如";
//$_POST['imgname'] = "2/1.jpg";

// POST 参数如下
// imgid 图片id 
// txt 文字
// imgname 图片路径 相对
// color 颜色 代码 

if (isset($_POST['imgid']) && isset($_POST['txt']) && isset($_POST['imgname'])) {
	$id = $_POST['imgid'];
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
	
	$filename = $compImg->process($text,$imgname,$colors[$color],$posArr);	
	
	//TODO: 将文字写入到图片中，并保存到指定文件夹内	
	$result = array('result' => 0, 'info' => SITE_URL.$filename);
	
} else {
	$result = array('result' => -1, 'info' => '缺少参数！');
}

echo json_encode($result);
