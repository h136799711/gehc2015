<?php

require_once ("./server/config.php");

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
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
		</script>
		<link rel="stylesheet" type="text/css" href="css/normalize/3.0.2/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/animate/animate.min.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css?v=<?php echo time(); ?>" />
		<script src="./js/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.section').css({
					'height': 1008
				});
			});
		</script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		
		 <script type="text/javascript">
		 	var url = "./server/wxconfig.php?url="+location.href.split('#')[0];		 
			document.write('<script src="'+url+'"><\/script>');
		 </script>
		
		
		<style type="text/css">.home {
	background-image: url(img/bg/back.jpg);
}
.clound {
	background-image: url(img/clound.png);
}
.btns a {
	background: url(img/btns.png);
}
.sheep2015 {
	position: absolute;
background: url(img/2015.png) no-repeat center 0px;
display: block;
width: 100%;
height: 100%;
}
.text {
	position: absolute;
background: url(img/heci.png) no-repeat 56% 270px;
display: none;
width: 100%;
height: 100%;
}
.leftclound {
	position: absolute;
background: url(img/leftclound.png) no-repeat left 270px;
display: none;
width: 100%;
height: 100%;
	}
.rightclound {
	position: absolute;
	background: url(img/rightclound.png) no-repeat left top;
	display: none;
	right: 0px;
	top: 270px;
	overflow-y: hidden;
	width: 140px;
	height: 75px;
	/*width: 100%;
	height: 100%;*/
	}
	
.sheep2015 ,.text,.leftclound,.rightclound{
	/*width:640px;
	height: 1008px;*/
}
	.clound .clound-item{
		
	}
	
	@-webkit-keyframes fadeInRight {
  0% {
    -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
  }

  100% {
    -webkit-transform: none;
            transform: none;
  }
}

@keyframes fadeInRight {
  0% {
    -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
  }

  100% {
    -webkit-transform: none;
            transform: none;
  }
}
</style>
		<script type="text/javascript">
			$(function() {
				setTimeout(function(){ 
					$('.leftclound').show().addClass("fadeInLeft");		
					$('.rightclound').show().addClass("fadeInRight");
				$('.section').css({	'width': 640	});
				 },800)
				setTimeout(function(){ $('.text').show().addClass("zoomIn"); },1200)
				
				
			});
		</script>
	</head>
	<body>
		<div class="audio">
				<audio id="audio" autoplay="autoplay" loop="loop" src="./audio/bg-jymt.mp3"></audio>
		</div>
		<div class="section home"  >
			<div class="sheep2015 animated fadeInDown"></div>
			<div class="leftclound animated "></div>
			<div class="text animated "></div>
			<div class="rightclound animated "></div>
			
			<div class="btns">
				<div class="pull-left leftbtns">
					<a href="choose.php?len=1" class="one">
					</a>
					<a href="choose.php?len=3" class="three">
					</a>
					<a href="choose.php?len=5" class="five">
					</a>
				</div>
				<div class="pull-right rightbtns">
					<a href="choose.php?len=2" class="two">
					</a>
					<a href="choose.php?len=4" class="four">
					</a>
					<a href="choose.php?len=6" class="six">
					</a>
				</div>
			</div>
			<div class="clound animated infinite swing">
				<!--<div class="clound-row1">
				<div class="clound-item"></div>
				<div class="clound-item"></div>
				</div>
				<div class="clound-row2">
				<div class="clound-item"></div>
				<div class="clound-item"></div>
				<div class="clound-item"></div>
				</div>
				<div class="clound-row3">
				<div class="clound-item"></div>
				<div class="clound-item"></div>
				<div class="clound-item"></div>
				<div class="clound-item"></div>
				</div>
				-->
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
