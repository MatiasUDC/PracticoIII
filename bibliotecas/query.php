<?php
require 'conexion.php';

$edad_cliente=22;
$sql ="SELECT apellido,nombre, edad FROM clientes_db.clientes WHERE edad >= :edad";

$stmt = $pdo->prepare($sql);
$stmt->setfetchmode(PDO::FETCH_ASSOC);
$stmt->bindParam(':edad',$edad_cliente, PDO::PARAM_INT);

$stmt->execute();
$results = $stmt->fetchAll();


foreach($results as $fila){
    echo sprintf("%s %s (%d años) <br>", $fila['apellido'], $fila['nombre'], $fila['edad']);
}
