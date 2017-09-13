<?php
//iniciar la session
session_start();
//el usuario NO esta logueado?
if ($_SESSION['logueado'] != true) {
    header('Location: /PracticoIII/Vistas/Login/Login.php');
    die();
}
    //continuo
    
