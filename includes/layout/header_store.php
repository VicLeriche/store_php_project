<?php 
$products = $prod->getAllProducts();
$user = NULL;
if(isset($_SESSION['usr_id'])){
  $user = $usr->infoUser($_SESSION['usr_id']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Store</title>
    
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/main.css" rel="stylesheet">
  </head>
  <body>
    
<header class="site-header sticky-top py-3">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="?p=home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img class="bi me-2" width="90" src="assets/img/logo.png" alt="">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 m-2">
        <li><a href="?p=home" class="nav-link px-2 link-secondary">Accueil</a></li>
        <li><a href="?p=products" class="nav-link px-2 link-dark">Produits</a></li>
        <li><a href="?p=new" class="nav-link px-2 link-dark">Nouveautés</a></li>
        <li><a href="?p=contact" class="nav-link px-2 link-dark">Contacts</a></li>
      </ul>

      <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-4 position-relative">
        <a href="#" class="cart">
          <em class="fa-solid fa-cart-shopping"></em>
        </a>

        <div class="count-articles-cart position-absolute" id="count-articles-cart"></div>
        
        <div class="position-absolute cart-shopping" id="cart">
          <div class="card" id="card"></div>
        </div>

      </div>

      <?php if($_SESSION["usr_id"] && isset($_SESSION["usr_id"])){ ?>
      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="#"><strong>Bervic Mbouaka</strong></a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="?p=orders"><i class="fa-solid fa-file"></i> Voir mes commandes</a></li>
          <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="controllers/logout.php"><i class="fa-solid fa-power-off"></i> Déconnexion</a></li>
        </ul>
      </div>
      <?php } else { ?>
        <span class="px-2">|</span>
        <a href="?p=client" class="d-block link-dark text-decoration-none">
          <i class="fa fa-user"></i> espace client
        </a>
      <?php } ?>

    </div>
  </div>
</header>