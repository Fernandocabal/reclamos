<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");
require_once('../include/user.class.php');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['code']) && !empty($_GET['code'])) {
        user::getUserbycode($_GET['code']);
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["error" => "Código de usuario no proporcionado"]);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(["error" => "Método no permitido"]);
}
