<html>
<head>
  <title>{$title}</title>
</head>
<body>
  Hi there {$user}, the weather today is {$weather}. 
  
  {option:oCloudy}
  <img src="http://img0.gmodules.com/ig/images/weather/cloudy.png" alt="" title="" /><br />
  It might be a good idea to bring your umbrella with you
  {/option:oCloudy}
  
  {option:oSunny}
  <img src="http://img0.gmodules.com/ig/images/weather/sunny.png" alt="" title="" /><br />
  Wear a hat!
  {/option:oSunny}
  
</body>
</html>