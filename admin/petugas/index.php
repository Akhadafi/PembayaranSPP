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
      background-image: url(../../images/imgwoe.jpg);
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
  <main class="border-bottom">

    <!-- Navbar -->
    <div class="container">
      <?php
      include_once '../navbar.php'
      ?>
    </div>

    <!-- Content -->

    <br>
    <br>
    <!-- Footer -->
    <?php
    include_once '../../all/footer_detail.php'
    ?>

    <div class="container-fluid mt-3">
      <div class="row btn-sm">

        <div class="col-lg-4 mb-3">
          <!-- <h2 class="text-center text-light">Info Petugas</h2> -->
          <div class="card border-light text-light" style="width:auto; background-color:black;">
            <div class="card-header border-bottom text-center">
              <h4>Detail Data Petugas</h4>
            </div>
            <div class="card-body">
              <h5>Jumlah Petugas : <span class="text-warning">
                  <?php

                  $query = mysqli_query($conn, "SELECT COUNT(id_petugas) as jumlah FROM petugas");
                  $result = mysqli_fetch_assoc($query);
                  echo $result['jumlah'];

                  ?> Petugas
                </span></h5>
              <hr>
              <p class="card-text">Keterangan : Petugas keseluruhan</p>
              <a href="./tambah.php" class="btn btn-outline-success mr-5">Tambah Petugas</a>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mb-3">
          <div class="card border-light text-light" style="width:auto; background-color:black;">
            <div class="card-header border-bottom text-center">
              <h4>Data Petugas</h4>
            </div>

            <div class="row mx-2 mt-3">
              <div class="col-5">
                <a href="./?search" class="btn btn-outline-light">Semua Daftar Petugas</a>
              </div>
              <div class="col-7">
                <form class="d-flex" method="GET">
                  <input value="<?php if (isset($_GET['search'])) {
                                  echo $_GET['search'];
                                } ?>" name="search" required style="background-color: transparent;" class="form-control btn-sm me-2 text-light btn-outline-info" type="search" placeholder="Cari Data Petugas" aria-label="Search">
                  <button class="btn btn-outline-info" type="submit">Cari</button>
                </form>
              </div>
            </div>

            <div class="card-body table-responsive">
              <table id="" class="table text-light border table-sm">
                <thead class="text-center bgrnn">
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Alamat</th>
                  <th>No Telepon</th>
                  <th>Jenis Kelamin</th>
                </thead>
                <tbody id="myTable">
                  <?php $angka = 1; ?>
                  <!-- search -->
                  <?php
                  $con = mysqli_connect("localhost", "root", "", "db_spp");

                  if (isset($_GET['search'])) {
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM petugas WHERE CONCAT(username,nama_petugas,level,alamat,no_telp,jenis_kelamin) LIKE '%$filtervalues%' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                      foreach ($query_run as $items) {
                  ?>
                        <tr class="text-center text_light">
                          <td><?= $angka++; ?>.</td>
                          <td><a style="text-decoration: none;" href="./detail.php?id=<?= $items['id_petugas']; ?>"><?= $items['username']; ?></a></td>
                          <td><?= $items['nama_petugas']; ?></td>
                          <td><?= $items['level']; ?></td>
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
            </div>
          </div>
        </div>

      </div>
      <!-- Content -->
  </main>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script> -->
</body>

</html>