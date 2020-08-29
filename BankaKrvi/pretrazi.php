<?php require_once "header.php"; ?>
<?php
if (isset($_POST['id_kese'])) {
  $id_kese = $_POST['id_kese'];

  require_once 'db.php';
  izvrsi_upit("DELETE FROM kesa where id_kese = '$id_kese'");
  echo " <script> alert('Uspesno ste izbrisali kesu') </script>";
}

?>
<script src="tabela.js"> </script>
<div class="container">
  <input class="form-control mb-4 mt-5" id="tableSearch" type="text" placeholder="Ukucajte krvnu grupu">

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id kese</th>
        <th>Krvna Grupa</th>
        <th>Kolicina (ml)</th>
        <th>Ime i prezime</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
      require_once "db.php";

      $result = izvrsi_upit("SELECT * from kesa JOIN donator on kesa.jmbg_donatora = donator.jmbg where kesa.kolicina > 0 ");

      $rows = $result->num_rows;

      for ($i = 0; $i < $rows; ++$i) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $krvna_grupa = $row['krvna_grupa'];
        $kolicina = $row['kolicina'];
        $ime = $row['ime'];
        $prezime = $row['prezime'];
        $id_kese = $row['id_kese'];
        // $jmbg_donatora = $row['jmbg_donatora'];
        echo " <form action = 'pretrazi.php' method = 'post'>";
        echo <<<_LOGGEDIN
                <tr>
                <td>$id_kese</td>
                <td>$krvna_grupa</td>
                <td>$kolicina</td>
                <td>$ime $prezime </td>
                
                <td><a class = 'btn btn-success' href =dodaj_krv.php?id_kese=$id_kese&kolicina=$kolicina> Dodaj</a>   </td>
                <td>  
                <input type = 'hidden' name = 'id_kese' value = '$id_kese'>
                <button type='submit' class='btn btn-danger'>Izbrisi</button> </form> </td>
              </tr>
              _LOGGEDIN;
      }

      ?>

    </tbody>
  </table>
</div>
<?php require_once 'footer.php' ?>