<?php
require_once 'functions.php';
session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href = "style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <title>Banka Krvi</title>
    
  </head>
  <body>
  <div class = "haris">
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#startupNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <a class="navbar-brand" href="#"> <img src="slike/logo.png" alt="startup.logo" height = "40"></a>
  <div class="collapse navbar-collapse" id="startupNavbar">
    
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="indeks.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="o_nama.php">O nama</a>
      </li>
      
      
      <?php 
       
       

        // if (isset($_SESSION["tip_korisnika"]) && $_SESSION["tip_korisnika"] == "admin") {
          
        //   echo '<li class="nav-item">
        //           <a class="nav-link" href="dodaj_donatora.php">Admin</a>
        //         </li>';
        // }
        // if(isset($_SESSION["korisnik"])){
        //   $k = $_SESSION["korisnik"];
        //   echo <<<_END
          
        //    <li class = 'nav-item'> <a class = 'btn btn-primary' href = 'odjavi_se.php' onclick = 'alert('Odjavili ste se')'> Odjavi se </a>
          
        //   _END;
        // }
        // else{
        //   echo  '<li class="nav-item"><a class="btn btn-primary" href="login.php">Prijavi se</a></li>';
      
        // }

         if(isset($_SESSION["korisnik"])){
           
        
         if(isset($_SESSION['tip_korisnika']) && $_SESSION['tip_korisnika'] == 'admin'){
           echo <<<_LOGGEDIN
           <li class="nav-item dropdown ml-auto">
           <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
           <div class="dropdown-menu dropdown-menu-right">
               <a href="dodaj_donatora.php" class="dropdown-item">Dodaj donatora</a>
               <a href="dodaj_kesu.php" class="dropdown-item">Dodaj kesu</a>
               <a href="pretrazi.php" class="dropdown-item">Pretrazi</a>
               <a href="promeni_podatke.php" class="dropdown-item">Promeni podatke</a>
               <a href="ukupno.php" class="dropdown-item">Ukupno zaliha</a>
               <a href="pretrazi_pacijente.php" class="dropdown-item">Pacijenti</a>
               <a href="pregled_zahteva_admin.php" class="dropdown-item">Pogledaj zahteve</a>
               <div class="dropdown-divider"></div>
               <a href="odjavi_se.php"class="dropdown-item">Odjavi se</a>
           </div>
       </li>
       _LOGGEDIN;
         }
         else if(isset($_SESSION['tip_korisnika']) && $_SESSION['tip_korisnika'] == 'pacijent'){
           $k = $_SESSION['korisnik'];
          echo <<<_LOGGEDIN
          <li class="nav-item dropdown ml-auto">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">$k</a>
          <div class="dropdown-menu dropdown-menu-right">
              <a href="promeni_podatke_pacijent.php" class="dropdown-item">Promeni podatke</a>
              <a href="proveri_primanja.php" class="dropdown-item">Proveri primanja</a>
              <a href="slanje_zahteva_pacijent.php" class="dropdown-item">Posalji zahtev</a>
              <a href="pregled_odgovora_pacijent.php" class="dropdown-item">Pogledaj odgovore</a>
              <div class="dropdown-divider"></div>
              <a href="odjavi_se.php"class="dropdown-item">Odjavi se</a>
          </div>
      </li>
      _LOGGEDIN;
         }
        }
       
       else{
         echo  '<li class="nav-item"><a class="btn btn-primary " href="login.php">Prijavi se</a></li>';

       }
       
      
      ?>
    </ul>
    
  </div>
</nav>

<div style="flex:1;">
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  
  
  