<?php
include 'core/cors.php';
include 'core/connect.php';
include 'core/funciones.php';

$JSONData = file_get_contents("php://input");
$object = json_decode($JSONData);
$firstName = $object->first_name; 
$lastName = $object->last_name;
$email = $object->email;
$password = $object->password;
$password_confirm = $object->password_confirm;

if (!isset($firstName)) {
    echo json_encode([
        'message' => 'Nombre de usuario vacio'
    ]);
    exit;
}

if (!isset($email)) {
    echo json_encode([
        'message' => 'Email vacio'
    ]);
    exit;
}

if ($password !== $password_confirm) {
    echo json_encode([
        'message' => 'Password no coincide'
    ]);
    exit;
}

$password = sha1($password);
$insert = "insert into users (first_name, last_name, email, password) values('$firstName', '$lastName', '$email', '$password'); ";
$res = query($insert);

echo json_encode([
    'message' => 'success',
    'user' => array()
]);
exit;


