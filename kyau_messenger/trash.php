<script type="text/javascript">


var select = document.getElementById('');
var value = select.options[select.selectedIndex].value;
console.log(value);


<?php $dept = "<script>document.write(value)</script>"?>
<?php $abc = "<script>document.write(abc)</script>"?>   
</script>

<?php echo $abc;?>
<?php echo $dept;?>

<select id="dept" name="dept.">
<option value="1">CSE</option>
<option>EEE</option>
</select>
<h1 id="head">hello</h1>








<!DOCTYPE html>
<html>
	<body>
		<select id="language" onChange="update()">
			<option value="en">English</option>
			<option value="es">Español</option>
			<option value="pt">Português</option>
		</select>
		<input type="text" id="value">
		<input type="text" id="text">

		<script type="text/javascript">
			function update() {
				var select = document.getElementById('language');
				var option = select.options[select.selectedIndex];

				document.getElementById('value').value = option.value;
				document.getElementById('text').value = option.text;
			}

			update();
		</script>
	</body>
</html>
