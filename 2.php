<?php

//二分查找（数组里查找某个元素）
function bin_sch($array, $low, $high, $k){
	if ($low <= $high){
		$mid = intval(($low+$high)/2);
		if ($array[$mid] == $k){
			return $mid;
		}elseif ($k < $array[$mid]){
			return bin_sch($array, $low, $mid-1, $k);
		}else{
			return bin_sch($array, $mid+1, $high, $k);
		}
	}
	return -1;
}
//
// 顺序查找
// （数组里查找某个元素）
function seq_sch($array, $n, $k){
	$array[$n] = $k;
	for($i=0; $i<$n; $i++){
	if($array[$i]==$k){
		break;
	}
	}
	if ($i<$n){
	return $i;
	}else{
	return -1;
	}
}
//
// 线性表的删除
// （数组中实现）
function delete_array_element($array, $i)
{
$len = count($array);
for ($j=$i; $j<$len; $j++){
$array[$j] = $array[$j+1];
}
array_pop($array);
return $array;
}

$array = [3,6,4,1,9];
$arr = bubble_sort($array);
print_r($arr);die;
// //冒泡排序（数组排序）
function bubble_sort($array)
{
	$count = count($array);
	if ($count <= 0) return false;
	for($i=0; $i<$count; $i++){
		for($j=$count-1; $j>$i; $j--){
			if ($array[$j] < $array[$j-1]){
				$tmp = $array[$j];
				$array[$j] = $array[$j-1];
				$array[$j-1] = $tmp;
			}
		}
	}
	return $array;
}

//
// 快速排序
// （数组排序）
function quicksort($array) {
if (count($array) <= 1) return $array;
$key = $array[0];
$left_arr = array();
$right_arr = array();
for ($i=1; $i<count($array); $i++){
if ($array[$i] <= $key)
$left_arr[] = $array[$i];
else
$right_arr[] = $array[$i];
}
$left_arr = quicksort($left_arr);
$right_arr = quicksort($right_arr);
return array_merge($left_arr, array($key), $right_arr);
}
//------------------------
// PHP内置字符串函数实现
//------------------------
//字符串长度
function strlen($str)
{
if ($str == '') return 0;
$count = 0;
while (1){
if ($str[$count] != NULL){
$count++;
continue;
}else{
break;
}
}
return $count;
}
//截取子串
function substr($str, $start, $length=NULL)
{
if ($str=='' || $start>strlen($str)) return;
if (($length!=NULL) && ($start>0) && ($length>strlen($str)-$start)) return;
if (($length!=NULL) && ($start<0) && ($length>strlen($str)+$start)) return;
if ($length == NULL) $length = (strlen($str) - $start);
if ($start < 0){
for ($i=(strlen($str)+$start); $i<(strlen($str)+$start+$length); $i++) {
$substr .= $str[$i];
}
}
if ($length > 0){
for ($i=$start; $i<($start+$length); $i++) {
$substr .= $str[$i];
}
}
if ($length < 0){
for ($i=$start; $i<(strlen($str)+$length); $i++) {
$substr .= $str[$i];
}
}
return $substr;
}
//字符串翻转
function strrev($str)
{
if ($str == '') return 0;
for ($i=(strlen($str)-1); $i>=0; $i--){
$rev_str .= $str[$i];
}
return $rev_str;
}
//字符串比较
function strcmp($s1, $s2)
{
if (strlen($s1) < strlen($s2)) return -1;
if (strlen($s1) > strlen($s2)) return 1;
for ($i=0; $i<strlen($s1); $i++){
if ($s1[$i] == $s2[$i]){
continue;
}else{
return false;
}
}
return 0;
}
//查找字符串
function strstr($str, $substr)
{
$m = strlen($str);
$n = strlen($substr);
if ($m < $n) return false;
for ($i=0; $i<=($m-$n+1); $i++){
$sub = substr($str, $i, $n);
if (strcmp($sub, $substr) == 0) return $i;
}
return false;
}
//字符串替换
function str_replace($substr, $newsubstr, $str)
{
$m = strlen($str);
$n = strlen($substr);
$x = strlen($newsubstr);
if (strchr($str, $substr) == false) return false;
for ($i=0; $i<=($m-$n+1); $i++){
$i = strchr($str, $substr);
$str = str_delete($str, $i, $n);
$str = str_insert($str, $i, $newstr);
}
return $str;
	}