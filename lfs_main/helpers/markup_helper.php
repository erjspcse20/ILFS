<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function arraySearchForCode($code, $array) {
    foreach ($array as $key => $val) {
    if ($val['aircode'] === $code) {
    return $key;
    }
    }
    return null;
}
function arraySearchfornoofseg($noofSegment, $array) {
    foreach ($array as $key => $val) {
    if ($val['noofsegment'] === $noofSegment) {
    return $key;
    }
    }
return 1;
}
?>