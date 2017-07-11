<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 文件测试打印函数
 * @param array $array 打印的数组
 */


function P($array){
    	echo "<pre>";
    	print_r($array);
}
 /**
 * 获取IP地址
 */   
function getip(){
	return $_SERVER['REMOTE_ADDR'];
}

/**
	* getSelectWidget 模版框架-获取SELECT控价
	* @author lishuang
	* @version C1.0
	* 获取SELECT控价
*/  
 function getSelectWidget($name,$optionName,$optionValue,$data,$selected=""){

	$str="<select name='$name' id='$name'>";
	$str.="<option value='' selected>选择</option>";
	foreach($data as $v){
		if($selected==$v[$optionValue]){
			$selectedStr="selected";
		}else{
			$selectedStr="";
		}
		$str.="<option value='".$v[$optionValue]."' ".$selectedStr.">".$v[$optionName]."</option>";	
		
	}
	$str.="</select>";
	return $str;

}	
 /**
 * 字符串截取
 */   
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    if(function_exists("mb_substr")){
            if ($suffix && strlen($str)>$length)
                return mb_substr($str, $start, $length, $charset);
        else
                 return mb_substr($str, $start, $length, $charset);
    }
    elseif(function_exists('iconv_substr')) {
            if ($suffix && strlen($str)>$length)
                return iconv_substr($str,$start,$length,$charset);
        else
                return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}
 /**
 * 获取URL
 */   
function getREURL(){
	 $URL="http://".$_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; 
	 return $URL;
}



/**************************************************************
 *
*    使用特定function对数组中所有元素做处理
*    @param  string  &$array     要处理的字符串
*    @param  string  $function   要执行的函数
*    @return boolean $apply_to_keys_also     是否也应用到key上
*    @access public
*
*************************************************************/
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
	static $recursive_counter = 0;
	if (++$recursive_counter > 1000) {
		die('possible deep recursion attack');
	}
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			arrayRecursive($array[$key], $function, $apply_to_keys_also);
		} else {
			$array[$key] = $function($value);
		}

		if ($apply_to_keys_also && is_string($key)) {
			$new_key = $function($key);
			if ($new_key != $key) {
				$array[$new_key] = $array[$key];
				unset($array[$key]);
			}
		}
	}
	$recursive_counter--;
}

/**************************************************************
 *
*    将数组转换为JSON字符串（兼容中文）
*    @param  array   $array      要转换的数组
*    @return string      转换得到的json字符串
*    @access public
*
*************************************************************/
function JSON($array) {
	arrayRecursive($array, 'urlencode', true);
	$json = json_encode($array);
	return urldecode($json);
}


/**
 * 获取计算的毫秒数，因为php不支持毫秒级别的信息所以方法重写
 * @return number
 */
function getMillisecond() {
	list($t1, $t2) = explode(' ', microtime());
	return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}


/**
 * 简单对称加密算法之解密
 * @param String $string 需要解密的字串
 * @param String $skey 解密KEY
 * @return String
 */
function decode($string = '', $skey = 'cxphp') {
	$skey = str_split(base64_encode($skey));
	$strArr = str_split(str_replace('O0O0O', '=', $string), 2);
	$strCount = count($strArr);
	foreach ($skey as $key => $value) {
		$key < $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
	}
	return base64_decode(join('', $strArr));
}

/**
 * 简单对称加密算法之加密
 * @param String $string 需要加密的字串
 * @param String $skey 加密EKY
 * @return String
 */
function encode($string = '', $skey = 'cxphp') {
	$skey = str_split(base64_encode($skey));
	$strArr = str_split(base64_encode($string));
	$strCount = count($strArr);
	foreach ($skey as $key => $value) {
		$key < $strCount && $strArr[$key].=$value;
	}
	return str_replace('=', 'O0O0O', join('', $strArr));
}

/**
 * 设置登录的放到cookie中，如果勾选了着保存2个星期，没有保存设置为0 
 * @param  $user 用户集合
 * @param  $checkflag 是否勾选了
 */
function checkPassword($user,$checkflag){
	
	setrawcookie("test","test1");
	
	setrawcookie("user",$user,time()+3600);
	//echo print_r($user);
	
}
/**
 * 获取保存的cookie的信息，如果要是修改session
 * @return 用户集合
 */
function getCookie(){
	$user  =  $_COOKIE["cookie"];
	return $user;
}

function  dropCookie(){
	
	setcookie("user","1");
}

/**
*  @desc 根据两点间的经纬度计算距离
*  @param float $lat 纬度值
*  @param float $lng 经度值
*/
 function getDistance($lat1, $lng1, $lat2, $lng2)
 {
     $earthRadius = 6367000;
 

 
     $lat1 = ($lat1 * pi() ) / 180;
     $lng1 = ($lng1 * pi() ) / 180;
 
     $lat2 = ($lat2 * pi() ) / 180;
     $lng2 = ($lng2 * pi() ) / 180;

 
     $calcLongitude = $lng2 - $lng1;
     $calcLatitude = $lat2 - $lat1;
     $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
     $calculatedDistance = $earthRadius * $stepTwo;
 
     return round($calculatedDistance);
 }