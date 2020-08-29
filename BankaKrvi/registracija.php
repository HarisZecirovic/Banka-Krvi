<?php require_once "header.php" ?>


<?php
$greska = "";
    if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['prezime']) && isset($_POST['krvna_grupa']) && isset($_POST['korisnicko_ime']) && isset($_POST['lozinka1']) && isset($_POST['lozinka2']) && isset($_POST['adresa']) && isset($_POST['grad']) && isset($_POST['telefon']) ){

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $krvna_grupa = $_POST['krvna_grupa'];
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka1 = $_POST['lozinka1'];
        $lozinka2 = $_POST['lozinka2'];
        $adresa = $_POST['adresa'];
        $grad = $_POST['grad'];
        $telefon = $_POST['telefon'];

        
        try{
            require_once 'db.php';
            $result = izvrsi_upit("Select * from user where username = '$korisnicko_ime'");

            if($result->num_rows > 0 )
                throw new Exception("Ovo korisnicko ime je zauzeto!");

                if($lozinka1 != $lozinka2)
                throw new Exception("Lozinke se ne poklapaju!");

                izvrsi_upit("INSERT INTO user VALUES(?,?,?,?,?,?,?,?,?);","sssssssss",$korisnicko_ime,$ime,$prezime, hash("sha256",$lozinka1),$krvna_grupa,$adresa, $grad,$telefon, "pacijent");
                header("Location:uspesno_kreiran_nalog.php");

        }
        catch (Exception $e) {
            $greska = $e->getMessage();
    }
}

?>

<form action="registracija.php" method="post" class="mx-5">
    <div class="form-row">
        <div class="form-group col-md-6 mt-5">
            <label>Ime*</label>
            <input type="text" class="form-control" name="ime" placeholder="Ime" required>
        </div>
        <div class="form-group col-md-6 mt-5">
            <label>Prezime*</label>
            <input type="text" class="form-control" name="prezime" placeholder="Prezime" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
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
        <div class="form-group col-md-6">
            <label>Korisnicko ime*</label>
            <input type="text" class="form-control" name="korisnicko_ime" placeholder="Korisnicko ime" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Lozinka*</label>
            <input type="password" class="form-control" name="lozinka1" placeholder="Lozinka" required>
        </div>
        <div class="form-group col-md-6">
            <label>Ponovite lozinku*</label>
            <input type="password" class="form-control" name="lozinka2" placeholder="Lozinka" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Adresa*</label>
            <input type="text" class="form-control" name="adresa" placeholder="Adresa" required>
        </div>
        <div class="form-group col-md-3">
            <label>Grad*</label>
            <input type="text" class="form-control" name="grad" placeholder="Grad">
        </div>
        <div class="form-group col-md-3">
            <label>Broj telefona*</label>
            <input type="text" class="form-control" name="telefon" placeholder="Broj telefona" required>
        </div>
    </div>
    <small>Polja koja su oznacena sa * su obavezna</small>
    <?php
        if ($greska != "")
            echo    '<div class="text-center">
                        <p class="text-center text-danger">' . $greska . '</p>
                    </div>';
    ?>
    <br><br>
    <div class="text-center">
        <button type="submit" class="btn btn-primary col-4">Registruj se</button>
    </div>
</form>
<?php require_once 'footer.php' ?>
