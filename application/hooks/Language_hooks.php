<?php
class Language_hooks
{
    function initialize()
    {
        $ci = & get_instance();
        $ci->load->helper('language');

        $site_language = $ci->session->userdata('site_language');
        if ($site_language)
        {
            $ci->config->set_item('language', $site_language);
        }
        $ci->lang->load('index', $ci->config->item('language'));
    }
}
?>