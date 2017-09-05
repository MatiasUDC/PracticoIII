<?php

require '../Form.php';
require_once __DIR__ . '/../bibliotecas/conexion.php';
class BajaController extends Form {
    
    
    
    
    public function eliminar($campo) {
        $id_cliente = $campo;
        try {
            $pdo = getConnection();
            $sql = "DELETE FROM "
                    . "clientes "
                    . "WHERE clientes.id = :id";


            $stmt = $pdo->prepare($sql);

            //especid¿ficamos la salida como un array
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            //sustituir los parametros por los valores reales
            $stmt->bindParam(':id', $id_cliente);

            //ejecutamos la consulta
            $stmt->execute();
            
        } catch (PDOException $ex) {
            echo "Error de conexion de la DB: " . $ex->getMessage();
        }
    }

    protected function modificar() {
        
    }

    protected function nacionalidades() {
        
    }

    protected function registrar() {
        
    }

    protected function rellenarCon($arreglo_datos) {
        
    }

    protected function validar() {
        
    }

    public function getChecked($campo) {
        
    }

    public function getError($campo) {
        
    }

    public function getSelected($campo, $valor_ref) {
        
    }

    public function getValor($campo) {
        return $this->tieneValor($campo) ? $this->valores[$campo] : null;
    }

    public function setError($campo, $mensaje) {
        
    }

    public function tieneError($campo) {
        
    }

    public function tieneErrores() {
        
    }

    public function tieneValor($campo) {
        return !empty($this->valores[$campo]);
    }

}
