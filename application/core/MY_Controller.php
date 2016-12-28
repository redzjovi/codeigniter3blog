<?php
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
}

// include base controllers
require APPPATH.'core/controllers/Backend_Controller.php';
require APPPATH.'core/controllers/Frontend_Controller.php';
?>
