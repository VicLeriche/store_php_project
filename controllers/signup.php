<?php  
include("init.php");

$dataForm = $_REQUEST;
if (!$cmn->verifMail($dataForm["email"])) {
    $_SESSION['message']['error'] = "Le format de votre mail est incorrecte";
}else {
    $create = $usr->createUser($dataForm);
    if (!$create) {
        $_SESSION['message']['error'] = "Email ou téléphone déjà utilisé";       
    } else {
        $_SESSION['message']['success'] = "Compte créé avec succès";       
    }

}
header('location: ../?p=client');

include("close.php");
?>