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
		
		<script type="text/javascript">
		 	var url = "./server/wxconfig.php?url="+location.href.split('#')[0];		 
			document.write('<script src="'+url+'"><\/script>');
		</script>
		
		<style type="text/css">
			body{
				background: url(img/bg/choose.png) no-repeat center center #cf0f1a; 
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
			.share,.log{
				display: none;
				width: 100%;
				height: 100%;
				position: absolute;
				top: 0px;
				left: 0px;
				z-index: 199999;
				background: rgba(0,0,0,0.5);
			}
			.hide{
				display: none;
			}
			.log span{
				display: block;
				position: absolute;
				left: 50%;
				margin-left: -160px;
				top: 40%;
			}
		</style>
		<script type="text/javascript">
			$(function(){
				
				$(".choose,.input,.last,.share").height($(window).height());
				$(".log").click(function(){
					$(".log").hide();
				})
				$("div.share").click(function(){
					$("div.share").hide();
				});
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
				var txtlen = <?php echo $len;?>;
				if(txt.length != txtlen){
						var left = txtlen - txt.length;
						$(".log").fadeIn(100).text("还差"+left.toString()+"个字未填").delay(3000).fadeOut(100);
						return ;
				}
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
							$(".imgresult").attr("src",data.info.imgsrc);
							$("#composeimg_media_id").val(data.info.media_id);
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
			function showshare(){
				$("div.share").show();
			}
			/*保存图片到手机*/
			function save2phone(){
				
				if(window.isWxReady){
					
					var serverid = $("#composeimg_media_id").val();
					if(!serverid){ 
						//
						
						
						$(".log").show(100).delay(3000).hide(100);
						return ;
					}
					wx.downloadImage({
					    serverId: serverid, // 需要下载的图片的服务器端ID，由uploadImage接口获得
					    isShowProgressTips: 1, // 默认为1，显示进度提示
					    success: function (res) {
					        var localId = res.localId; // 返回图片下载后的本地ID
					    }
					});
				}else{
					//不在微信中
					
				}
			}
			function showColorPlatter(){
				$(".colorplatter").toggleClass("hide");
			}
		</script>
		
	</head>
	<body>
		<div class="share"><img src="img/share.png"  width="100%" height="100%" alt="分享提示" /></div>
		<div class="log" ><span >请长按窗花图片！</span></div>		
		<div class="mask" ><img src="img/ajax-loading.gif" alt="合成中" /></div>	
		
		
		<div class="audio">
				<audio autoplay="autoplay" loop="loop" src="./audio/bg-jymt.mp3"></audio>
		</div>
		<input id="composeimg_media_id" type="hidden" value="" />
		<input id="color" type="hidden" name="imgname" value="red" />
		<input id="imgname" type="hidden" name="imgname" value="<?php echo $imgs[0]['path']; ?>" />
		<input id="textimg" type="hidden" name="textimg" value="<?php echo $imgs[0]['id']; ?>" />
		
				
		<div class="choose">
			<div style="height: 80%;">
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
			</div>
			<div class="btns">
				<div class="clearfix" style="width: 380px;margin: 0 auto;position: absolute;bottom: 20px;left: 50%;margin-left: -190px;">
					<a class="btn" href="./index.php"><i class="cancel"></i><span>返回</span></a>
					<a class="btn" href="javascript:showinput();"><i class="ok"></i><span>确认</span></a>
				</div>
			</div>
		</div>
		<div class="input" style="display: none;">		
			<div class="result" >合成失败！</div>	
			<div class="panel">
				<img  class="imgorigin img-responsive" src="<?php echo $textpath.$imgs[0]['path']; ?>"/>
			</div>
			<div class="btns">
				<div class="input-ctrl">
					
					<input autofocus="autofocus" id="text" name="text" maxlength="<?php echo $len;?>" />
					<span class="help-block">剩余字数 <span class="leftchar"><?php echo $len;?></span></span>
				</div>
				<div class="clearfix" style="width: 380px;margin: 0 auto;position: absolute;bottom: 20px;left: 50%;margin-left: -190px;">
					<a class="btn" href="javascript:showchoose();"><i class="cancel"></i><span>返回</span></a>
					<a class="btn" href="javascript:compose();"><i class="ok"></i><span>确认</span></a>
				</div>
			</div>
		</div>
		
		<div class="last"  style="display: none;">
			<div class="panel">
				<img class="imgresult img-responsive" src="img/nopic.jpg" />
			</div>
			<div class="btns">
				<div class="btns-ctrl">
					<div class="btns-nav clearfix">
						<div>
						<a href="javascript:showColorPlatter();"><img src="img/btns/color.png" />颜色</a>
						</div>
						<!--<div>
						<a href="javascript:showshare();"><img src="img/btns/send.png" />发送</a></div>-->
						<div><a href="javascript:save2phone();"><img src="img/btns/fav.png" />收藏</a></div>
						<div><a href="javascript:showshare();"><img src="img/btns/share.png" />分享</a></div>
					</div>
					<hr />
					<div class="btns-subnav clearfix">
						<div class="colorplatter clearfix hide">
							<a href="javascript:compose();" class="color-item red active" data-color="red"></a>
							<a href="javascript:compose();" class="color-item blue" data-color="blue"></a>
							<a href="javascript:compose();" class="color-item gray" data-color="gray"></a>							
							<a href="javascript:compose();" class="color-item gray" data-color="gray"></a>
							<a href="javascript:compose();" class="color-item gray" data-color="gray"></a>
							<a href="javascript:compose();" class="color-item gray" data-color="gray"></a>
						</div>
					</div>
				</div>
				<div class="clearfix" style="width: 190px;margin: 0 auto;margin-top: 10px;">
					<a class="btn" href="javascript:showinput();"><i class="cancel"></i><span>返回</span></a>
					<!--<a class="btn" href="javascript:compose();"><i class="ok"></i><span>确认</span></a>-->
				</div>
			</div>
		</div>
		
			<!-- 微信分享内容-->
		<input type="hidden" id="wxshareTitle" value="GE恭贺大家新春快乐" />
		<input type="hidden" id="wxshareLink" value="<?php echo SITE_URL; ?>" />
		<input type="hidden" id="wxshareImgUrl" value="<?php echo SITE_URL; ?>img/wxshare.png" />
		<input type="hidden" id="wxshareDesc" value="GE恭贺大家新春快乐" />
		
		
		<script src="./js/index.js?v=<?php echo time(); ?>"></script>
	</body>
	</html>