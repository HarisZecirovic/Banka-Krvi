<?php require_once 'header.php' ?>
<?php 
    if(isset($_POST['odobri']) && isset($_POST['id_zahteva'])){
        $id_zahteva = $_POST['id_zahteva'];
        require_once 'db.php';
        izvrsi_upit("UPDATE zahtev SET odobreno = 'odobreno' where id_zahteva = ?;", 'i', $id_zahteva);

    }
    else if(isset($_POST['odbij']) && isset($_POST['id_zahteva'])){
        $id_zahteva = $_POST['id_zahteva'];
        require_once 'db.php';
        //izvrsi_upit("UPDATE zahtev SET odobreno = 'nije odobreno' where id_zahteva = '$id_zahteva' ");
        izvrsi_upit("UPDATE zahtev  SET odobreno = 'nije odobreno' where id_zahteva = ? ;" , 'i', $id_zahteva);

    }

?>

<?php
require_once 'db.php';

$result = izvrsi_upit("SELECT * FROM zahtev  JOIN user ON zahtev.username = user.username where odobreno is NULL");
//$result .= izvrsi_upit("SELECT * FROM user JOIN zahtev ON user.username = zahtev.usernama where user.username = zahtev.username");
$rows = $result->num_rows;
echo  " <table class='table mr-5 ml-5 mt-5'>
<thead>
  <tr>
    <th scope='col'>#</th>
    <th scope='col'>Ime i Prezime</th>
    <th scope='col'>Kolicina</th>
    <th scope='col'>Krvna grupa</th>
  </tr>
</thead>
<tbody>
";
for ($i = 0; $i < $rows; ++$i) {

    $row = $result->fetch_array(MYSQLI_ASSOC);
    $id_zahteva = $row['id_zahteva'];
    $username = $row['username'];
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $kolicina = $row['kolicina'];
    $krvna_grupa = $row['krvna_grupa_zahteva'];
    echo " <tr>
    <th scope='row'>$i</th>
    <td>$ime $prezime</td>
    
    <td>$kolicina</td>
    <td>$krvna_grupa</td>
    <form action='pregled_zahteva_admin.php' method='POST'>
    <td>
    <input type = 'submit' name = 'odobri' value = 'Odobri' class = 'btn btn-danger'>
    <input type = 'hidden' name = 'id_zahteva' value = '$id_zahteva'>
    </td>
    <td>
    <input type = 'submit' name = 'odbij' value = 'Odbij' class = 'btn btn-danger'>
    </td>
    
    <td><a class = 'btn btn-outline-info' href ='pregled_podatke_pacijenta.php?username=$username'> pregledaj podatke</a>   </td>
    >
    </form>
  </tr>
    ";
}
echo "</tbody>
        </table>";


?>
<?php require_once 'footer.php' ?>