<?php
function switch_db() {
	// print_r($_SESSION); exit;
	$db_name = "";
	if (!empty($_SESSION['db_name'])) {
		$db_name = $_SESSION['db_name'];
	} else {

		if (strpos($_SERVER['REQUEST_URI'], 'auth/login') === true) {
			redirect('auth/login');
		} elseif(strpos($_SERVER['REQUEST_URI'], 'auth/forgot_password') === true) {
			redirect('auth/forgot_password');
		} elseif(strpos($_SERVER['REQUEST_URI'], 'auth/reset_password') === true) {
			redirect('auth/reset_password');
		} elseif(strpos($_SERVER['REQUEST_URI'], 'auth/create_user') === true) {
			redirect('auth/create_user');
		} /*else{
			redirect('auth/login');
		}*/

		$db_name = set_project();
	}
	$obj =& get_instance();
	$obj->load->dbutil();

	if (!empty($db_name) && !$obj->dbutil->database_exists($db_name)) {
		// echo getProjectId();
		// echo $db_name;
		// exit();
      $obj->db->query("create database $db_name");
    }

	$CI =& get_instance();

	if ($_SERVER['HTTP_HOST']=="phprobo.com") {
		$user = SERVER_USERNAME;
		$pass = SERVER_PASSWORD;
	} else {
		$user = LOCAL_USERNAME;
		$pass = LOCAL_PASSWORD;
	}

	// mysql
	$db2=array(
		'dsn'	=> '',
		'hostname' => 'localhost',

		'username' => $user,
		'password' => $pass,
		
		'database' => $db_name,
		'temp_database' => 'temp_database',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
	$CI->newdb=$CI->load->database($db2, TRUE);

}
