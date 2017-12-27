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

/*
 *	分级排序	
*/
function classfiy($arr = [],$pid){
	$clsfy = [];
	if($arr&&isset($pid)){

		foreach ($arr as $key => &$value) {
			# code...
			$tmp = [];
			if($value['Pid'] == $pid){
				$tmp = $value;
				unset($value);
				$son = classfiy($arr,$tmp['ID']);
				if($son)
					$tmp['son'] = $son;
				$clsfy[] = $tmp;
			}
		}
		// exit;
		return $clsfy;
	}
}