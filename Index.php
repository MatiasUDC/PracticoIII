<?php
require_once './Controladores/IndexController.php';

$cliente = new IndexController();
$clientes  = $cliente->GetClientes(); 
require_once 'Index_Vista.php';
