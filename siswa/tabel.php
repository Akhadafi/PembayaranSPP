<?php

include_once '../admin/koneksi.php';
$result_siswa = mysqli_query(
  $conn,
  "SELECT * FROM siswa
  INNER JOIN spp
  ON siswa.id_spp = spp.id_spp
  INNER JOIN kelas
  ON siswa.id_kelas = kelas.id_kelas
  "
);
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPP</title>
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .bgrn {
      /* background-image: url(../media/img1.jpg); */
      background-color: black;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    .bgrnn {
      background-image: url(./images/imgwoe.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
  <!--  -->
  <!-- <script type="text/javascript" language="javascript" src="../../static/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="../../static/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="../../static/dataTables.bootstrap5.min.js"></script> -->

</head>

<body class="bgrn">
  <table id="tabe" class="table text-light border">
    <tbody id="myTable">
      <?php $angka = 1; ?>
      <!-- search -->
      <?php
      $con = mysqli_connect("localhost", "root", "", "db_spp");

      if (isset($_GET['search'])) {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM siswa 
                    INNER JOIN spp
                    ON siswa.id_spp = spp.id_spp
                    INNER JOIN kelas
                    ON siswa.id_kelas = kelas.id_kelas WHERE CONCAT(nisn,nis,nama,nama_kelas,alamat,no_telp,tahun,nominal,jenis_kelamin) LIKE '%$filtervalues%' ";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $items) {
      ?>
            <tr class="text-center text_light">
              <td><?= $angka++; ?>.</td>
              <td><a style="text-decoration: none;" href="./detail.php?nisn=<?= $items['nisn']; ?>"><?= $items['nisn']; ?></a></td>
              <td><?= $items['nis']; ?></td>
              <td><?= $items['nama']; ?></td>
              <td><?= $items['tahun']; ?>/<?= $items['nominal']; ?></td>
              <td><?= $items['nama_kelas']; ?></td>
              <td><?= $items['alamat']; ?></td>
              <td><?= $items['no_telp']; ?></td>
              <td><?= $items['jenis_kelamin']; ?></td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="9" class="text-center">Maaf Didak ada data yang ditemukan .. <a href="./?search=">kembali</a></td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script> -->
</body>

</html>