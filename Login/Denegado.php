<?php
require_once __DIR__ . '/../bibliotecas/Cabecera.php';
?>

<div class="container">
    <div class="row-fluid">
        <div class="alert alert-danger" role="alert" >Acceso denegado.<br/>No hay un usuario logueado.</div>
        <a href="../Vistas/Login/Login.php" class="btn btn-danger " >Iniciar Sesion</a>
    </div>
</div>
<br>
<br>
<?php require_once __DIR__ . '/../bibliotecas/Footer.php'; ?>