<?php
class Posts extends Backend_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('Posts_Model');
	}

	function index()
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_posts')),
		);
        $vars['page_title'] = lang('menu_posts');
		$vars['posts'] = $this->Posts_Model->read();
        $this->view('posts/index', $vars);
	}

	function create()
	{
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_posts'), 'url' => site_url('backend/posts')),
			array('text' => lang('menu_post_create')),
		);
		$vars['page_title'] = lang('menu_post_create');

        if ($this->input->post('submit'))
		{
			$slug = $this->input->post('slug');
	        $title = $this->input->post('title');

	        if (empty($slug))
	            $slug = url_title($title, 'dash', TRUE);

	        $data = array(
	            'slug' => $slug,
	            'title' => $title,
				'content' => $this->input->post('content'),
				'author' => $this->input->post('author'),
				'status' => $this->input->post('status'),
				'post_date' => datetime_from_format($this->input->post('post_date'), $this->config_bootstrap['datetime_php']),
				'created_date' => date('Y-m-d H:i:s'),
	        );
			$this->form_validation->set_data($data);
		}

		$this->form_validation->set_rules('slug', lang('slug'), 'trim|required|alpha_dash|callback_check_unique_slug');
		$this->form_validation->set_rules('title', lang('title'), 'trim|required');
		$this->form_validation->set_rules('content', lang('content'), 'trim|required');
		$this->form_validation->set_rules('image', lang('image'), 'callback_check_image');
		$this->form_validation->set_rules('author', lang('author'), 'trim|required|numeric');
		$this->form_validation->set_rules('status', lang('status'), 'trim|required|numeric');
		$this->form_validation->set_rules('post_date', lang('post_date'), 'trim|required');
		$this->form_validation->set_rules('created_date', lang('created_date'), 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$vars['users'] = $this->ion_auth->users(1)->result_array();
			$this->view('posts/create', $vars);
		}
		else
		{
			$id = $this->Posts_Model->create($data);
			$this->Posts_Model->update($id, array('image' => $this->Posts_Model->image));
			$this->session->set_flashdata('message_success', lang('data_create_success'));
			redirect('backend/posts');
		}
	}

	function update($id = NULL)
	{
		$id = $this->input->post('id') ? $this->input->post('id') : $id;
		$vars['breadcrumb'] = array(
			array('text' => lang('menu_posts'), 'url' => site_url('backend/groups')),
			array('text' => lang('menu_post_update')),
		);
		$vars['page_title'] = lang('menu_post_update');

		if ($this->input->post('submit'))
		{
			$slug = $this->input->post('slug');
	        $title = $this->input->post('title');

	        if (empty($slug))
	            $slug = url_title($title, 'dash', TRUE);

	        $data = array(
	            'slug' => $slug,
	            'title' => $title,
				'content' => $this->input->post('content'),
				'author' => $this->input->post('author'),
				'status' => $this->input->post('status'),
				'post_date' => datetime_from_format($this->input->post('post_date'), $this->config_bootstrap['datetime_php']),
				'id' => $this->input->post('id'),
	        );
			$this->form_validation->set_data($data);
		}

		$this->form_validation->set_rules('slug', lang('slug'), 'trim|required|alpha_dash|callback_check_unique_slug');
		$this->form_validation->set_rules('title', lang('title'), 'trim|required');
		$this->form_validation->set_rules('content', lang('content'), 'trim|required');
		$this->form_validation->set_rules('image', lang('image'), 'callback_check_image');
		$this->form_validation->set_rules('author', lang('author'), 'trim|required|numeric');
		$this->form_validation->set_rules('status', lang('status'), 'trim|required|numeric');
		$this->form_validation->set_rules('post_date', lang('post_date'), 'trim|required');
		$this->form_validation->set_rules('id', lang('id'), 'trim|integer|required');

		if ($this->form_validation->run() === FALSE)
		{
			if ($post = $this->Posts_Model->read_by_id($id))
			{
				$post->image = $this->config_bootstrap['upload']['posts_upload_path'].'/'.$post->image;
				$vars['post'] = $post;
				$vars['users'] = $this->ion_auth->users(1)->result_array();
	            $this->view('posts/update', $vars);
			}
			else
			{
				$this->session->set_flashdata('message_danger', lang('data_not_exist'));
				redirect('backend/posts');
			}
		}
		else
		{
            $this->Posts_Model->update($id, $data);

			if ($this->Posts_Model->image)
				$this->Posts_Model->update($id, array('image' => $this->Posts_Model->image));

            $this->session->set_flashdata('message_success', lang('data_update_success'));
			redirect('backend/posts');
		}
	}

	function delete($id = NULL)
	{
		$this->Posts_Model->delete($id);
		$this->session->set_flashdata('message_success', lang('data_delete_success'));
		redirect('backend/posts');
	}

	function check_image()
	{
		if (isset($_FILES['image']) && $_FILES['image']['size'] != 0)
		{
			$upload_path = $this->config_bootstrap['upload']['posts_upload_path'];

			if ( ! is_dir($upload_path))
				mkdir($upload_path, 0777, TRUE);

			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = time().'_'.$_FILES['image']['name'];
			$config['max_size'] = $this->config_bootstrap['upload']['max_size'];
	        $config['upload_path'] = $upload_path;
			$this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('image'))
	        {
				$this->form_validation->set_message('check_image', $this->upload->display_errors());
	            return FALSE;
	        }
	        else
	        {
				$upload_data = $this->upload->data();
				$this->Posts_Model->image = $upload_data['file_name'];
				return TRUE;
	        }
		}
		else
		{
			return TRUE;
		}
	}

	function check_unique_slug()
	{
		$id = $this->input->post('id');
		$slug = $this->input->post('slug');
        $title = $this->input->post('title');

        if (empty($slug))
            $slug = url_title($title, 'dash', TRUE);

		$result = $this->Posts_Model->check_unique_slug($id, $slug);

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

	function cleansing()
	{
		$count = $this->Posts_Model->cleansing($this->config_bootstrap['upload']['posts_upload_path']);
		$this->session->set_flashdata('message_success', lang('data_delete_success').' ('.$count.')');
		redirect('backend/posts');
	}
}
?>