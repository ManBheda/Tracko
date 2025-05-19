<?php
$speed =40;
?><!DOCTYPE html>
<html>
<head>
	<title>Speedometer</title>
	<style>
		canvas {
			background-color: #eee;
			border-radius: 50%;
		}
		
		.speed {
			font-size: 50px;
			font-weight: bold;
			margin-top: 20px;
			text-align: center;
			text-shadow: 1px 1px 2px #444;
			color: #f00;
		}
		
		.speed-label {
			font-size: 20px;
			text-align: center;
			color: #555;
		}
	</style>
</head>
<body>
	<canvas id="speedometer" width="200" height="200"></canvas>
	<div class="speed"><?php echo $speed; ?> km/h</div>
	<div class="speed-label">SPEED</div>
	<script>
		// Get the canvas and context
		var canvas = document.getElementById("speedometer");
		var ctx = canvas.getContext("2d");
		
		// Draw the speedometer dial
		ctx.beginPath();
		ctx.arc(canvas.width/2, canvas.height/2, canvas.width/2 - 10, 0, 2 * Math.PI);
		ctx.lineWidth = 20;
		ctx.strokeStyle = "#555";
		ctx.stroke();
		
		// Draw the speedometer needle and label
		function drawNeedle(speed) {
			// Calculate the angle based on the speed
			var angle = speed / 220 * Math.PI - Math.PI/2;
			var label = speed.toFixed(0) + " km/h";
			var labelWidth = ctx.measureText(label).width;
			
			ctx.save();
			ctx.translate(canvas.width/2, canvas.height/2);
			ctx.rotate(angle);
			ctx.beginPath();
			ctx.moveTo(0, 0);
			ctx.lineTo(canvas.width/2 - 30, 0);
			ctx.lineWidth = 5;
			ctx.strokeStyle = "#f00";
			ctx.stroke();
			
			ctx.font = "20px Arial";
			ctx.fillStyle = "#f00";
			ctx.textAlign = "center";
			ctx.textBaseline = "middle";
			ctx.fillText(label, -labelWidth/2, -10);
			
			ctx.restore();
		}
		
		// Update the speedometer with the current speed
		function updateSpeedometer(speed) {
			// Clear the canvas
			ctx.clearRect(0, 0, canvas.width, canvas.height);
			
			// Draw the dial
			ctx.beginPath();
			ctx.arc(canvas.width/2, canvas.height/2, canvas.width/2 - 10, 0, 2 * Math.PI);
			ctx.lineWidth = 20;
			ctx.strokeStyle = "#555";
			ctx.stroke();
			
			// Draw the needle and label
			drawNeedle(speed);
			
			// Update the speed display
			document.querySelector('.speed').innerHTML = speed.toFixed(1) + " km/h";
		}
		
		// Call the updateSpeedometer function with the initial speed
		updateSpeedometer(<?php echo $speed; ?>);
	</script>
</body>
</html>
