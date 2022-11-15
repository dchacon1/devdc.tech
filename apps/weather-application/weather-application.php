<?php
function get_weather_application()
{
	$GLOBALS['page_scripts'] = [
		'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js',
		__DIR__.'/assets/scripts.js'
	];

	$GLOBALS['page_styles'] = [
		__DIR__.'/assets/style.css'
	];

	$GLOBALS['page_title'] = 'Weather Application';

	$GLOBALS['page_content'] = set_weather_application_content();
}

function set_weather_application_content()
{
	ob_start(); ?>
<?= get_back_home_button() ?>
<div id="weather-form" class="weather-form">
	<h1 class="weather-form__heading">Weather</h1>

	<div class="weather-form__inner-wrap">
		<form onSubmit="return false">
			<div class="form-field-wrapper">
				<label for="city">City</label>
				<input type="text" v-model="cityNameInput" name="city" id="city" placeholder="Jacksonville" required>
			</div>
			<br>
			<button v-bind:disabled="isDisabled" v-on:click="getWeather()">Get Weather</button>
		</form>

		<div v-if="cityName.length > 0">
			<h2>The weather in {{cityName}}:</h2>

			<p><b>Temp: </b>{{temp}}</p>
			<p><b>Humidity: </b>{{humidity}}</p>
		</div>
	</div>
</div>
<?php
	return ob_get_clean();
}
