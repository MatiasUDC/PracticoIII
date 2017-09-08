<?php
	require_once '../Controladores/LoginController.php';

	
	$usuario = new LoginController();
	
	if(!empty($_POST)) {	//venimos por post?

		if($usuario->procesar($_POST)==true) {	//procesó OK?
                        session_start();
                        $_SESSION["logueado"] = true;
			header("Location: ../Index.php");	//redirect
			die();
		}
	}
	
	require "./Login_Vista.php";
