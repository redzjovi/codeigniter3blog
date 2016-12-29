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

		$vars['top'] = $template.'/'.$this->backend_folder.'/_partials/top';
	    $vars['left'] = $template.'/'.$this->backend_folder.'/_partials/left';
	    $vars['view'] = $template.'/'.$this->backend_folder.'/'.$view;
	    $vars['right'] = $template.'/'.$this->backend_folder.'/_partials/right';
	    $vars['bottom'] = $template.'/'.$this->backend_folder.'/_partials/bottom';

	    $this->load->view($template.'/'.$this->backend_folder.'/_partials/head');
	    $this->load->view($template.'/'.$this->backend_folder.'/_partials/default', $vars);
	    $this->load->view($template.'/'.$this->backend_folder.'/_partials/foot');
	}
}
?>
