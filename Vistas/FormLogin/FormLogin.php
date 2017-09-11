<?php

require_once '../../Controladores/LoginController.php';


$usuario = new LoginController();

if (!empty($_POST)) { //venimos por post?
if ($usuario->procesarRegistro($_POST) == true) { //procesó OK?
echo <<< EOT
        <div class="alert alert-success"><p>El usuario se dio de alta correctamente</p></div>
EOT;
        header("Location: ../../Login/Login.php"); //redirect
        die();
    }
}

require "./FormLogin_Vista.php";
