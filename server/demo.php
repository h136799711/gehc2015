<?php

function mbStringToArray ($string) {
    $strlen = mb_strlen($string);
    while ($strlen) {
        $array[] = mb_substr($string,0,1,"utf8");
        $string = mb_substr($string,1,$strlen,"utf8");
        $strlen = mb_strlen($string);
    }
    return $array;
}
echo json_encode(mbStringToArray("恭贺12321"));
