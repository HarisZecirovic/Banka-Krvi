<?php require_once 'header.php'; ?>

<?php
$greska = "";
if (isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['prezime']) && isset($_POST['krvna_grupa']) && isset($_POST['korisnicko_ime'])  && isset($_POST['adresa']) && isset($_POST['grad']) && isset($_POST['telefon'])) {

    $ime1 = $_POST['ime'];
    $prezime1 = $_POST['prezime'];
    $krvna_grupa1 = $_POST['krvna_grupa'];
    $korisnicko_ime1 = $_POST['korisnicko_ime'];
    // $lozinka11 = $_POST['lozinka1'];
    // $lozinka22 = $_POST['lozinka2'];
    $adresa1 = $_POST['adresa'];
    $grad1 = $_POST['grad'];
    $telefon1 = $_POST['telefon'];



    require_once 'db.php';
    



    

   izvrsi_upit("UPDATE user SET username = '$korisnicko_ime1', ime  ='$ime1', prezime = '$prezime1', krvna_grupa = '$krvna_grupa1', adresa = '$adresa1', grad = '$grad1', br_telefona = '$telefon1' where username = '$korisnicko_ime1' ");
   //izvrsi_upit("UPDATE user SET username = ? , ime  =? , prezime = ? , password = ? , krvna_grupa = ?, adresa = ? , grad = ? , br_telefona = ? where username = ?; ", "ssssssssss", $korisnicko_ime1,$ime1,$prezime1,$lozinka11,$krvna_grupa1,$adresa1, $grad1,$telefon1,$korisnicko_ime1);
}



?>
<?php

if (isset($_SESSION["korisnik"])) {

    $korisnik = $_SESSION["korisnik"];

    require_once 'db.php';

    $result = izvrsi_upit("SELECT * from user where username = '$korisnik'");

    $row = $result->num_rows;

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $username = $row['username'];
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $lozinka = $row['password'];
    $krvna_grupa = $row['krvna_grupa'];
    $adresa = $row['adresa'];
    $grad = $row['grad'];
    $telefon = $row['br_telefona'];

    echo "
    <form action='promeni_podatke_pacijent.php' method='post' class='mx-5'>
    <div class='form-row'>
        <div class='form-group col-md-6 mt-5'>
            <label>Ime*</label>
            <input type='text' class='form-control' name='ime' placeholder='Ime' value = '$ime' required>
        </div>
        <div class='form-group col-md-6 mt-5'>
            <label>Prezime*</label>
            <input type='text' class='form-control' name='prezime' placeholder='Prezime' value = '$prezime' required>
        </div>
    </div>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label>Izaberite krvnu grupu*</label>
            <select class='form-control' id='sel1' name = 'krvna_grupa' required>
            <option value='$krvna_grupa'>$krvna_grupa</option>
        <option value= 'a+'>A+</option>
        <option value = 'a-'>A-</option>
        <option value = 'b+'>B+</option>
        <option value = 'b-'>B-</option>
        <option value = 'ab+'>AB+</option>
        <option value = 'ab-'>AB-</option>
        <option value = 'o+'>O(nulta)+</option>
        <option value = 'o-'>O(nulta)-</option>
             </select>
        </div>
        <div class='form-group col-md-6'>
            <label>Korisnicko ime*</label>
            <input type='text' class='form-control' name='korisnicko_ime' placeholder='Korisnicko ime' value = '$username' required>
        </div>
    </div>
    <div class='form-row'>
       
    </div>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label>Adresa*</label>
            <input type='text' class='form-control' name='adresa' placeholder='Adresa' value = '$adresa' required>
        </div>
        <div class='form-group col-md-3'>
            <label>Grad*</label>
            <input type='text' class='form-control' name='grad' placeholder='Grad' value = '$grad'>
        </div>
        <div class='form-group col-md-3'>
            <label>Broj telefona*</label>
            <input type='text' class='form-control' name='telefon' placeholder='Broj telefona' value = '$telefon' required>
        </div>
    </div>
    <small>Polja koja su oznacena sa * su obavezna</small>
    ";


    if ($greska != "")
        echo    '<div class="text-center">
                        <p class="text-center text-danger">' . $greska . '</p>
                    </div>';

    echo "               
    <br><br>
    <div class='text-center'>
    <a class='btn btn-primary col-4' href='promeni_lozinku.php'>Promeni lozinku</a>
    </div>
    <br>
    <div class='text-center'>
        <button type='submit' class='btn btn-primary col-4'>Potvrdi</button>
    </div>
</form>
";
}


?>
<?php require_once 'footer.php' ?>
