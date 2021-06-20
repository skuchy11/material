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
		$jsondata = json_decode($request->getBody(), true);
				
		/*$rows[] = [
        'temp' => $jsondata['main']['temp'],
        'humidity' => $jsondata['main']['humidity'],
        ];*/
	
	$build = [
      'description' => [
        '#theme' => 'description',
        '#description' => 'description',
		'#test_var' => [
		'city name' => $jsondata['name'],
		'temp' => $jsondata['main']['temp'],
		'humidity' => $jsondata['main']['humidity'],
		'wind speed' => $jsondata['wind']['speed'],
		'sun rise' => $jsondata['sys']['sunrise'],
		'sun set' => $jsondata['sys']['sunset'],
		'clouds' => $jsondata['clouds']['all'],
		],
      ],
    ];	
	return $build;
	  }
 
}