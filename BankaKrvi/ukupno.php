<?require_once "header.php" ?>

<?php
if (isset($_POST['krvna_grupa'])) {
    $krvna_grupa = $_POST['krvna_grupa'];

    require_once 'db.php';
    $ml = 0;
    $result = izvrsi_upit("SELECT SUM(kolicina) as total from kesa where krvna_grupa = ?;", "s", $krvna_grupa);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $ml = $row['total'];
    

    
    // if ($result->num_rows < 0)
    //     echo "NEMAMO NA LAGERU OVE KRVI";
    // else {
    //     foreach (izvrsi_upit("SELECT SUM(kolicina) FROM kesa WHERE krvna_grupa = '$krvna_grupa'") as $row) {

            
    //         echo "<tr>";
    //         echo "<td>" . $row['SUM(kolicina)'] . "</td>";
    //         echo "</tr>";
    //     }
    // }
}




?>

<div class="col-xs-12 col-md-6 col-lg-4 mt-5" style=" margin:auto;">
    <form action="ukupno.php" method="POST">
        <div class="form-group text-left mt-5">

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
            <button type="submit" class="btn btn-primary btn-lg">Porvrdi</button>
            <?php
          echo "   <div class='form-group text-left mt-5'>";
            if($ml > 0){
        echo "<h3>Ukupno imamo $ml ml, $krvna_grupa krvne grupe</h3>
        <a href='pretrazi.php'>Da li zelite sami da pogledate?</a>";
            }
            else{
                echo "<h3>Nemamo to sto trazite </h3>
                <a href='pretrazi.php'>Da li zelite sami da pogledate?</a>";
            }
        echo "
    </div>";
    ?>
    </form>

</div>
</div>
<?php require_once 'footer.php' ?>