<html>
<head>
  <title>{$title}</title>
</head>
<body>
  <ul>

  	{iteration:iLecturers}

	<li>

		{$lecturer}

		<ul>
			{iteration:iCourses}
			<li>{$course}</li>
			{/iteration:iCourses}
		</ul>

	</li>

  	{/iteration:iLecturers}

  </ul>

</body>
</html>