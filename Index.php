<?php
require_once __DIR__ . '/Login/Control_Session.php';
require_once './Controladores/IndexController.php';

$cliente = new IndexController();
$clientes  = $cliente->GetClientes(); 
require_once 'Index_Vista.php';
