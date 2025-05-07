<?php
require_once('database.class.php');
class user
{
    public static function getUserbycode($code)
    {
        $db = new Database();
        $conexion = $db->getConnection();
        $query = "SELECT * FROM usuarios WHERE codigo = :code";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':code', $code);
        if ($stmt->execute()) {

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                header("HTTP/1.1 200 OK");
                header('Content-Type: application/json');
                echo json_encode([
                    "success" => true,
                    "resultado" => $result
                ]);
            } else {
                header("HTTP/1.1 404 Not Found");
                echo json_encode(["error" => "Usuario no encontrado"]);
            }
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(["error" => "Error en la consulta"]);
        }
    }
}
