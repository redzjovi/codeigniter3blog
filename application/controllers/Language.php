<?php
class Language extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
	}

    public function switch_language($language)
	{
		$language = ($language) ? $language : $this->config->item('language');
		$this->session->set_userdata('site_language', $language);
        redirect($this->agent->referrer());
    }
}
?>