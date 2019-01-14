<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- <input type='text'> -->
	<input type="text" class="b">
	<select  id="select">
		<option value="文本框" >文本框</option>
		<option value="文本域" >文本域</option>
		<option value="单选框" >单选框</option>
		<option value="多选框" >多选框</option>
	</select>
	<input type="button" value="生成" class="sheng">
	<input type="button" value="克隆" class="ke">
	<input type="button" value="提交">
	<span>
		<form action="4.php" method="post" enctype="multipart/form-data">
			<table class="box">
				<tr>
					<td></td>
				</tr>
			</table>
		</form>
	</span>
</body>
</html>
<script src="jquery-3.3.1.js"></script>
<script>
	
	$(document).on('click','.sheng',function(){
		var value = $('#select').val();
		switch(value){
			case '文本框':var input = "<input type='text' class='input'>";break;
			case '文本域':var input = "<textarea name='textarea' class='textarea'></textarea>";break;
			case '单选框':var input = "<input type='radio' class='radio'>";break;
			case '多选框':var input = "<input type='checkbox' class='checkbox'>";break;
			defaule:alert('空');break;
		}
		$("td").append(input);
	})
</script>