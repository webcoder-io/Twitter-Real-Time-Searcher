<?php
/** 
* AJAX Controller
* Written by Andy@PCinvent.com
* http://www.PCinvent.com
* Andy@PCinvent.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function index()
	{
		redirect('../');
	}
	
	public function twitter($api_name=null,$query=null)
	{
		switch($api_name)
		{
			case "search":
				$this->load->library('twitter_api'); // Loading twitter api library which will generate $twitter instance;
				$url = 'https://api.twitter.com/1.1/search/tweets.json'; // Web service url
				$requestMethod = 'GET'; // GET or POST ?
				$getfield = "?q=#".$query."&result_type=recent"; // Prepare post query

				// Exectute
				$result = $this->twitter->setGetfield($getfield)
				->buildOauth($url, $requestMethod)
				->performRequest();
				
				echo $result; // for ajax result
				
				break;
			default:
				redirect('../');
				break;
		}
	}
	
}