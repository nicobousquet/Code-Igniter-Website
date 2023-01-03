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

$hook['post_controller'] = function () {
	$CI =& get_instance();
	$CI->load->library('session');

	if (!$CI->session->has_userdata('login')) {
		$CI->session->set_userdata('login', false);
	}

	if (!$CI->session->has_userdata('password')) {
		$CI->session->set_userdata('password', true);
	}
};
