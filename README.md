img/compose 文件夹要有写入权限
server/access_token.json 要有写入权限
server/jsapi_ticket.json 要有写入权限

/server/config.php 为配置文件
//微信appid，appsecret
const APPID = "wx58aea38c0796394d";
const APPSECRET = "3e1404c970566df55d7314ecfe9ff437";
//网站地址
const SITE_URL = "http://localhost/github/gehc2015/";
其它说明：
请参照：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html#JSSDK.E4.BD.BF.E7.94.A8.E6.AD.A5.E9.AA.A4
1. 绑定域名
	先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
2. 