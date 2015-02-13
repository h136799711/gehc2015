<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

require_once ("server/config.php");

$textpath = "./img/text/";
// $texts[1] 1个字的图片地址相对
// img/text路径来说
$texts = require_once("server/texts.data.php");

$len = $_GET['len'];
$imgs = null;
if(is_numeric($len) && $len > 0 && $len <= count($texts)){
	
	$imgs = $texts[$len-1];
	
}else{
	echo "Error Parameter!";
	exit();
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
		<meta http-equiv="Expires" content="-1">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="format-detection" content="telephone=no" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>
			GE医疗中国-恭贺大家新春快乐
		</title>
		<script type="text/javascript">
		var _phoneWidth = parseInt(window.screen.width);
		var _phoneScale = _phoneWidth / 640;
		var ua = navigator.userAgent;
		if (/Android (\d+\.\d+)/.test(ua)) {
		var _version = parseFloat(RegExp.$1);
			if (_version > 2.3) {
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi, initial-scale=' + _phoneScale + ', minimum-scale=' + _phoneScale + ', maximum-scale=' + _phoneScale + ', user-scalable=no">');
			} else {
				document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
			}
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi;">');
		}
		</script>
		<link rel="stylesheet" type="text/css" href="css/normalize/3.0.2/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/animate/animate.min.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css?v=<?php echo time(); ?>" />
		<script src="js/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script src="./server/wxconfig.php"></script>
		<script src="./js/index.js?v=<?php echo time(); ?>"></script>
		<style type="text/css">
			body{
				background: url(img/bg/choose.png) no-repeat center center #cf0f1a; 
			}
			hr{
				width: 80%;
				border: 0px;
				border-bottom: 1px solid #ffffff;
				margin: 30px auto;
			}
			.choose{
				width: 100%;
				height: 100%;
			}
			.panel{
				width: 80%;
				text-align: center;
				margin: 0 auto;
				height: 40%;
				padding-top: 15%;
			}
			
			.panel img{
				width:80%;
			}
			.choose .thumbnail{
				width: 80%;
				margin: 0 auto;
			}
						
			.choose .thumbnail .thumbnail-item{
				width: 190px;
				height: 180px;
				float: left;
				margin-right: 10px;
				width: 40%;
				height: 180px;
				float: left;
				margin-left: 5%;
				margin-right: 5%;
				position: relative;
			}
			.choose .btns{
				background: #ffffff;
				color: #FF0000;
				bottom: 0px;
				height: 20%;
				margin: 0 auto;
			}
			.cancel{
				display: inline-block;
				background: url(img/btns/back.png) no-repeat center center;
				width: 48px;
				height: 48px;
			}
			.ok{
				display: inline-block;
				background: url(img/btns/c.png) no-repeat center center;
				width: 48px;
				height: 48px;
			}
			.choose .btns .btn{
				display: block;
				width: auto;
				height: auto;
				padding: 10px;
				font-size: 1.6em;
				color: #FF0000;
				font-weight: bold;
				text-decoration: none;
				height: 48px;
				line-height: 48px;
				vertical-align: middle;
			}
	
			.choose .btns .btn span{
				display: inline-block;
				height: 48px;
				vertical-align: middle;
				float: right;
				font-size: 48px;
				margin-left: 10px;
				margin-right: 10px;
			}
			.img-responsive{
				width: 100%;
				height: 100%;
			}
			.thumbnail-item.active:after{
				content: " ";
				background: center center url(img/btns/c.png);
				width: 20px;
				height: 20px;
				position: absolute;
				right: 5px;
				bottom: 5px;
				background-size: contain;
			}
			
			/*input*/
			.input .panel{
				height: 70%;
				padding-top: 0%;
			}
			.input .panel img{
				height: 70%;
				margin-top: 20%;
			}
			.input .btns{
				height: 30%;
				background: #ffffff;
				bottom: 0px;
				position: relative;
			}
			.input .btns .input-ctrl{
				width: 60%;
				border-bottom: 1px solid #A18A8A;
				text-align: center;
				margin-left: 20%;
				position: relative;
				padding-top: 10%;
			}
			.input-ctrl:after{
				background: #000000;
				width: 1px;
				height: 16px;
				position: absolute;
				right: 0px;
				bottom: 0px;
				display: block;
				content: " ";	
			}
			
			.input-ctrl:before{
				background: #000000;
				width: 1px;
				height: 16px;
				position: absolute;
				left: 0px;
				bottom: 0px;
				display: block;
				content: " ";	
			}
			.input .btns .input-ctrl input:focus,
			.input .btns .input-ctrl input:active{
				outline: none;
			}
			.input .btns .input-ctrl input{
				padding: 1em;
				border: 0px;
				width: 100%;
				font-size: 1.6em;
				/*border-bottom: 1px solid #A18A8A;*/
			}
			.input .btns .input-ctrl .help-block{
				color: #A18A8A;
				font-size: 1.4em;
				position: absolute;
				right: 10%;
				bottom: 1em;
			}
			.input .btns .btn{
				display: block;
				width: auto;
				height: auto;
				padding: 10px;
				font-size: 1.6em;
				color: #FF0000;
				font-weight: bold;
				text-decoration: none;
				height: 48px;
				line-height: 48px;
				vertical-align: middle;
			}
	
			.input .btns .btn span{
				display: inline-block;
				height: 48px;
				font-size: 48px;
				vertical-align: middle;
				float: right;
				margin-left: 10px;
				margin-right: 10px;
			}
			.mask{
				display: none;
				width: 100%;
				height: 100%;
				position: absolute;
				z-index: 1999;
				background: rgba(0,0,0,0.5);
			}
			.mask img{
				width: 100px;
				display: block;
				margin: 0 auto;
				margin-top: 50%;
			}
			.result{
				text-align: center;
				line-height: 300px;
				vertical-align: middle;
				font-size: 3em;
				display: none; 
				color: #FFF2F2;
				width: 100%;
				height: 100%;
				position: absolute;
				z-index: 1999;
				background: rgba(3, 3, 3, 0.72);
			}
			/*last*/
			.last .panel{
				height: 70%;
				padding-top: 0%;
			}
			.last .panel img{
				height: 70%;
				margin-top: 20%;
			}
			.last .btns{
				height: 30%;
				background: #ffffff;
				bottom: 0px;
				position: relative;
			}
			.last .btns .btn{
				display: block;
				width: auto;
				height: auto;
				padding: 10px;
				font-size: 1.6em;
				color: #FF0000;
				font-weight: bold;
				text-decoration: none;
				height: 48px;
				line-height: 48px;
				vertical-align: middle;
			}
			.last .btns .btn span{
				display: inline-block;
				height: 48px;
				font-size: 48px;
				vertical-align: middle;
				float: right;
				margin-left: 10px;
				margin-right: 10px;
			}
			.last .btns .btns-ctrl{
				height: 70%;
			}
			.last .btns .btns-nav{
				text-align: center;
				padding: 15px 0px;
			}
			.last .btns .btns-nav div{
				width: 25%;
				float: left;
				
			}
			.last .btns .btns-nav a,
			.last .btns .btns-subnav a	{
				float: none;
				width: 3.2em;
				font-size: 1.6em;
				text-decoration: none;
				color: #000000;
				height: auto;
				margin: 0 auto;
			}
			.last hr{
				width:100%;
				margin: 0 auto;
				border:1px solid #a4a4a4;
			}
			.last .btns .btns-subnav a.color-item{
				width: 60px;
				height: 60px;
				float: left;
				margin: 15px;
				border-radius: 5px;
				background: #A4A4A4;
				position: relative;
			}
			.last .btns .btns-subnav a.red{
				background: #FF0000;margin-left: 60px;
			}
			.last .btns .btns-subnav a.blue{
				background: #0000FF;
			}
			.last .color-item.active:after{
				content: " ";
				background: center center url(img/btns/c.png);
				width: 20px;
				height: 20px;
				position: absolute;
				right: 5px;
				bottom: 5px;
				background-size: contain;
			}
		</style>
		<script type="text/javascript">
			$(function(){
				$(".choose,.input,.last").height($(window).height());
				$(".thumbnail-item img").click(function(){
					$(".thumbnail-item").removeClass("active");
					$(this).parent().addClass("active");
					$(".imgorigin").attr("src",$(this).attr("src"));
					$("#textimg").val($(this).attr("data-id"));
					$("#imgname").val($(this).attr("data-path"));
				});
				//选择颜色
				$(".color-item").click(function(){
					$(".color-item").removeClass("active");
					$(this).addClass("active");
					$("#color").val($(this).attr("data-color"));
				});
				$("#text").keyup(function(){
					var leftchar = <?php echo $len; ?> - $("#text").val().length;
					if(leftchar < 0){
						leftchar = 0;
					}
					$(".leftchar").text(leftchar);
					
				}).keydown(function(){
					var leftchar = <?php echo $len; ?> - $("#text").val().length;
					if(leftchar < 0){
						leftchar = 0;
					}
					$(".leftchar").text(leftchar);
				});
			});
			function showinput(){
				
				$(".input").show();
				$(".choose").hide();
				$(".last").hide();
			}
			function showchoose(){
				$(".input").hide();
				$(".choose").show();
				$(".last").hide();
			}
			function showlast(){
				$(".input").hide();
				$(".choose").hide();
				$(".last").show();
				
			}
			function compose(){
				var textimgid = $("#textimg").val();
				var txt = $("#text").val();
				var imgname = $("#imgname").val();
				var color = $("#color").val();
				$.ajax({
					type:"POST",
					url:"./server/compose.php",
					data:{imgid:textimgid,txt:txt,imgname:imgname,color:color},
					dataType:"json",	
					beforeSend:function(){
						$(".mask").show();
					}
					}).done(function(data){
						console.log(data);
						if(data && data.result == 0){
							showlast();
							$(".imgresult").attr("src",data.info);
						}else{
							$(".result").text(data.info).fadeIn(500);
							setTimeout(function(){$(".result").fadeOut(500).text('操作失败，请重试！');},3000)
						}
				}).always(function(){
					$(".mask").hide();
				}).fail(function(){
					$(".result").fadeIn(500).delay(3000).fadeOut(500);
					
				});
			}
		</script>
	</head>
	<body>
		<input id="color" type="hidden" name="imgname" value="red" />
		<input id="imgname" type="hidden" name="imgname" value="<?php echo $imgs[0]['path']; ?>" />
		<input id="textimg" type="hidden" name="textimg" value="<?php echo $imgs[0]['id']; ?>" />
		<div class="choose" style="display: none;">
			<div class="panel">
				<img class="imgorigin img-responsive" src="<?php echo $textpath.$imgs[0]['path']; ?>"/>
			</div>
			<hr style="" />
			<div class="thumbnail clearfix">		
				<div class="thumbnail-item active">		
				<img class="img-responsive" data-path="<?php echo $imgs[0]['path']; ?>" data-id="<?php echo $imgs[0]['id']; ?>" src="<?php echo $textpath.$imgs[0]['path']; ?>"/>
				</div>
				<div class="thumbnail-item">
				<img class="img-responsive" data-path="<?php echo $imgs[1]['path']; ?>"  data-id="<?php echo $imgs[1]['id']; ?>" src="<?php echo $textpath.$imgs[1]['path']; ?>"/>
				</div>
			</div>
			<div class="btns">
				<div class="clearfix" style="width: 380px;margin: 0 auto;margin-top: 10%;">
					<a class="btn" href="./index.php"><i class="cancel"></i><span>返回</span></a>
					<a class="btn" href="javascript:showinput();"><i class="ok"></i><span>确认</span></a>
				</div>
			</div>
		</div>
		<div class="input" style="display: none;">		
			<div class="result" >合成失败！</div>	
			<div class="mask" ><img src="img/ajax-loading.gif" alt="合成中" /></div>	
			<div class="panel">
				<img  class="imgorigin img-responsive" src="<?php echo $textpath.$imgs[0]['path']; ?>"/>
			</div>
			<div class="btns">
				<div class="input-ctrl">
					
					<input autofocus="autofocus" id="text" name="text" maxlength="<?php echo $len;?>" />
					<span class="help-block">剩余字数 <span class="leftchar"><?php echo $len;?></span></span>
				</div>
				<div class="clearfix" style="width: 380px;margin: 0 auto;margin-top: 10%;">
					<a class="btn" href="javascript:showchoose();"><i class="cancel"></i><span>返回</span></a>
					<a class="btn" href="javascript:compose();"><i class="ok"></i><span>确认</span></a>
				</div>
			</div>
		</div>
		
		<div class="last" >
			<div class="panel">
				<img class="imgresult img-responsive" src="img/320X400.gif" />
			</div>
			<div class="btns">
				<div class="btns-ctrl">
					<div class="btns-nav clearfix">
						<div>
						<a href="#color"><img src="img/btns/color.png" />颜色</a>
						</div>
						<div>
						<a href="#"><img src="img/btns/send.png" />发送</a></div>
						<div><a href="#"><img src="img/btns/fav.png" />收藏</a></div>
						<div><a href="#"><img src="img/btns/share.png" />分享</a></div>
					</div>
					<hr />
					<div class="btns-subnav clearfix">
						<div id="color" class="colorplatte clearfix">
							<a href="#" class="color-item red active" data-color="red"></a>
							<a href="#" class="color-item blue" data-color="blue"></a>
							<a href="#" class="color-item gray" data-color="gray"></a>							
							<a href="#" class="color-item gray" data-color="gray"></a>
							<a href="#" class="color-item gray" data-color="gray"></a>
							<a href="#" class="color-item gray" data-color="gray"></a>
						</div>
					</div>
				</div>
				<div class="clearfix" style="width: 380px;margin: 0 auto;">
					<a class="btn" href="javascript:showinput();"><i class="cancel"></i><span>返回</span></a>
					<a class="btn" href="javascript:compose();"><i class="ok"></i><span>确认</span></a>
				</div>
			</div>
		</div>
		
			//微信分享内容
		<input type="hidden" id="wxshareTitle" value="分享标题" />
		<input type="hidden" id="wxshareLink" value="http://www.baidu.com" />
		<input type="hidden" id="wxshareImgUrl" value="<?php echo SITE_URL; ?>img/wxshare.png" />
		<input type="hidden" id="wxshareDesc" value="分享描述" />
	</body>
	</html>