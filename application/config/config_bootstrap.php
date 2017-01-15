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
	'template_frontend' => 'amp',

	'menu' => array(
		'backend' => array(
			'left' => array(
				'1' => array(
					'icon' => 'fa fa-clipboard',
					'text' => 'menu_posts',
					'url' => '#',
					'children' => array(
						'1' => array(
							'icon' => 'fa fa-circle-o',
							'text' => 'menu_post_categories',
							'url' => 'backend/post_categories',
						),
						'2' => array(
							'icon' => 'fa fa-circle-o',
							'text' => 'menu_posts',
							'url' => 'backend/posts',
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

	'datetime_php' => 'd-m-Y H:i',
	'datetime_js' => 'DD-MM-YYYY HH:mm', // based on http://momentjs.com/docs/#/displaying/

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

	'upload' => array(
		'max_size' => 5000,
		'posts_upload_path' => 'uploads/posts',
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
