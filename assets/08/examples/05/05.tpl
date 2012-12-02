<html>
<head>
  <title>{$title}</title>
</head>
<body>
  <ul>
  	{iteration:iLecturers}
	<li>{$lecturer} {option:oItsme}-- Oh, that's me!{/option:oItsme}</li>
  	{/iteration:iLecturers}
  </ul>
</body>
</html>