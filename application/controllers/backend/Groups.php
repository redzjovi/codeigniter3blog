<?php
class Groups extends Backend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_admin')),
			array('text' => lang('menu_groups')),
		);
		$vars['groups'] = $this->ion_auth->groups()->result();
		$vars['page_title'] = lang('menu_groups');
		$this->view('groups/index', $vars);
	}

	public function create()
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_admin')),
			array('text' => lang('menu_groups'), 'url' => site_url('backend/groups')),
			array('text' => lang('menu_group_create')),
		);
		$vars['page_title'] = lang('menu_group_create');

		$this->form_validation->set_rules('group_name', lang('group_name'), 'trim|required|is_unique[groups.name]');
		$this->form_validation->set_rules('group_description', lang('group_description'), 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->view('groups/create', $vars);
		}
		else
		{
			$group_name = $this->input->post('group_name');
			$group_description = $this->input->post('group_description');
			$this->ion_auth->create_group($group_name, $group_description);
			$this->session->set_flashdata('message_success', $this->ion_auth->messages());
			redirect('backend/groups');
		}
	}

	public function update($group_id = NULL)
	{
		$group_id = $this->input->post('group_id') ? $this->input->post('group_id') : $group_id;
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_admin')),
			array('text' => lang('menu_groups'), 'url' => site_url('backend/groups')),
			array('text' => lang('menu_group_update')),
		);
		$vars['page_title'] = lang('menu_group_update');

		$this->form_validation->set_rules('group_name', lang('group_name'), 'trim|required|callback_check_unique_group_name');
		$this->form_validation->set_rules('group_description', lang('group_description'), 'trim|required');
		$this->form_validation->set_rules('group_id', lang('group_id'), 'trim|integer|required');

		if ($this->form_validation->run() === FALSE)
		{
			if ($group = $this->ion_auth->group((int) $group_id)->row())
			{
				$vars['group'] = $group;
			}
			else
			{
				$this->session->set_flashdata('message_danger', 'The group doesn\'t exist.');
				redirect('backend/groups');
			}
			$this->view('groups/update', $vars);
		}
		else
		{
			$group_name = $this->input->post('group_name');
			$group_description = $this->input->post('group_description');
			$group_id = $this->input->post('group_id');
			$this->ion_auth->update_group($group_id, $group_name, $group_description);
			$this->session->set_flashdata('message_success', $this->ion_auth->messages());
			redirect('backend/groups');
		}
	}

	public function delete($group_id = NULL)
	{
		if ($group_id)
		{
			$this->ion_auth->delete_group($group_id);
			$this->session->set_flashdata('message_success', $this->ion_auth->messages());
		}
		redirect('backend/groups');
	}

	function check_unique_group_name()
	{
		$group_id = $this->input->post('group_id');
		$group_name = $this->input->post('group_name');
		$this->load->model('Groups_Model');
		$result = $this->Groups_Model->check_unique_group_name($group_id, $group_name);
		
		if ($result == 0)
		{
			$response = true;
		}
		else
		{
			$this->form_validation->set_message(
				'check_unique_group_name',
				sprintf(lang('unique_with_param'), lang('group_name'))
			);
			$response = false;
		}
		return $response;
	}
}
?>