<?php
require_once 'bibliotecas/conexion.php';
try {
    $pdo = getConnection();
    //sql
    $sql = "SELECT "
            . "clientes.id, "
            . "CONCAT(clientes.apellido, ', ' , clientes.nombre) as nombre, "
            . "TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) as edad, "
            . "clientes.activo , nacionalidades.nacionalidad "
            . "FROM clientes JOIN nacionalidades "
            . "on  clientes.nacionalidad_id = nacionalidades.id";

    $stmt = $pdo->prepare($sql);

    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ

    //ejecutamos la consulta
    $stmt->execute();

    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
require_once 'Index_Vista.php';
