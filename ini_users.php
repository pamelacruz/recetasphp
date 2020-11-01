<?php
include 'core/connect.php';
include 'core/funciones.php';

$firstName = 'pamela';
$lastName = 'cruz';
$email = 'pamela.cruzm94@gmail.com';
$password = 'password';

$password = sha1($password);

$insert = "insert into users (firstName, lastName, email, password) values('$firstName', '$lastName', '$email', '$password'); ";
$res = query($insert);

echo "Usuarios<br><br><br>";
echo "user:pamela.cruzm94@gmail.com<br>";
echo "password:password<br><br>";

$firstName = 'pedro';
$lastName = 'lopez';
$email = 'pedro@gmail.com';
$password = 'password';

$password = sha1($password);

$insert = "insert into users (firstName, lastName, email, password) values('$firstName', '$lastName', '$email', '$password'); ";
$res = query($insert);

echo "user:pedro@gmail.com<br>";
echo "password:password<br><br>";

$firstName = 'catherine';
$lastName = 'santos';
$email = 'catherine@gmail.com';
$password = 'password';

$password = sha1($password);

$insert = "insert into users (firstName, lastName, email, password) values('$firstName', '$lastName', '$email', '$password'); ";
$res = query($insert);

echo "user:catherine@gmail.com<br>";
echo "password:password<br><br>";

$firstName = 'andrea';
$lastName = 'cruz';
$email = 'andrea@gmail.com';
$password = 'password';

$password = sha1($password);

$insert = "insert into users (firstName, lastName, email, password) values('$firstName', '$lastName', '$email', '$password'); ";
$res = query($insert);

echo "user:andrea@gmail.com<br>";
echo "password:password<br><br>";


