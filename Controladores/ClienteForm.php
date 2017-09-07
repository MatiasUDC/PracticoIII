<?php

require '../Form.php';
require_once __DIR__ . '/../bibliotecas/conexion.php';

class ClienteForm extends Form {

    //categorias del tag <select>
    public $localidad;
    protected $errores = [];
    protected $valores = [];

    public function __construct() {
        $this->localidad = $this->nacionalidades();
    }

    public function tieneValor($campo) {
        return !empty($this->valores[$campo]);
    }

    public function getValor($campo) {
        return $this->tieneValor($campo) ? $this->valores[$campo] : null;
    }

    public function tieneErrores() {
        return !empty($this->errores);
    }

    public function tieneError($campo) {
        return !empty($this->errores[$campo]);
    }

    public function getError($campo) {
        return $this->tieneError($campo) ? $this->errores[$campo] : null;
    }

    public function setError($campo, $mensaje) {
        $this->errores[$campo] = $mensaje;
    }

    public function procesar($arreglo_datos) {
        $this->rellenarCon($arreglo_datos);
        $this->validar();

        
        if(empty($this->errores)){
           $this->Registrar();
        }
        return empty($this->errores);
    }

    public function getChecked($campo) {
        return $this->getValor($campo) ? "checked" : "";
    }

    public function getSelected($campo, $valor_ref) {
        return $this->getValor($campo) == $valor_ref ? "selected" : "";
    }

    protected function rellenarCon($arreglo_datos) {
        foreach ($arreglo_datos as $k => $v) {
            $this->valores[$k] = $v;
        }
    }

    protected function validar() {
        $this->procesarNombre('nombre');
        $this->procesarApellido('apellido');
        $this->procesarFecha('fecha');
        $this->procesarLocalidad('localidad');
        $this->procesarCheck('activo');
    }

    protected function nacionalidades() {
        try {
            $pdo = getConnection();
            //sql
            $sql = "SELECT id, nacionalidad "
                    . "FROM nacionalidades";

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

    protected function procesarNombre($campo) {
        $nombre = $this->getValor($campo);

        //valido parametro
        if (empty($nombre)) {
            $this->setError($campo, "Faltó ingresar el Nombre");
            return; //si hay error, no seguir validando
        }

        //otra validacion
        if (strlen($nombre) < 2) {
            $this->setError($campo, "El nombre es muy corto");
        }

        //otra validacion
        if ($nombre == $this->getValor('apellido')) {
            $this->setError($campo, "El nombre no puede ser igual al apellido");
        }
        if (!ctype_alpha($nombre)) {
            $this->setError($campo, "El nombre no puede contener numeros");
        }
    }
    protected function procesarCheck($campo){
        if($this->getChecked($campo)){
            $this->$valores["activo"]=1;
        } else {
            $this->$valores["activo"]=0;
        }
    }

    protected function procesarApellido($campo) {
        $apellido = $this->getValor($campo);

        //valido parametro
        if (empty($apellido)) {
            $this->setError($campo, "Faltó ingresar el apellido de la persona");
            return; //si hay error, no seguir validando
        }

        //otra validacion
        if (strlen($apellido) < 2) {
            $this->setError($campo, "El apellido es muy corto");
        }

        //otra validacion
        if ($apellido == $this->getValor('nombre')) {
            $this->setError($campo, "El apellido no puede ser igual al nombre");
        }
        if (!ctype_alpha($apellido)) {
            $this->setError($campo, "El apellido no puede contener numeros");
        }
    }

    protected function procesarFecha($campo) {
        $fecha = $this->getValor($campo);

        //valido parametro
        if (empty($fecha)) {
            $this->setError($campo, "Faltó ingresar la fecha de nacimiento");
            return;
        }


        $fecha = str_replace('/', '-', $fecha);  //see explanation below for this replacement
        if (!is_numeric(strtotime($fecha))) {
            $this->setError($campo, "El valor ingresado no es un valor aceptable");
            return;
        }
    }

    protected function procesarLocalidad($campo) {
        $localidad = $this->getValor($campo);

        //valido parametro
        if (empty($localidad)) {
            $this->setError($campo, "Falta seleccionar la Localidad");
        }
    }

    protected function Registrar() {
        $campos = $this->valores;
        
        if($this->getChecked($campos["activo"])){
            $campos["activo"]=1;
        } else {
            $campos["activo"]=0;
        }
        
        try {
            $pdo = getConnection();
            $sql = "INSERT INTO "
                    . "clientes"
                    . "(apellido,nombre,fecha_nacimiento,activo,nacionalidad_id)"
                    . "VALUES"
                    . "(:apellido,:nombre,:fecha ,:activo,:nacionalidad)";


            $stmt = $pdo->prepare($sql);

            //especid¿ficamos la salida como un array
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            //sustituir los parametros por los valores reales
            $stmt->bindParam(':apellido', $campos["nombre"]);
            $stmt->bindParam(':nombre', $campos["apellido"]);
            $stmt->bindParam(':fecha', str_replace('/', '-', $campos["fecha"]));
            $stmt->bindParam(':activo', $campos["activo"]);
            $stmt->bindParam(':nacionalidad', $campos["localidad"]);


            //ejecutamos la consulta
            $stmt->execute();
        } catch (PDOException $ex) {
            echo "Error de conexion de la DB: " . $ex->getMessage();
        }
    }

    public function eliminar($campo) {
        
    }

    protected function modificar() {
        
    }

}
