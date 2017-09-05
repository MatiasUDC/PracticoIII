<?php
function getConnection()
{
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=clientes_db', 'root', ''
        );
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");

        return $pdo;
    } catch (PDOException $e) {
        die('Error de conexion de la DB: ' . $e->getMessage());
    }
}
