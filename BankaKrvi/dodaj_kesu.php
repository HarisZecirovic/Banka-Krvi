<?php require_once 'header.php';
 ?>

<?php
$greska = "";
    if(isset($_POST['jmbg']) && isset($_POST['krv']) && isset($_POST['krvna_grupa'])){
        $jmbg_donatora = $_POST['jmbg'];
        $kolicina = $_POST['krv'];
        $krvna_grupa = $_POST['krvna_grupa'];

        try{
            require_once 'db.php';
            $result = izvrsi_upit("Select * from kesa where jmbg_donatora = '$jmbg_donatora'");
            
            $row = $result->fetch_assoc();
            // if($krvna_grupa != $row['krvna_grupa'])
            // throw new Exception("Krvna grupa se ne poklapa!");

            izvrsi_upit("INSERT INTO kesa(krvna_grupa,kolicina, jmbg_donatora) values(?,?,?);","sis",$krvna_grupa, $kolicina, $jmbg_donatora);
            echo" <script> alert('Uspesno ste dodali kesu') </script>";
        }catch (Exception $e) {
            $greska = $e->getMessage();

    
    }
}

?>
<div class="col-xs-12 col-md-6 col-lg-4 mt-5" style=" margin:auto;">
    <form action="dodaj_kesu.php" method="POST">
        <div class="form-group text-left mt-5">
            <label >Izaberite donatora</label>
            <select class="form-control" id="sel1" name="jmbg" required>
                <option value="" disabled selected>Izaberite</option>
                <?php
                require_once 'db.php';
                $result = izvrsi_upit("SELECT * from donator");
                $row = $result->num_rows;

                for ($i = 0; $i < $row; ++$i) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $ime = $row['ime'];
                    $prezime = $row['prezime'];
                    $jmbg = $row['jmbg'];
                    echo "<option value = '$jmbg'> $ime $prezime</option>";
                }



                ?>
            </select>
        </div>
        <div class="form-group text-left">
            <label>Kolicina donirane krvi (ml)</label>
            <input type="text" class="form-control" name="krv" required>
        </div>
        <div class="form-group text-left">
            <label>Izaberite krvnu grupu*</label>
            <select class="form-control" id="sel1" name="krvna_grupa" required>
                <option value="" disabled selected>Izaberite</option>
                <option value="a+">A+</option>
                <option value="a-">A-</option>
                <option value="b+">B+</option>
                <option value="b-">B-</option>
                <option value="ab+">AB+</option>
                <option value="ab-">AB-</option>
                <option value="o+">O(nulta)+</option>
                <option value="o-">O(nulta)-</option>
            </select>
        </div>
        <?php
        if ($greska != "")
            echo    '<div class="text-center">
                        <p class="text-center text-danger">' . $greska . '</p>
                    </div>';
        ?>
        <button type="submit" class="btn btn-success btn-lg">Unesi podatke</button>
    </form>

</div>

<?php require_once 'footer.php' ?>



