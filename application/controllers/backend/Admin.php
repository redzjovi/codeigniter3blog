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
		if ($this->ion_auth->logged_in())
		{
			redirect('backend/dashboard');
		}
		else
		{
			$vars['page_title'] = 'Admin';

			if ($this->input->post())
			{
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('remember_me','Remember me','integer');

				if ($this->form_validation->run() === TRUE)
				{
					$remember = (bool) $this->input->post('remember_me');
					if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
					{
						redirect('backend/dashboard');
					}
					else
					{
						$vars['message'] = $this->ion_auth->errors();
					}
				}
				else
				{
					$vars['message'] = validation_errors();
				}
			}

			$this->view('admin/index', $vars, null, 'login');
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect('backend/admin');
	}
}
?>