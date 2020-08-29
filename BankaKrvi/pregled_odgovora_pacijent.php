<?php require_once 'header.php' ?>


<?php
    if(isset($_SESSION['korisnik'])){
        $korisnik = $_SESSION['korisnik'];
    }

    require_once 'db.php';
    $result = izvrsi_upit("SELECT * FROM zahtev where username = ?;","s", $korisnik);
    $rows  = $result->num_rows;
    echo  " <table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Krvna grupa</th>
        <th scope='col'>Kolicina</th>
        <th scope='col'>Odgovor</th>
      </tr>
    </thead>
    <tbody>
    ";
    for($i=0;$i<$rows;++$i){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $krvna_grupa = $row['krvna_grupa_zahteva'];
        $kolicina = $row['kolicina'];
        $odgovor = $row['odobreno'];
        if($odgovor == NULL){
          $odgovor = "u obradi";
        }
        echo " <tr>
        <th scope='row'>$i</th>
        <td>$krvna_grupa</td>
        
        <td>$kolicina</td>
        <td>$odgovor</td>
        
        </tr>
        ";
    }
    echo "</tbody>
        </table>";


?>
<?php require_once 'footer.php' ?>