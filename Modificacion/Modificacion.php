<?php
require_once __DIR__.'/../bibliotecas/conexion.php';
require_once __DIR__ . '/../ClienteForm.php';
$form = new ClienteForm();
if (empty($_POST)) {
    
    $id_cliente = $_GET['id'];
    try {
        $pdo = getConnection();
        //sql
        $sql = "SELECT c.id,c.apellido as apellido,c.nombre as nombre,c.fecha_nacimiento ,c.activo as activo,"
                . "c.nacionalidad_id as nacionalidad_id, n.nacionalidad "
                . "FROM clientes c JOIN nacionalidades n "
                . "ON c.nacionalidad_id = n.id "
                . "WHERE c.id >= :id";

        $stmt = $pdo->prepare($sql);

        //especid¿ficamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
        //sustituir los parametros por los valores reales
        $stmt->bindParam(':id', $id_cliente);

        //ejecutamos la consulta
        $stmt->execute();

        //recuperamos los datos de el array asoc.
        $results = $stmt->fetch();
    } catch (PDOException $ex) {
        echo "Error de conexion de la DB: " . $ex->getMessage();
    }

    require_once __DIR__ . '/Modificacion_vista.php';
}