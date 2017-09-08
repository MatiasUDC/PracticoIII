<?php

require_once __DIR__ . '/../../Controladores/BajaController.php';
$baja = new BajaController();

if (!empty($_GET)) { //venimos por get?
    $id = $_GET["id"];
    if ($baja->eliminar($id)) { //procesó OK?
        header("Location: ../../Index.php"); //redirect
        die();
    }
}