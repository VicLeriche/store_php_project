<?php 

include("init.php");

$dataForm = $_REQUEST;

$login = $usr->loginUser($dataForm["email"], $dataForm["password"]);
if ($login) {
    header('location: ../');
} else {
    $_SESSION['message']['error'] = "Email ou mot de passe incorrect";
    header('location: ../?p=client');
}

include("close.php");

?>