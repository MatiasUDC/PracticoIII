<?php
require_once __DIR__ . '/../Controladores/BajaController.php';
$id = $_GET["id"];
$baja = new BajaController();

if(!empty($_GET)) {	//venimos por get?

		if($baja->eliminar($id)) {	//procesó OK?
			header("Location: ../Index.php");	//redirect
			die();
		}
	}