<?php

namespace Drupal\material\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;


/**
 * Controller for material.page route.
 *
 * This is an example describing how a module can weather api 
 * For location London - the weather Temperature and Humidity values are displayed.
 */
 
class WeatherPage extends ControllerBase {
	public function getContent() {
		
		$client = \Drupal::httpClient();
		$url = 'http://api.openweathermap.org/data/2.5/weather?q=London&appid=0ce7b7c92fff7f3122d1fe23c95ca0ad';
		
		$request = $client->get($url);
		//var_dump($request);
		$jsondata = json_decode($request->getBody(), true);
		$temp = $jsondata['main']['temp'];
		$humidity = $jsondata['main']['humidity'];
		echo "Weather Details of London is: Temperature =" .$temp. "Humidity = ".$humidity;
		//var_dump($jsondata['main']['temp']);
		//return $jsondata;
	  }
 
}