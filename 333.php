<?php
// enctype="multipart/form-data"
//ajax分页
mysql_connect('127.0.0.1','root','root');
mysql_select_db("03q");
$sql = "select * from a2";
$arr = mysql_query($sql);
while ($data = mysql_fetch_assoc($arr)) {
	$list[] = $data;
}
$count = count($list);
$pageSize = 5;
$pageCount = ceil($count/$pageSize);
$page = @!empty($_GET['page']) ? $_GET['page'] : 1;
$pageLimit = ceil(($page - 1 ) * $pageSize) ;
$limitSql = "select * from a2 limit $pageLimit , $pageSize";
// echo $Limitsql;die;
$array = mysql_query($limitSql);
while ($res = mysql_fetch_assoc($array)) {
	$datas[] = $res;
}
if($_GET){
	echo json_encode($datas);die;
}
// print_r($datas) ;die;


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1">
		<h2>展示</h2>
		<form action="sele.php" method="post">
			<input type="text" name='name'>
			<input type="submit" value="提交">
		</form>
		<th>ID</th>
		<!-- <th>图片</th> -->
		<th>名字</th>
		<th>价格</th>
		<th>描述</th>
		<th>操作</th>
		<tbody id="tbody">
			<?php foreach($datas as $value){ ?>
				<tr class="tr">
					<td><?php echo $value['id']?></td>
					<!-- <td><img src="<?php echo $value['tmp_name']?>" style='height:100px;width:120px'></td> -->
					<td><?php echo $value['name']?></td>
					<td><?php echo $value['price']?></td>
					<td><?php echo $value['miao']?></td>
					<td><a href="#" class="<?php echo $value['id']?>" id='del'>删除</a>|<a>编辑</a></td>
				</tr>
			<?php }?>
		</tbody>
	</table>
	<?php for($i=1;$i<=$pageCount;$i++){?>
		<a href="333.php?page=<?php echo $i?>" class='page'><?php echo $i?></a>
	<?php }?>
</body>
</html>
<script src="jquery-3.3.1.js"></script>
<script>
	$(document).on('click','.page',function(){
		event.preventDefault();
		var url = $(this).attr('href');
		// alert(url);
		$.ajax({
			url: url,
			dataType: 'json',
			success:function(res){
				// console.log(res);return;
				$('#tbody').empty();
				$.each(res,function(i,v){
					var tr = $("<tr class='tr'></tr>");
					tr.append("<td>"+v.id+"</td>");
					tr.append("<td>"+v.name+"</td>");
					tr.append("<td>"+v.price+"</td>");
					tr.append("<td>"+v.miao+"</td>");
					tr.append("<td><a href='#' class='"+v.id+"' id='del'>删除</a>|<a>编辑</a></td>");
					$('#tbody').append(tr);
				})
			}
		})
		
	})
</script>


