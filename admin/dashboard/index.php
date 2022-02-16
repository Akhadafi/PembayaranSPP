<?php

include_once '../koneksi.php';

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPP</title>
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
      background-image: url(../../images/imgwoe.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
</head>

<body class="bgrn">
  <main class="border-bottom">
    <!-- Navbar -->
    <div class="container">
      <?php
      include_once '../navbar.php'
      ?>
    </div>
    <br>
    <br>
    <!-- Navbar -->

    <!-- Footer -->
    <?php
    include_once '../../all/footer_detail.php'
    ?>
    <!-- Footer -->

    <!-- Content -->
    <div class="container-fluid">

      <!-- -->
      <div class="row mt-3 mb-3">
        <div class="col">
          <div class="card border-light text-light" style="width:auto; background-color:black;">
            <div class="card-header border-bottom text-center">
              <div class="row mt-2">
                <div class="col-6">
                  <div class="card-header border text-center">
                    <h4 class="card-title text-center font-weight-bold">
                      <a class="text-light" style="text-decoration: none;" href="../siswa/?search">Petugas</a>
                    </h4>
                    <hr>
                    <h2 class="text-warning text-center font-weight-bold">
                      <?php

                      $query = mysqli_query($conn, "SELECT COUNT(id_petugas) as jumlah FROM petugas");
                      $result = mysqli_fetch_assoc($query);
                      echo $result['jumlah'];

                      ?>
                    </h2>
                  </div>
                </div>
                <div class="col-6">
                  <div class="card-header border text-center">
                    <h4 class="card-title text-center font-weight-bold">
                      <a class="text-light" style="text-decoration: none;" href="../siswa/?search">Siswa</a>
                    </h4>
                    <hr>
                    <h2 class="text-warning text-center font-weight-bold">
                      <?php

                      $query = mysqli_query($conn, "SELECT COUNT(nisn) as jumlah FROM siswa");
                      $result = mysqli_fetch_assoc($query);
                      echo $result['jumlah'];

                      ?>
                    </h2>
                  </div>
                </div>
              </div>
              <hr>
              <img class="align-items-center border-4 border rounded-circle border-danger mb-2" style="width: 150px; height: 150px;" src="https://web.smkn4pyk.sch.id/wp-content/uploads/2019/04/Logo-SMKN-4-Payakumbuh-PNG.png" alt="" srcset="">
              <div class="row">
                <p class="card-text">
                  <b>Sistem Informasi Pembayaran SPP SMK N 4 Payakumbuh</b> ini dibuat dengan tujuan untuk memudahkan <span class="text-warning">petugas</span> melakukan pendataan agar menjadi terstruktur serta lebih efektif dan efisien. Sistem ini juga bermanfaat bagi <span class="text-warning">siswa</span> yang bersekolah di SMK N 4 Payakumbuh, seperti untuk cek pembayaran, dan info pembayaran.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content -->
  </main>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>