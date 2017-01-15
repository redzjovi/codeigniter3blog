<?php
class Home extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_Model');
    }

    function index()
    {
        $vars['posts'] = $this->Posts_Model->read();
        $this->view('home/index', $vars);
    }
}
?>