<?php require_once "header.php"; ?>
<?php 
  if(isset($_POST['username'])){
      $username = $_POST['username'];
      require_once 'db.php';
      izvrsi_upit("DELETE FROM user where username = '$username'");
      echo" <script> alert('Uspesno ste izbrisali pacijenta') </script>";
      
  }

?>
<script src="tabela.js"> </script>
<a class="btn btn-primary float-right mt-5 mr-5" href="dodaj_pacijenta.php">Dodaj pacijenta</a>
<div class="container">

  <input class="form-control mb-4 mt-5" id="tableSearch" type="text"
    placeholder="Ukucajte ime">
   
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Ime i prezime</th>
        <th>Adresa</th>
        <th>Broj telefona</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
        <?php
        require_once "db.php";
        
            $result = izvrsi_upit("SELECT * from user where tip = 'pacijent'");

            $rows = $result->num_rows;

            for($i = 0; $i < $rows; ++$i){
                $row = $result->fetch_array(MYSQLI_ASSOC);
               
                $username = $row['username'];
                $ime = $row['ime'];
                $prezime = $row['prezime'];
                $adresa = $row['adresa'];
                $grad = $row['grad'];
                $telefon = $row['br_telefona'];    
                
                
               // $jmbg_donatora = $row['jmbg_donatora'];
               echo " <form action = 'pretrazi_pacijente.php' method = 'post'>";
                echo <<<_LOGGEDIN
                <tr>
                <td>$ime $prezime</td>
                <td>$adresa $grad</td>
                <td>$telefon </td>
                
                
                <td><a class = 'btn btn-info' href =proveri_primanja_admin.php?username=$username>Primanja</a>   </td>
                <td>  
                <input type = 'hidden' name = 'username' value = '$username'>
                <button type='submit' class='btn btn-danger'>Izbrisi</button></form>  </td>
              </tr>
              _LOGGEDIN;
            }
        
        ?>
      
    </tbody>
  </table>
</div>







<?php require_once 'footer.php'; ?>