<?php require_once 'header.php' ?>

<?php
    if(isset($_GET['username'])){
        $username = $_GET['username'];


    }
    require_once 'db.php';
    $result = izvrsi_upit("SELECT * from user where username = ?;", "s", $username);
    $rows = $result->num_rows;

    echo  " <table class='table'>
<thead>
  <tr>
    <th scope='col'>#</th>
    <th scope='col'>Ime i Prezime</th>
    <th scope='col'>Adresa</th>
    <th scope='col'>Broj telefona</th>
  </tr>
</thead>
<tbody>
";
for($i=0;$i<$rows;++$i){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $adresa = $row['adresa'];
    $br_telefona=  $row['br_telefona'];

    echo " <tr>
    <th scope='row'></th>
    <td>$ime $prezime</td>
    
    <td>$adresa</td>
    <td>$br_telefona</td>
    <td><a class = 'btn btn-primary' href =pregled_zahteva_admin.php> Vrati se na pregled zahteva</a>   </td>
    </tr>
    ";
}
echo "</tbody>
        </table>";



?>
<?php require_once 'footer.php' ?>