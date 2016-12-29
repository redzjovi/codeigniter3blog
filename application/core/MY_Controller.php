<?php
class MY_Controller extends CI_Controller
{
	protected $backend_folder = 'backend';
  	protected $frontend_folder = 'frontend';
	
	public function __construct()
	{
		parent::__construct();
	}
}

// include base controllers
require APPPATH.'core/controllers/Backend_Controller.php';
require APPPATH.'core/controllers/Frontend_Controller.php';
?>
