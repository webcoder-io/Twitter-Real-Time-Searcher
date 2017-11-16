<?php
/** 
* Twitter Controller
* Written by Andy@PCinvent.com
* http://www.PCinvent.com
* Andy@PCinvent.com
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller
{
	/**
	 * Controller constructor
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		redirect(base_url(), 'location');
	}
	
	public function search()
	{
		$this->load->view('common/header');
		$this->load->view('twitter/search');
		$this->load->view('common/footer');
	}
}

/* End of file twitter.php */
/* Location: ./application/controllers/twitter.php */