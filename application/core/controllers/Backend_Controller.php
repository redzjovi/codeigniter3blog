<?php
class Backend_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->set_backend(TRUE);

		// only login users can access Admin Panel
		$this->verify_login();
	}
}
?>