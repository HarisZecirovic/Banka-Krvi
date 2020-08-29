<?php require_once 'header.php' ?>

<script src="tabela.js"> </script>
<a class="btn btn-primary float-right mt-5 mr-5" href="pretrazi_pacijente.php">Povratak na pregled</a>
<div class="container">
  <input class="form-control mb-4 mt-5" id="tableSearch" type="text"
    placeholder="Ukucajte datum">

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        
        <th>Kolicina (ml)</th>
        <th>Datum</th>
        <th>Krvna grupa </th>
      </tr>
    </thead>
    <tbody id="myTable">
<?php
if(isset($_GET['username'])){
    $username = $_GET['username'];

}
require_once "db.php";
        
            //$result = izvrsi_upit("SELECT * FROM sta_prima JOIN kesa ON sta_prima.id_kese = kesa.id_kese join user on user.username= sta_prima.username where user.username = '$korisnik'");
            $result = izvrsi_upit("SELECT * FROM kesa JOIN sta_prima ON kesa.id_kese = sta_prima.id_kese where sta_prima.username = ?;", "s", $username);
            
            $rows = $result->num_rows;

            for($i = 0; $i < $rows; ++$i){
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $krvna_grupa = $row['krvna_grupa'];
                //$ime = $row['ime'];
                //$prezime = $row['prezime'];
                $kolicina = $row['kolicina'];
                $datum= $row['datum'];
                //$krvna_grupa = $row['krvna_grupa'];

                echo <<<_LOGGEDIN
                <tr>
                
                <td>$kolicina</td>
                <td>$datum</td>
                <td>$krvna_grupa</td>
              </tr>
              _LOGGEDIN;
            }
        
        ?>
      
    </tbody>
  </table>
</div>


?>





<?php require_once "footer.php" ?>