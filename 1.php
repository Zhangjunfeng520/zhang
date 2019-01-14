<?php
$arr = array(
	'a'=>1,
	'b'=>'fas',
	'c'=>'23',
	'd'=>44
);
// $list = array();
foreach ($arr as $key => $value) {
	$list[][$key] = $arr;
}
// foreach($arr as $key=>$v)
// {
// $a[$key][]=$v;
// }
print_r($list);
// array_chunk(input, size)
die;
// echo md5(123);die;
// enctype="multipart/form-data"

mysql_connect('127.0.0.1','root','root');
mysql_select_db("test");
if($_GET){
	$str = $_GET['str'];
	$a = $_GET['a'];
	for ($i=1; $i <= $a ; $i++) { 
		$sql = "insert into a value(null,$str)";
		mysql_query($sql);
	}
	$sql = "select * from a where id <= $a";
	$arr = mysql_query($sql);
	if($arr){
		while ($a = mysql_fetch_assoc($arr)) {
			$data[] = $a;
		}
		echo json_encode($data);die;
	}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<input type="text" id='a'><input type="button" value="来来来！！入库" class="add">
		<!-- <input type="checkbox" name='checkbox'> -->
		<input type="text" id='b' name='name'><input type="button" value="来来来！！复制" class="b">
		<input type="button" value="全选" class="All">
		<input type="button" value="全bu选" class="No">
		<div style="width:340px" class="div"></div>
	</table>
</body>
</html>
<script src="jquery-3.3.1.js"></script>
<script>
	//获取框里的值
	$('.add').click(function(){
		var str = '';
		$("input[name='name']").each(function(){
			str += $(this).val();
		})
		// console.log(str);return false;
		//数据入库
		var a = $('#a').val();
		$.ajax({
			url: '1.php',
			dataType: 'json',
			data: {a:a,str:str},
			success:function(res){
				$('.div').empty();
				$.each(res,function(i,v){
					var tr = $("<tr></tr>");
					tr.append("<td><input type='checkbox' name='checkbox'></td>")
					tr.append("<td>"+v.a+"</td>");$('div').append(tr);
				})
			}
		})
	})
	//克隆
	var i = 0;
	$(document).on('click','.b',function(){
		var c = $('#b').clone();
		if(i<4){
			i++;
			$("#b").after(c);
		}
	})
	//全选
	$(document).on('click','.All',function(){
		$("input[type='checkbox']").prop('checked',true);
	})
	//全不选
	$(document).on('click','.No',function(){
		$("input[type='checkbox']").prop('checked',false);
	})
</script>
