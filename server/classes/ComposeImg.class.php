<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

class ComposeImg{
	
	protected $savepath = "/img/compose/";
	protected $imgpath = "/img/text/";
	protected $fontpath =  "";
	function __construct($savepath,$imgpath,$fontpath){
		$this->savepath = $savepath;
		$this->imgpath = $imgpath;
		$this->fontpath = $fontpath;
	}
	private function mbStringToArray ($string) {
    	$strlen = mb_strlen($string);
    	while ($strlen) {
        	$array[] = mb_substr($string,0,1,"utf8");
        	$string = mb_substr($string,1,$strlen,"utf8");
        	$strlen = mb_strlen($string);
    	}
    	return $array;
	}
	/**
	 * @text 文字
	 * @imgname 要合并的图片路径 相对与$imgpath
	 * @color 文字颜色，图片颜色array r=>,g=>,b=>
	 * @posArr 文字写入的位置 size,angel,x,y数组元素
	 */
	public function process($text,$imgname,$color,$posArr){
//		var_dump($text);
		if(strlen($text) === 0){
			return false;
		}		
		if(file_exists($this->imgpath.$imgname)){				
			$im = imagecreatefromjpeg($this->imgpath.$imgname);
			$imgcolor = imagecolorallocate($im, $color['r'], $color['g'], $color['b']);
			if(isset($posArr[0]['txtcolor'])){
				$txtcolor = explode(",",$posArr[0]['txtcolor']);
				$imgcolor = imagecolorallocate($im, $txtcolor[0], $txtcolor[1], $txtcolor[2]);
			}
			$text = $this->mbStringToArray($text);
			for($i=0;$i<count($text) && $i < count($posArr);$i++){
					
				imagettftext($im, $posArr[$i]['size'], $posArr[$i]['angle'], $posArr[$i]['x'], $posArr[$i]['y'], $imgcolor, $this->fontpath , $text[$i]);
			}
			
			$folder = date('Ymd',time());
			if(!is_dir($this->savepath.$folder.'/')){
				mkdir($this->savepath.$folder.'/');
			}
			
			
			$filename = md5(time().rand(0, 99999999));
			//PNG
//			$savefilename = $this->savepath.$folder.'/'.$filename.".png";
//			imagepng($im,$savefilename);
			
			//jpg
			$savefilename = $this->savepath.$folder.'/'.$filename.".jpg";
			imagejpeg($im,$savefilename);
			imagedestroy($im);
			
			return str_replace(__ROOT_PATH__.'/', "",$savefilename);
		
		}else{
			return false;
		}
	}
	
}
