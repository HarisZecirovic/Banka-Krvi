<?php 

require_once 'header.php'; ?>
<?php
    $greska = "";

    if(isset($_POST['ime'])&& isset($_POST['prezime']) && isset($_POST['adresa']) && isset($_POST['telefon']) && isset($_POST['grad']) && isset($_POST['jmbg'])){
        
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $adresa = $_POST['adresa'];
        $telefon = $_POST['telefon'];
        $grad = $_POST['grad'];
        $jmbg = $_POST['jmbg'];
        //$krvna_grupa = $_POST['krvna_grupa'];
        //$kolicina = $_POST['krv'];

        try{
            require_once 'db.php';
            $result = izvrsi_upit("SELECT * from donator where jmbg = '$jmbg'");
            if($result->num_rows > 0)
                throw new Exception("Ovaj donator je vec dodan!");

            izvrsi_upit("INSERT INTO donator values(?,?,?,?,?,?);","ssssss",$jmbg, $ime, $prezime, $adresa,$telefon,$grad);

            //izvrsi_upit("INSERT INTO kesa(krvna_grupa,kolicina, jmbg_donatora) values(?,?,?);","sds",$krvna_grupa, $kolicina, $jmbg);

            echo" <script> alert('Uspesno ste dodali donatora') </script>";

        }
        catch (Exception $e) {
            $greska = $e->getMessage();
    }
}

?>
<div class="text-center col-xs-12 col-md-6 col-lg-4 mt-5" style=" margin:auto;">
    <h1>Unesite podatke o donatoru</h1><br>
    <form action="dodaj_donatora.php" method="POST">
        <div class="form-group text-left">
        
            <label>Ime</label>
            <input type="text" class="form-control" name="ime" autofocus>
        </div>
        <div class="form-group text-left">
            <label>Prezime</label>
            <input type="text" class="form-control" name="prezime">
        </div>
        <div class="form-group text-left">
            <label>Adresa</label>
            <input type="text" class="form-control" name="adresa">
        </div>
        <div class="form-group text-left">
            <label>Broj Telefona</label>
            <input type="text" class="form-control" name="telefon">
        </div>
        <div class="form-group text-left">
            <label>Grad</label>
            <input type="text" class="form-control" name="grad">
        </div>
        <div class="form-group text-left">
            <label>JMBG*</label>
            <input type="text" class="form-control" name="jmbg" required>
        </div>
        <!-- <div class="form-group text-left">
        <label>Izaberite krvnu grupu*</label>
            <select class="form-control" id="sel1" name = "krvna_grupa" required>
            <option value="" disabled selected>Izaberite</option>
        <option value= "a+">A+</option>
        <option value = "a-">A-</option>
        <option value = "b+">B+</option>
        <option value = "b-">B-</option>
        <option value = "ab+">AB+</option>
        <option value = "ab-">AB-</option>
        <option value = "o+">O(nulta)+</option>
        <option value = "o-">O(nulta)-</option>
             </select>
        </div>
        <div class="form-group text-left">
            <label>Kolicina donirane krvi (ml)</label>
            <input type="text" class="form-control" name="krv" required>
        </div> -->

        
        <?php
        if ($greska != "")
            echo    '<div class="text-center">
                        <p class="text-center text-danger">' . $greska . '</p>
                    </div>';
        ?>
        
        
        <button type="submit" class="btn btn-success btn-lg btn-block">Unesi podatke</button>
    </form>
    
</div>

<?php require_once 'footer.php' ?>


 