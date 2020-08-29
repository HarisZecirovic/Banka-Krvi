
    
  <?php require_once "header.php" ; ?>
    

<?php
  session_start();
  // if(isset($_SESSION['korisnik'])){
  // echo "<div id='stage'>
  //     <div id='stage-caption'>
  //       <h1 class = 'display-3'>Dobro dosli u nasu banku!</h1>
  //       <p></p>
       
  //     </div>
  // </div>";
  // }
  // else{
  //   echo "<div id='stage'>
  //     <div id='stage-caption'>
  //       <h1 class = 'display-3'>Prijavite se za jos mogucnosti</h1>
  //       <p></p>
  //       <a href='login.php' class = 'btn btn-lg btn-success'>Prijavite se</a>
  //     </div>
  // </div>";

  // }
  
  ?>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/hearthand.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/chalkboard.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/programming.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  
  <section id="feature-one">
    <div class="container">
      <div class="row mt-5">
        
          <div class="col-lg-6">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/qcZKbjYyOfE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="col-lg-5 col-lg-offset-1">
            <h6>Pogledajte</h6>
            <h2>Za pristup svim funkcijama prijavite se</h2>
            <p class = "lead">Svrha ovog projekta pod nazivom “Banka Krvi” jeste razvijanje  web aplikacije koja je jednostavna za upotrebu, brza i isplativa. Ona se bavi prikupljanjem informacija o davaocima krvi, detaljima njihove dijagnoze itd. Nekada se to radilo ručno, a danas ovakav tip aplikacije olakšava ceo process. Glavna funkcija ove aplikacije je registrovanje i čuvanje podataka o donatorima i doniranoj krvi, kao i pacijentima kojima je potrebna krv</p>
             
          </div>
          
      </div>
    </div>
  </section>
  
  

  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php require_once 'footer.php' ?>
    
      
   
 