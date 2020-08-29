<?php require_once 'header.php';
$id_kese = ""; $kolicina = "";?>

<?php
    

    if(isset($_POST['kolicina_krvi']) && isset($_POST['id_kese']) && isset($_POST['kolicina'])){
        $kolicina_krvi = $_POST['kolicina_krvi'];
        $kolicina = $_POST['kolicina'];
        $id_kese = $_POST['id_kese'];
        require_once "db.php";
    $rezultat = $kolicina- $kolicina_krvi;
        if($kolicina_krvi>$kolicina){
            echo" <script> alert('Uneli ste nemogucu cifru') </script>";
        }
        else if($rezultat == 0){
            izvrsi_upit("DELETE FROM kesa where id_kese = '$id_kese'");
            echo" <script> alert('Uspesno ste promenili podatke') </script>";
        }
   else{ 
       izvrsi_upit("UPDATE kesa SET kolicina = '$rezultat' where id_kese = '$id_kese'");
    echo" <script> alert('Uspesno ste promenili podatke') </script>";
   }
        
    }
    

    if (isset($_GET["id_kese"]))
    {
       global $id_kese;
        
       $id_kese = $_GET["id_kese"];
       
       
    }
    require_once "db.php";
    
    $result = izvrsi_upit("SELECT * from kesa where id_kese = ?;", 'i', $id_kese);
    
    $row = $result->fetch_array(MYSQLI_ASSOC);
    global $kolicina;
    $kolicina = $row['kolicina'];

    echo " <div class='text-center col-xs-12 col-md-6 col-lg-4 mt-5' style=' margin:auto;'>
    <h1>Izmena</h1><br>
    <form action='promeni_kesu.php' method='POST'>
        <div class='form-group text-left'>
            <input type = 'hidden' name = 'id_kese' value = '$id_kese'>
            <input type = 'hidden' name = 'kolicina' value = '$kolicina'>

            <label>Unesite kolicinu(ml) koju zelite da oduzmete</label>
            <input type='text' class='form-control' name='kolicina_krvi' autofocus>
        </div>
        <button type='submit' class='btn btn-primary'>Potvrdi</button>
        <div class= 'mt-5'>
        <a href = 'pretrazi.php'> Zelite li da ponovo menjate? </a>
        </div>
        </form>
        </div>";

?>
<?php require_once 'footer.php' ?>