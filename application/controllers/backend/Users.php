<?php
class Users extends Backend_Controller
{	
	public function __construct()
	{
		parent::__construct();
	}

	public function index($group_id = NULL)
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_admin')),
			array('text' => lang('menu_users')),
		);
		$vars['page_title'] = lang('menu_users');
		$vars['users'] = $this->ion_auth->users($group_id)->result();
		foreach ($vars['users'] as $k => $user)
		{
			$vars['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		$this->view('users/index', $vars);
	}

	public function create()
	{	
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_admin')),
			array('text' => lang('menu_users'), 'url' => site_url('backend/users')),
			array('text' => lang('menu_user_create')),
		);
		$vars['page_title'] = lang('menu_user_create');

		$this->form_validation->set_rules('first_name', lang('first_name'), 'trim');
		$this->form_validation->set_rules('last_name', lang('last_name'), 'trim');
		$this->form_validation->set_rules('company', lang('company'), 'trim');
		$this->form_validation->set_rules('phone', lang('phone'), 'trim');
		$this->form_validation->set_rules('username', lang('username'), 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('email', lang('email'), 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', lang('password'), 'required');
		$this->form_validation->set_rules('password_confirm', lang('password_confirm'), 'required|matches[password]');
		$this->form_validation->set_rules('groups[]', lang('groups'), 'required|integer');

		if ($this->form_validation->run() === FALSE)
		{
			$vars['groups'] = $this->ion_auth->groups()->result();
			$this->view('users/create', $vars);
		}
		else
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$group_ids = $this->input->post('groups');
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone')
			);

			$this->ion_auth->register($username, $password, $email, $additional_data, $group_ids);
			$this->session->set_flashdata('message_success', $this->ion_auth->messages());
			redirect('backend/users');
		}
	}

	public function update($user_id = NULL)
	{
		$user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_admin')),
			array('text' => lang('menu_users'), 'url' => site_url('backend/users')),
			array('text' => lang('menu_user_update')),
		);
		$vars['page_title'] = lang('menu_user_update');

		$this->form_validation->set_rules('first_name', lang('first_name'), 'trim');
		$this->form_validation->set_rules('last_name', lang('last_name'), 'trim');
		$this->form_validation->set_rules('company', lang('company'), 'trim');
		$this->form_validation->set_rules('phone', lang('phone'), 'trim');
		$this->form_validation->set_rules('username', lang('username'), 'trim|required');
		$this->form_validation->set_rules('email', lang('email'), 'trim|required|valid_email');
		$this->form_validation->set_rules('password', lang('password'), 'min_length[6]');
		$this->form_validation->set_rules('password_confirm', lang('password_confirm'), 'matches[password]');
		$this->form_validation->set_rules('groups[]', lang('groups'), 'required|integer');
		$this->form_validation->set_rules('user_id', lang('user_id'), 'trim|integer|required');

		if ($this->form_validation->run() === FALSE)
		{
			if ($user = $this->ion_auth->user((int) $user_id)->row())
			{
				$vars['user'] = $user;
			}
			else
			{
				$this->session->set_flashdata('message', 'The user doesn\'t exist.');
				// redirect('admin/users', 'refresh');
			}
			$vars['groups'] = $this->ion_auth->groups()->result();
			$vars['usergroups'] = array();
			if ($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
			{
				foreach ($usergroups as $group)
				{
					$vars['usergroups'][] = $group->id;
				}
			}
			$this->view('users/update', $vars);
		}
		else
		{
			$user_id = $this->input->post('user_id');
			$new_data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			);
			if (strlen($this->input->post('password')) >= 6) $new_data['password'] = $this->input->post('password');

			$this->ion_auth->update($user_id, $new_data);
	 
			//Update the groups user belongs to
			$groups = $this->input->post('groups');
			if (isset($groups) && !empty($groups))
			{
				$this->ion_auth->remove_from_group('', $user_id);
				foreach ($groups as $group)
				{
					$this->ion_auth->add_to_group($group, $user_id);
				}
			}

			$this->session->set_flashdata('message_success', $this->ion_auth->messages());
			redirect('backend/users');
		}
	}

	public function delete($user_id = NULL)
	{
		$this->ion_auth->delete_user($user_id);
		$this->session->set_flashdata('message_success', $this->ion_auth->messages());
		redirect('backend/users');
	}
}
?>