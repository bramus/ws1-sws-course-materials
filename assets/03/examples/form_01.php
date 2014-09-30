<!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

	<form action="form_process.php" method="get">

		<fieldset>

			<h2>Testform</h2>

			<dl class="clearfix">

				<dt><label for="name">Name</label></dt>
				<dd class="text"><input type="text" id="name" name="name" value="" class="input-text" /></dd>

				<dt><label for="pass">Password</label></dt>
				<dd class="text"><input type="password" id="pass" name="pass" value="" class="input-text" /></dd>

				<dt><label>Gender</label></dt>
				<dd>
					<label for="gender_male"><input type="radio" class="option" name="gender" id="gender_male" value="male" />Male</label>
					<label for="gender_female"><input type="radio" class="option" name="gender" id="gender_female" value="female" />Female</label>
				</dd>

				<dt><label for="cont">Continent</label></dt>
				<dd>
					<select name="cont" id="cont">
						<option value="0">Please select...</option>
						<option value="1">Africa</option>
						<option value="2">America</option>
						<option value="3">Antarctica</option>
						<option value="4">Asia</option>
						<option value="5">Europe</option>
						<option value="6">Oceania</option>
					</select>
				</dd>

				<dt><label>Meals</label></dt>
				<dd>
					<label for="meal0"><input type="checkbox" class="option" name="meals[]" id="meal0" value="breakfast" />breakfast</label>
					<label for="meal1"><input type="checkbox" class="option" name="meals[]" id="meal1" value="lunch" />lunch</label>
					<label for="meal2"><input type="checkbox" class="option" name="meals[]" id="meal2" value="dinner" />dinner</label>
				</dd>

				<dt><label for="remark">Remark</label></dt>
				<dd class="text"><textarea name="remark" id="remark" rows="5" cols="40"></textarea></dd>

				<dt class="full clearfix" id="lastrow">
					<input type="submit" id="btnSubmit" name="btnSubmit" value="Send" />
				</dt>

			</dl>

		</fieldset>

	</form>

</body>
</html>