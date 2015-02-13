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
		<script src="js/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script src="./server/wxconfig.php"></script>
		<script src="./js/index.js?v=<?php echo time(); ?>"></script>
		<style type="text/css">.home {
	background-image: url(img/bg/index_0.jpg);
}
.clound {
	background-image: url(img/clound.png);
}
.btns a {
	background: url(img/btns.png);
}</style>
	</head>
	<body>
		<div>
			<span class="audio">
				<audio autoplay="autoplay" loop="loop" src="bg-jymt.mp3"></audio>
			</span>
		</div>
		<div class="section home" >
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
			</div>
		</div>
		
		<!-- 微信分享内容-->
		<input type="hidden" id="wxshareTitle" value="分享标题" />
		<input type="hidden" id="wxshareLink" value="<?php echo SITE_URL; ?>" />
		<input type="hidden" id="wxshareImgUrl" value="<?php echo SITE_URL; ?>img/wxshare.png" />
		<input type="hidden" id="wxshareDesc" value="分享描述" />
	</body>
</html>