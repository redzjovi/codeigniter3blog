<?php
class Backend_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function view($view, $vars = array(), $return = FALSE)
	{
		$config = $this->config->item('config_bootstrap');
		$template = $config['template_backend'];

		$this->load->view($template.'/'.$this->backend_folder.'/'.$view, $vars);
	}
}
?>
