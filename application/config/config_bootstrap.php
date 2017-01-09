<?php
/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views
| when calling MY_Controller's render() function.
*/

$config['config_bootstrap'] = array(
	// Site name
	'site_name' => 'CodeIgniter 3',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author' => '',
		'description' => '',
		'keywords' => ''
	),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(),
		'foot'	=> array(),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array()
	),

	// Default template
	'template_backend' => 'adminlte',
	'template_frontend' => 'adminlte',

	'menu' => array(
		'backend' => array(
			'left' => array(
				'1' => array(
					'icon' => 'fa fa-clipboard',
					'text' => 'menu_post',
					'url' => '#',
					'children' => array(
						'1' => array(
							'icon' => 'fa fa-circle-o',
							'text' => 'menu_post_categories',
							'url' => 'backend/post_categories',
						),
					),
				),
				'2' => array(
					'icon' => 'fa fa-user',
					'text' => 'menu_admin',
					'url' => '#',
					'children' => array(
						'1' => array(
							'icon' => 'fa fa-circle-o',
							'text' => 'menu_groups',
							'url' => 'backend/groups',
						),
						'2' => array(
							'icon' => 'fa fa-circle-o',
							'text' => 'menu_users',
							'url' => 'backend/users',
						),
					),
				),
			),
		),
		'frontend' => array(),
	),

	// Multilingual settings
	'languages' => array(
		'available'	=> array(
			'1' => array(
				'label'	=> 'English',
				'value'	=> 'english',
			),
			'2' => array(
				'label'	=> 'Indonesia',
				'value'	=> 'indonesian',
			),
		),
	),

	// Email config
	'email' => array(
		'from_email' => '',
		'from_name' => '',
		'subject_prefix' => '',

		// Gmail
		'gmail' => array(
			'email' => '',
			'password' => ''
		),

		// Mailgun HTTP API
		'mailgun_api' => array(
			'domain' => '',
			'private_api_key' => ''
		),
	),

	// Debug tools
	'debug' => array(
		'profiler' => TRUE
	),

	'backend_login' => 'backend/admin',
);
?>
