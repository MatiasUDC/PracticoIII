<?php

require_once '../../Controladores/LoginController.php';


$usuario = new LoginController();

if (!empty($_POST)) { //venimos por post?
if ($usuario->procesarRegistro($_POST) == true) { //procesó OK?
        echo "<script>
                alert('Usuario Registrado de Forma Correcta')
                window.location= '../../Login/Login.php'
                </script>
             ";
        //header("Location: ../../Login/Login.php"); //redirect
        die();
    }
}

require "./FormLogin_Vista.php";
