<?php

require __DIR__ . '/../Modelo/Form.php';
require_once __DIR__ . '/../bibliotecas/conexion.php';

class LoginController extends Form {

    protected function BuscarUsuario($campos) {
        $usuario = $campos;
        try {
            $pdo = getConnection();
            //sql
            $sql = "SELECT u.id as id,u.usuario as usuario,u.password as pass "
                    . "FROM usuario u "
                    . "WHERE u.usuario = :usuario AND u.password = :password";

            $stmt = $pdo->prepare($sql);

            //especid¿ficamos la salida como un array
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            //sustituir los parametros por los valores reales
            $stmt->bindParam(':usuario', $usuario["usuario"]);
            $stmt->bindParam(':password', $usuario["contrasenia"]);
            //ejecutamos la consulta
            $stmt->execute();

            //recuperamos los datos de el array asoc.
            $results = $stmt->fetch();
            
            if(isset($results["usuario"])){
                return true;
            } else {
                return false;
            }
                
                
            
        } catch (PDOException $ex) {
            echo "Error de conexion de la DB: " . $ex->getMessage();
        }
    }

    protected function modificar() {
        
    }

    protected function nacionalidades() {
        
    }

    protected function registrar() {
        $campos = $this->valores;

        try {
            $pdo = getConnection();
            $sql = "INSERT INTO "
                    . "usuario"
                    . "(usuario,password)"
                    . "VALUES"
                    . "(:usuario,:password)";


            $stmt = $pdo->prepare($sql);

            //especid¿ficamos la salida como un array
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            //sustituir los parametros por los valores reales
            $stmt->bindParam(':usuario', $campos["usuario"]);
            $stmt->bindParam(':password', $campos["contrasenia"]);
            

            //ejecutamos la consulta
            if ($stmt->execute()==true){
                return true;
            } else {
                return false;
            }
            
            
        } catch (PDOException $ex) {
            echo "Error de conexion de la DB: " . $ex->getMessage();
        }
    }

    protected function rellenarCon($arreglo_datos) {
        foreach ($arreglo_datos as $k => $v) {
            $this->valores[$k] = $v;
        }
    }
    protected function validarRegistro() {
        $this->ProcesarPassRepe("contraseniaa");
        $this->ProcesarPass("contrasenia");
        $this->ProcesarUsuario("usuario");
    }
    protected function validar() {
        $this->ProcesarPass("contrasenia");
        $this->ProcesarUsuario("usuario");
    }

    public function eliminar($campo) {
        
    }

    public function getChecked($campo) {
        
    }

    public function getError($campo) {
        return $this->tieneError($campo) ? $this->errores[$campo] : null;
    }

    public function getSelected($campo, $valor_ref) {
        
    }

    public function getValor($campo) {
        return $this->tieneValor($campo) ? $this->valores[$campo] : null;
    }

    public function setError($campo, $mensaje) {
        $this->errores[$campo] = $mensaje;
    }

    public function tieneError($campo) {
        return !empty($this->errores[$campo]);
    }

    public function tieneErrores() {
        return !empty($this->errores);
    }

    public function tieneValor($campo) {
        return !empty($this->valores[$campo]);
    }
    public function procesarRegistro($arreglo_datos) {
        $this->rellenarCon($arreglo_datos);
        $this->validarRegistro();

        if (empty($this->errores)) {
            return $this->registrar($arreglo_datos);
            
        }
        return empty($this->errores);
    }
    public function procesar($arreglo_datos) {
        $this->rellenarCon($arreglo_datos);
        $this->validar();

        if (empty($this->errores)) {
            return $this->BuscarUsuario($arreglo_datos);
            
        }
        return empty($this->errores);
    }

    protected function ProcesarUsuario($campo) {
        $usuario = $this->getValor($campo);
        if (strlen($usuario) == 0) {
            $this->setError($campo, "El usuario es requerido");
        }
    }

    protected function ProcesarPass($campo) {
        $pass = $this->getValor($campo);
        if (strlen($pass) == 0) {
            $this->setError($campo, "La contraseña es requerida");
        }
    }

    public function ProcesarPassRepe($campo) {
        $pass = $this->getValor($campo);
        if (strlen($pass) == 0) {
            $this->setError($campo, "La contraseña es requerida");
        }
        if ($pass != $this->getValor('contrasenia')) {
            $this->setError($campo, "Las contraseñas deben coincidir");
        }
    }

}
