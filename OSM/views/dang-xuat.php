<?php 
session_start();
	require_once __DIR__."/../autoload/autoload.php";
	if (isset($_SESSION['id']) ) {
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['phone']);
		unset($_SESSION['address']);
        unset($_SESSION['role_id']);
	}
	
	rdr_url('index.php');
