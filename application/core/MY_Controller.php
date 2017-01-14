<?php
class MY_Controller extends CI_Controller
{
	protected $is_backend = 0;
	protected $backend_folder = 'backend';
	protected $frontend_folder = 'frontend';
	protected $config_bootstrap = array();

	public function __construct()
	{
		parent::__construct();

		$this->_setup();
	}

	protected function _setup()
	{
		$this->config_bootstrap = $this->config->item('config_bootstrap');
	}

	protected function set_backend($value = FALSE)
	{
		$this->is_backend = $value;
	}

	// Verify user login (regardless of user group)
	protected function verify_login($redirect_url = NULL)
	{
		if ( ! $this->ion_auth->logged_in())
		{
			if ($redirect_url == NULL)
				$redirect_url = $this->config_bootstrap['backend_login'];

			redirect($redirect_url);
		}
	}

	public function view($view, $vars = array(), $return = FALSE, $layout = 'default')
	{
		$vars = array_merge($this->config_bootstrap, $vars);
		$vars['ion_auth_user'] = $this->ion_auth->user()->row();
		$vars['user_group'] = $this->ion_auth->get_users_groups()->result();

		if ($this->is_backend === TRUE)
		{
			$template = $this->config_bootstrap['template_backend'];
			$folder = $this->backend_folder;
			$vars['menu'] = $this->config_bootstrap['menu']['backend'];
		}
		else
		{
			$template = $this->config_bootstrap['template_frontend'];
			$folder = $this->frontend_folder;
			$vars['menu'] = $this->config_bootstrap['menu']['frontend'];
		}

		$vars['top'] = $template.'/'.$folder.'/_partials/top';
		$vars['left'] = $template.'/'.$folder.'/_partials/left';
		$vars['messages'] = $template.'/'.$folder.'/_partials/messages';
		$vars['view'] = $template.'/'.$folder.'/'.$view;
		$vars['right'] = $template.'/'.$folder.'/_partials/right';
		$vars['bottom'] = $template.'/'.$folder.'/_partials/bottom';

		$this->load->view($template.'/'.$folder.'/_partials/head', $vars);
		$this->load->view($template.'/'.$folder.'/_layouts/'.$layout, $vars);
		$this->load->view($template.'/'.$folder.'/_partials/foot', $vars);
	}
}

// include base controllers
require APPPATH.'core/controllers/Backend_Controller.php';
require APPPATH.'core/controllers/Frontend_Controller.php';
?>
