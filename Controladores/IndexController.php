<?php

require_once __DIR__ . '/../bibliotecas/conexion.php';

class IndexController {

    public $clientes;

    public function __construct() {
        $this->clientes = $this->GetClientes();
    }

    public function GetClientes() {
        try {
            $pdo = getConnection();
            //sql
            $sql = "SELECT "
                    . "clientes.id, "
                    . "CONCAT(clientes.apellido, ', ' , clientes.nombre) as nombre, "
                    . "TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) as edad, "
                    . "clientes.activo as activo , nacionalidades.nacionalidad "
                    . "FROM clientes JOIN nacionalidades "
                    . "on  clientes.nacionalidad_id = nacionalidades.id";
            $stmt = $pdo->prepare($sql);

            //especid¿ficamos la salida como un array
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            //sustituir los parametros por los valores reales
            //ejecutamos la consulta
            $stmt->execute();

            //recuperamos los datos de el array asoc.
            $resultado = $stmt->fetchAll();
            
            return $resultado;
        
            
        } catch (PDOException $ex) {
            echo "Error de conexion de la DB: " . $ex->getMessage();
        }

}
}