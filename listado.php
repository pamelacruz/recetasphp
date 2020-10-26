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

$Info = array();
$query = "SELECT * FROM users";
$Rows = makequery($query);
foreach ($Rows as $row) {
    $Info[] = array(
        'id' => $row['iduser'],
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'email' => $row['email'],
    );
}


echo json_encode([
    'message' => 'success',
    'user' => $Info
]);