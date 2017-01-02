<?php
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->set_backend(TRUE);
	}

	public function index()
	{
		$this->view('admin/index', [], null, 'login');
	}
}
?>