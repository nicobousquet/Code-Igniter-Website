<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

// Pre-controller hook to set session variables
$hook['post_controller_constructor'] = function () {
	// Get the current instance of the CI_Controller class
	$CI =& get_instance();

	// Set the 'login' session variable to false if it is not already set
	if (!$CI->session->has_userdata('login')) {
		$CI->session->set_userdata('login', false);
	}

	// Set the 'password' session variable to true if it is not already set
	if (!$CI->session->has_userdata('password')) {
		$CI->session->set_userdata('password', true);
	}
};

