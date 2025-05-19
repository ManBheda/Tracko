<?php
// Set temperature variable
$temperature = 25;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thermometer</title>
	<style>
		/* Define the thermometer container style */
		.thermometer {
			width: 20px;
			height: 200px;
			border: 1px solid black;
			position: relative;
			margin: 50px auto;
			background-color: #f2f2f2;
			border-radius: 5px;
			box-shadow: 0 0 5px #888;
			overflow: hidden;
		}
		/* Define the temperature bar style */
		.thermometer .bar {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			background-color: red;
			height: <?php echo $temperature * 2; ?>px; /* Use the temperature value to set the height */
			transition: height 1s ease;
		}
		/* Define the thermometer bulb style */
		.thermometer .bulb {
			position: absolute;
			bottom: 0;
			left: 50%;
			transform: translateX(-50%);
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background-color: #f2f2f2;
			border: 1px solid black;
			box-shadow: 0 0 5px #888;
			z-index: 1;
		}
		/* Define the thermometer bulb liquid style */
		.thermometer .bulb .liquid {
			position: absolute;
			bottom: 0;
			left: 50%;
			transform: translateX(-50%);
			width: 80%;
			height: <?php echo $temperature * 2; ?>px; /* Use the temperature value to set the height */
			background-color: red;
			border-radius: 50%;
			z-index: -1;
		}
	</style>
</head>
<body>
	<h1>Thermometer</h1>
	<div class="thermometer">
		<div class="bar"></div>
		<div class="bulb">
			<div class="liquid"></div>
		</div>
	</div>
	<p>Temperature: <?php echo $temperature; ?> &deg;C</p>
</body>
</html>
