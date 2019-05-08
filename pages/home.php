<?php
	include("../scripts/session.php");

	include("../scripts/buildelems.php");

?>
<div id="wrapper">
<h1>Hi there, <?php echo ($_SESSION['fname'] . " " . $_SESSION['lname']); ?></h1>
	<div class="weather-wrapper">
<center>

		<img src="" class="weather-icon" alt="Weather Icon" />

		<p><strong>Place</strong>
		<br /><span class="weather-place"></span></p>

		<p><strong>Temperature</strong>
		<br /><span class="weather-temperature"></span> (<span class="weather-min-temperature"></span> - <span class="weather-max-temperature"></span>)</p>

		<p><strong>Description</strong>
		<br /><span class="weather-description capitalize"></span></p>

		<p><strong>Humidity</strong>
		<br /><span class="weather-humidity"></span></p>

		<p><strong>Wind speed</strong>
		<br /><span class="weather-wind-speed"></span></p>

		<p><strong>Sunrise</strong>
		<br /><span class="weather-sunrise"></span></p>

		<p><strong>Sunset</strong>
		<br /><span class="weather-sunset"></span></p>

</center>
	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script type="text/javasctipr">
		if (typeof jQuery == 'undefined') {
			document.write(unescape("%3Cscript src='../scripts/openWeather/src/lib/jquery.1.9.1.min.js' type='text/javascript'%3E%3C/script%3E"));
		}
	</script>

	<script src="../scripts/openWeather/src/openweather.js"></script>
	<script>

		$(function() {

			$('.weather-temperature').openWeather({
				key: 'c9d49310f8023ee2617a7634de23c2aa',
				city: '<?php echo $_SESSION['city'] ?>',
				descriptionTarget: '.weather-description',
				windSpeedTarget: '.weather-wind-speed',
				minTemperatureTarget: '.weather-min-temperature',
				maxTemperatureTarget: '.weather-max-temperature',
				humidityTarget: '.weather-humidity',
				sunriseTarget: '.weather-sunrise',
				sunsetTarget: '.weather-sunset',
				placeTarget: '.weather-place',
				iconTarget: '.weather-icon',
				customIcons: '../scripts/openWeather/src/img/icons/weather/',
				success: function(data) {
					// show weather
					$('.weather-wrapper').show();
					console.log(data);
				},
				error: function(data) {
					console.log(data.error);
					//$('.weather-wrapper').remove();
				}
			});

		});

	</script>
<div class="lastOutfit">
<h2>
Welcome to your Dappr closet.  Check out the weather to the left and look up at the top to find your closet, outfits, and account information.  
</h2>

</div>
<div class="recomendedOutfit">
<h1>
Check out your outfits to see your past outfits and make new ones.
</h1>
</div>
<div class="rightHome">
</div>
</div>
<?php include("../scripts/footer.php"); ?>
	</body>
</html>
