<?php
require_once '../../Login/Control_Session.php';
require_once __DIR__ . '/../../Controladores/ModificarController.php';
$cliente = new ModificarController();
if (!empty($_GET)) {

    $id_cliente = $_GET['id'];
    
    $datos = $cliente->getCliente($id_cliente);
    

    require_once __DIR__ . '/Modificacion_vista.php';
}
if (!empty($_POST)) { //venimos por post?
    if ($cliente->procesar($_POST)) { //procesó OK?
        header("Location: ../../Index.php"); //redirect
        die();
    }
}