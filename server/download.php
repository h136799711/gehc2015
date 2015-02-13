<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

require_once("config.php");

$filename = __ROOT_PATH__."/img/bg/index_0.jpg";

header('Content-type: image/jpeg'); 
header("Content-Disposition: attachment; filename='$filename'"); 