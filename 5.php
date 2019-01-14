<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="jquery-3.3.1.js"></script>
</head>
<body>
	<select name="" id="">
		<option value="text">输入框</option>
		<option value="checkbox">多选框</option>
		<option value="file">文件上传</option>
		<option value="radio">单选框</option>
		<option value="textarea">文本域</option>
	</select>
	<button class="btn">生成</button>
	<button class="clone">克隆全部</button>
	<span>
		<form action="{:url('index/add_do')}" method="post" enctype="multipart/form-data">
			<table class="box">
				<tr>
					<td></td>
				</tr>
			</table>
		</form>
	</span>
	<button class="send">保存</button>
</body>
</html>
<script>
	$(document).ready(function(){
		$(".btn").click(function(){
			var select = $('select').val();
			switch(select)
			{
				case 'file':
				var input = "<input type='file' name='file'>";break;
				case 'text':
				var input = "<input type='text' name='name'>";break;
				case 'checkbox':
				var input = "<input type='checkbox'>";break;
				case 'radio':
				var input = "<input type='radio'>";break;
				case 'textarea':
				var input = "<textarea name='textarea'></textarea>";break;
				defaule:
				alert('空');break;
			}
			$("td").append(input);
		})
		$(".clone").click(function(){
			var clone = $("tr").first().clone();
			$("tr").last().after(clone);
		})
	})
</script>