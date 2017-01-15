<?php
class Posts extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_Model');
    }

    function index($slug = '')
    {
        if ($post = $this->Posts_Model->read_by_slug($slug))
        {
            $vars['post'] = $post;
            $vars['posts'] = $this->Posts_Model->read_order_by('post_date', 'DESC');
            $this->view('posts/index', $vars);
        }
        else
        {
            $this->session->set_flashdata('message_danger', lang('data_not_exist'));
            redirect('');
        }
    }
}
?>