<?php

//hacemos la conexión con mysql
$servername = "localhost";
$username = "username";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
}

$usuario = $_POST['nombre'];
$contrasenia = $_POST['pass'];

if ($_POST['registro']) {

    $consulta = $conn->query("SELECT USUARIO from usuarios WHEN usuario=$usuario ");

    $conn->query("INSERT INTO usuarios values($usuario,$contrasenia)");

    if ($conn->exec($consulta) == 0) {

        header('location:index.html');
    } else {

        //header('location:indexerror.html');

    }
}

if ($_POST['login']) {

    $sql = $conn->query(("SELECT * FROM usuarios WHERE usuario=$usuario and contrasenia=$contrasenia"));
    
    if ($conn->exec($sql) == 0) {

        //header('location:indexerror.html');

    } else {

        //header('location:_____.html');
    }
}
