<?php require_once 'header.php'; ?>

<script>
  function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
</script>
<div class=" col-xs-12 col-md-6 col-lg-4 mt-5" style=" margin:auto;">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pretrazi ime">

  <ul id="myUL">
    <?php
    require_once 'db.php';
    $result = izvrsi_upit("SELECT * from donator");
    $rows = $result->num_rows;

    for ($i = 0; $i < $rows; ++$i) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $ime = $row['ime'];
      $prezime = $row['prezime'];
      $jmbg = $row['jmbg'];
      echo "<li><a href ='promeni_donatora.php?jmbg=$jmbg'> $ime $prezime</a> </li> ";
    }



    ?>

    <!-- <li><a href="#">Calvin</a></li>
  <li><a href="#">Christina</a></li>
  <li><a href="#">Cindy</a></li> -->
  </ul>
</div>
<?php require_once 'footer.php' ?>