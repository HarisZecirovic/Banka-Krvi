<?php require_once "header.php"; ?>

<?php
    if(isset($_POST['ime'])&& isset($_POST['prezime']) && isset($_POST['adresa']) && isset($_POST['telefon']) && isset($_POST['grad']) && isset($_POST['jmbg'])){

        $ime1 = $_POST['ime'];
        $prezime1= $_POST['prezime'];
        $adresa1 = $_POST['adresa'];
        $telefon1 = $_POST['telefon'];
        $grad1 = $_POST['grad'];
        $jmbg1= $_POST['jmbg'];

        require_once "db.php";
        //izvrsi_upit("UPDATE donator SET jmbg='$jmbg1', ime = '$ime1' , prezime = '$prezime1', adresa = '$adresa1', br_telefona = '$telefon1', grad = '$grad1' where jmbg='$jmbg1'");
        izvrsi_upit("UPDATE donator SET jmbg= ? , ime = ? , prezime = ?, adresa = ?, br_telefona = ? , grad = ? where jmbg=?;","sssssss",$jmbg1,$ime1,$prezime1,$adresa1,$telefon1,$grad1,$jmbg1 );
       
       
        
        header("Location:uspesno_promenjeni_podaci.php");

    }

?>
<?php
      if (isset($_GET["jmbg"]))
         {
            $jmbg = $_GET["jmbg"];
            
            
         }

         require_once 'db.php';

         $result= izvrsi_upit("SELECT * FROM donator where jmbg = ?;", "s", $jmbg);
         $row = $result->num_rows;
         $row = $result->fetch_array(MYSQLI_ASSOC);
            $ime = $row['ime'];
            $prezime = $row['prezime'];
            $adresa = $row['adresa'];
            $telefon = $row['br_telefona'];
            $grad = $row['grad'];

        echo " <div class='text-center col-xs-12 col-md-6 col-lg-4 mt-5' style=' margin:auto;'>
            <h1>Promenite podatke ako zelite</h1><br>
            <form action='promeni_donatora.php' method='POST'>
                <div class='form-group text-left'>";
         
        
            
            
            echo "
                
                    <label>Ime</label>
                    <input type='text' class='form-control' name='ime' autofocus value = '$ime'>
                </div>
                <div class='form-group text-left'>
                    <label>Prezime</label>
                    <input type='text' class='form-control' name='prezime' value = '$prezime'>
                </div>
                <div class='form-group text-left'>
                    <label>Adresa</label>
                    <input type='text' class='form-control' name='adresa'value = '$adresa'>
                </div>
                <div class='form-group text-left'>
                    <label>Broj Telefona</label>
                    <input type='text' class='form-control' name='telefon'value = '$telefon'>
                </div>
                <div class='form-group text-left'>
                    <label>Grad</label>
                    <input type='text' class='form-control' name='grad'value = '$grad'>
                </div>
                <div class='form-group text-left'>
                    <label>JMBG*</label>
                    <input type='text' class='form-control' name='jmbg' required value = '$jmbg'>
                </div>
                
            ";

            echo " <button type='submit' class='btn btn-outline-success btn-lg btn-block'>Potvrdi</button>
         </form>
         
     </div>";
         
        
         
   ?>
   <?php require_once 'footer.php' ?>