<?php
    require_once '../../Login/Control_Session.php';	
    require_once '../../Controladores/ClienteForm.php';
        
	
	$form = new ClienteForm();
	
	if(!empty($_POST)) {	//venimos por post?

		if($form->procesar($_POST)) {	//procesó OK?
			header("Location: ../../Index.php");	//redirect
			die();
		}
	}
	
	require "./Alta_vista.php";
