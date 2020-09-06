<?php
include 'core/cors.php';
include 'core/connect.php';
include 'core/funciones.php';

$JSONData = file_get_contents("php://input");
$object = json_decode($JSONData);

if (!isset($object->email)) {
    echo json_encode([
        'message' => 'Usuario incorrecto'
    ]);
    exit;
}

if (!isset($object->password)) {
    echo json_encode([
        'message' => 'Password incorrecto'
    ]);
    exit;
}

$email = $object->email;
$password = sha1($object->password);

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$resultado = oneRow($query);
if (!isset($resultado['iduser'])) {
    echo json_encode([
        'message' => 'Usuario no encontrado'
    ]);
    exit;
}
$user = $resultado;
$resultado = null;

$queryusuarios = "SELECT users_id FROM tokens WHERE users_id = '".$user['iduser']."'";
$resultadousuarios = oneRow($queryusuarios);
if (isset($resultadousuarios['users_id'])) {
    $token = time();
    $token = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($token));
    $insert = "update tokens set token = '$token' WHERE users_id = ".$resultadousuarios['users_id'];
    $res = query($insert);

    echo json_encode([
        'message' => 'success',
        'token' => $token,
        'user' => $user
    ]);
    exit;
}

$token = time();
$token = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($token));
$insert = "insert into tokens (users_id, token) values('".$user['iduser']."', $token); ";
$res = query($insert);

echo json_encode([
    'message' => 'success',
    'token' => $token,
    'user' => $user
]);
