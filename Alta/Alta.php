<?php
	require_once __DIR__ . '/../ClienteForm.php';
	
	$form = new ClienteForm();
	
	if(!empty($_POST)) {	//venimos por post?

		if($form->procesar($_POST)) {	//procesó OK?
			header("Location: ../Index.php");	//redirect
			die();
		}
	}
	
	require "./Alta_vista.php";
