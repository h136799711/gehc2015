<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
require_once("config.php");
require_once(__SERVER_PATH__.'/wxsdk/jssdk.php');
$appid = "wx58aea38c0796394d";
$appsecret = "3e1404c970566df55d7314ecfe9ff437";
$jssdk = new JSSDK($appid, $appsecret);
$signPackage = $jssdk->GetSignPackage();
$jsapilist = "['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo']";

$config = "wx.config({
			    debug: true, 
			    appId: '".$signPackage["appId"]."', 
			    timestamp: '".$signPackage["timestamp"]."', 
			    nonceStr: '".$signPackage["nonceStr"]."', 
			    signature: '".$signPackage["signature"]."',
			    jsApiList: ".$jsapilist."
			});";

echo $config;
