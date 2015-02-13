<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

class WXLib {

	
  private $appId;
  private $appSecret;
  private $jsonpath;

  function __construct($appId, $appSecret,$jsonpath) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
    $this->jsonpath = $jsonpath;
  }

	public function uploadImg($filepath) {
		$access_token = $this -> getAccessToken();
		$url = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=$access_token&type=image";
		$filedata = array("media" => "@" . $filepath);
		$result = $this->https_request($url, $filedata);
		
		return $result;
		//{"type":"TYPE","media_id":"MEDIA_ID","created_at":123456789}
	}
	public function downloadImg($mediaid){
		$access_token = $this -> getAccessToken();
		$url = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=$access_token&media_id=$mediaid";
		return $this->httpGet($url);
	}
	private function getAccessToken() {
		// access_token 应该全局存储与更新，以下代码以写入到文件中做示例
		$data = json_decode(file_get_contents($this -> jsonpath . "access_token.json"));
		if ($data -> expire_time < time()) {
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
			$res = json_decode($this -> httpGet($url));
			$access_token = $res -> access_token;
			if ($access_token) {
				$data -> expire_time = time() + 7000;
				$data -> access_token = $access_token;
				$fp = fopen($this -> jsonpath . "access_token.json", "w");
				fwrite($fp, json_encode($data));
				fclose($fp);
			}
		} else {
			$access_token = $data -> access_token;
		}
		return $access_token;
	}

	function https_request($url, $data = null) {
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)) {
			 curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		} 
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}

	private function httpGet($url) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 500);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_URL, $url);

		$res = curl_exec($curl);
		curl_close($curl);

		return $res;
	}

}
