<?php
include 'core/cors.php';
include 'core/connect.php';
include 'core/funciones.php';

$headers = getallheaders();
$token = str_replace('Bearer ', '', trim($headers['Authorization']));

if (!isset($token)) {
    echo json_encode([
        'message' => 'Usuario incorrecto'
    ]);
    exit;
}

$query = "SELECT * FROM tokens WHERE token = '$token'";
$resultado = oneRow($query);
if (!isset($resultado['users_id'])) {
    echo json_encode([
        'message' => 'Token no encontrado'
    ]);
    exit;
}
$tokenData = $resultado;

$query = "SELECT * FROM users WHERE iduser = ".$tokenData['users_id'];
$resultado = oneRow($query);
if (!isset($resultado['iduser'])) {
    echo json_encode([
        'message' => 'Usuario no encontrado'
    ]);
    exit;
}


echo json_encode([
    'message' => 'success',
    'user' => $resultado
]);