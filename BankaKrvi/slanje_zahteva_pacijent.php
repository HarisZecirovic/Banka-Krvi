<?php require_once "header.php"; ?>

<?php
$greska = "";
    if(isset($_POST['krv']) && isset($_POST['krvna_grupa'])){
        
        $kolicina = $_POST['krv'];
        $krvna_grupa = $_POST['krvna_grupa'];
        if(isset($_SESSION['korisnik'])){
            $korisnik = $_SESSION['korisnik'];
        }
        try{
            require_once 'db.php';
           

            izvrsi_upit("INSERT INTO zahtev(username,kolicina, krvna_grupa_zahteva) values(?,?,?);","sis",$korisnik, $kolicina, $krvna_grupa);
            echo" <script> alert('Uspesno ste poslali zahtev') </script>";
        }catch (Exception $e) {
            $greska = $e->getMessage();

    
    }
}

?>
<div class="col-xs-12 col-md-6 col-lg-4 mt-5" style=" margin:auto;">
    <form action="slanje_zahteva_pacijent.php" method="POST">
    <div class="text-center mt-5">
        <h3>Posaljite zahtev</h3>
        
    </div>
        <div class="form-group text-left">
            <label>Kolicina krvi (ml)</label>
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
        <button type="submit" class="btn btn-primary">Posalji</button>
    </form>

</div>
<?php require_once 'footer.php' ?>