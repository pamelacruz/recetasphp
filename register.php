<?php
include 'core/cors.php';
include 'core/connect.php';
include 'core/funciones.php';

$JSONData = file_get_contents("php://input");
$object = json_decode($JSONData);
$firstName = $object->firstName; 
$lastName = $object->lastName;
$email = $object->email;
$password = $object->password;
$confirmPassword = $object->confirmPassword;
$Id = $object->Id;
$action = $object->action;

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

if ($action == "add") {
    if ($password !== $confirmPassword) {
        echo json_encode([
            'message' => 'Password no coincide'
        ]);
        exit;
    }
    $password = sha1($password);
    $Sql = "insert into users (firstName, lastName, email, password) values('$firstName', '$lastName', '$email', '$password'); ";
} 
if ($action == "edit") {
    $PassVal = '';
    if (!empty($password)) {
        if ($password !== $confirmPassword) {
            echo json_encode([
                'message' => 'Password no coincide'
            ]);
            exit;
        }
        $password = sha1($password);
        $PassVal = "password='$password'";
    }
    $Sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', email='$email' $PassVal WHERE iduser='$Id';";
}
$res = query($Sql);

echo json_encode([
    'message' => 'success',
    'user' => array()
]);
exit;


