<?php require_once "header.php";  $id_kese = ""; $kolicina= "";?>

<?php
    if(isset($_POST['ime']) && isset($_POST['krv'])  && isset($_POST['id_kese']) && isset($_POST['datum']) && isset($_POST['kolicina'])){
        
        $username = $_POST['ime'];
        $kolicina_krvi = $_POST['krv'];
        $id_kese = $_POST['id_kese'];
        $datum = $_POST['datum'];
        $kolicina= $_POST['kolicina'];

        
        require_once 'db.php';
       

//         $rezultat = $kolicina- $kolicina_krvi;
//         if($kolicina_krvi>$kolicina){
//             echo" <script> alert('Uneli ste nemogucu cifru') </script>";
//         }
//         else if($rezultat == 0){
//             izvrsi_upit("DELETE FROM kesa where id_kese = '$id_kese'");
//             echo" <script> alert('Uspesno ste promenili podatke') </script>";
//         }
//    else{ 
//        izvrsi_upit("UPDATE kesa SET kolicina = '$rezultat' where id_kese = '$id_kese'");
//     echo" <script> alert('Uspesno ste promenili podatke') </script>";
//    }
    izvrsi_upit("INSERT INTO sta_prima(username,id_kese, datum,kolicina) values(?,?,?,?);","sdsd",$username, $id_kese, $datum,$kolicina_krvi);
   //izvrsi_upit("INSERT INTO sta_prima(username,id_kese, datum, kolicina) values($username,$id_kese,$datum,$kolicina_krvi)");

   $rezultat = $kolicina- $kolicina_krvi;
        if($kolicina_krvi>$kolicina){
            echo" <script> alert('Uneli ste nemogucu cifru') </script>";
        }
        // else if($rezultat == 0){
        //     izvrsi_upit("DELETE FROM kesa where id_kese = '$id_kese'");
        //     echo" <script> alert('Uspesno ste promenili podatke') </script>";
        // }
   else{ 
       //izvrsi_upit("UPDATE kesa SET kolicina = '$rezultat' where id_kese = '$id_kese'");
       izvrsi_upit("UPDATE kesa SET kolicina = ? where id_kese = ?;", "ii",$rezultat,$id_kese);
    echo" <script> alert('Uspesno ste dodali kesu') </script>";
   }
        
    
    }

    if(isset($_GET["id_kese"]) && isset($_GET["kolicina"])){
        
        $id_kese = $_GET['id_kese'];
        $kolicina = $_GET['kolicina'];
    }
echo "
<div class='col-xs-12 col-md-6 col-lg-4 mt-5' style=' margin:auto;'>
    <form action='dodaj_krv.php' method='POST'>
        <div class='form-group text-left mt-5'>
            <label >Izaberite pacijenta</label>
            <select class='form-control' id='sel1' name='ime' required>
                <option value='' disabled selected>Izaberite</option>";
                
                require_once 'db.php';
                $result = izvrsi_upit("SELECT * from user where tip = 'pacijent'");
                $row = $result->num_rows;

                for ($i = 0; $i < $row; ++$i) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $username = $row['username'];
                    $ime = $row['ime'];
                    $prezime = $row['prezime'];
                    
                    
                    echo "<option value = '$username'> $ime $prezime</option>";
                }



         echo "       
            </select>
        </div>
        <div class='form-group text-left'>
            <label>Kolicina krvi (ml)</label>
            
            <input type = 'hidden' value = '$id_kese' name = 'id_kese'>
            <input type = 'hidden' value = '$kolicina' name = 'kolicina'>
            <input type='text' class='form-control' name='krv' required>
            
        </div>
        <div class='form-group text-left'>
            <label>Unesite datum</label>
            
            <input type='text' class='form-control' name='datum' required>
            
        </div>
        
      ";
        
       
           
        echo "
        <button type='submit' class='btn btn-primary btn-lg'>Unesi podatke</button>
        <div class= 'mt-5'>
        <a href = 'pretrazi.php'> Zelite li da ponovo da dodate krv? </a>
        </div>
    </form>

</div>
";
?>
<?php require_once 'footer.php' ?>