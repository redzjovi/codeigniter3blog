<?php
class Post_categories extends Backend_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('Post_Categories_Model');
	}

	function index()
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_posts')),
			array('text' => lang('menu_post_categories')),
		);
        $vars['page_title'] = lang('menu_post_categories');
		$vars['post_categories'] = $this->Post_Categories_Model->read();
        $this->view('post_categories/index', $vars);
	}

	function create()
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_posts')),
			array('text' => lang('menu_post_categories'), 'url' => site_url('backend/post_categories')),
			array('text' => lang('menu_post_category_create')),
		);
		$vars['page_title'] = lang('menu_post_category_create');

        $slug = $this->input->post('slug');
        $name = $this->input->post('name');

        if (empty($slug))
            $slug = url_title($name, 'dash', TRUE);

        $data = array(
            'slug' => $slug,
            'name' => $name,
        );

        if ($this->input->post('submit'))
            $this->form_validation->set_data($data);

		$this->form_validation->set_rules('slug', lang('slug'), 'trim|required|alpha_dash|callback_check_unique_slug');
		$this->form_validation->set_rules('name', lang('name'), 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->view('post_categories/create', $vars);
		}
		else
		{
			$this->Post_Categories_Model->create($data);
			$this->session->set_flashdata('message_success', lang('data_create_success'));
			redirect('backend/post_categories');
		}
	}

	function update($id = NULL)
	{
		$id = $this->input->post('id') ? $this->input->post('id') : $id;
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_posts')),
			array('text' => lang('menu_post_categories'), 'url' => site_url('backend/groups')),
			array('text' => lang('menu_group_update')),
		);
		$vars['page_title'] = lang('menu_group_update');

        $slug = $this->input->post('slug');
        $name = $this->input->post('name');
        if (empty($slug))
            $slug = url_title($name, 'dash', TRUE);

        $data = array(
            'slug' => $slug,
            'name' => $name,
            'id' => $this->input->post('id'),
        );

        if ($this->input->post('submit'))
            $this->form_validation->set_data($data);

		$this->form_validation->set_rules('slug', lang('slug'), 'trim|required|alpha_dash|callback_check_unique_slug');
		$this->form_validation->set_rules('name', lang('name'), 'trim|required');
		$this->form_validation->set_rules('id', lang('id'), 'trim|integer|required');

		if ($this->form_validation->run() === FALSE)
		{
            $vars['post_category'] = $this->Post_Categories_Model->read_by_id($id);
            $this->view('post_categories/update', $vars);
		}
		else
		{
            $this->Post_Categories_Model->update($id, $data);
            $this->session->set_flashdata('message_success', lang('data_update_success'));
			redirect('backend/post_categories');
		}
	}

	function delete($id = NULL)
	{
		$this->Post_Categories_Model->delete($id);
		$this->session->set_flashdata('message_success', lang('data_delete_success'));
		redirect('backend/post_categories');
	}

	function check_unique_slug()
	{
		$id = $this->input->post('id');
		$slug = $this->input->post('slug');
        $name = $this->input->post('name');

        if (empty($slug))
            $slug = url_title($name, 'dash', TRUE);

		$result = $this->Post_Categories_Model->check_unique_slug($id, $slug);

        if ($result == 0)
		{
			$response = true;
		}
		else
		{
			$this->form_validation->set_message(
				'check_unique_slug',
				sprintf(lang('unique_with_param'), lang('slug'))
			);
			$response = false;
		}
		return $response;
	}
}
?>