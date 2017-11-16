<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twitter_api {
		
	public function __construct($config) {
		require_once APPPATH.'third_party/twitter/Twitter.class.php';
		
		// set api keys
		$settings = array(
			'oauth_access_token' => $config['twitter_access_token'],
			'oauth_access_token_secret' => $config['twitter_access_secret'],
			'consumer_key' => $config['twitter_consumer_token'],
			'consumer_secret' => $config['twitter_consumer_secret']
		);
		
		$twitter = new TwitterAPIExchange($settings);
		
		$CI =& get_instance();
		$CI->twitter = $twitter;
		
	}
	
}