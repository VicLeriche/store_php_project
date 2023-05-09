<?php 
    if(!($_SESSION["usr_id"] && isset($_SESSION["usr_id"]))){
        header('location: ?p=client');
    } else {
        header('location: controllers/purchase.php');
    }
?>
