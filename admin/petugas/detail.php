<?php

include_once '../koneksi.php';

$id = $_GET['id'];

// result(query wisata)
$result_petugas = mysqli_query(
  $conn,
  "SELECT * FROM petugas where id_petugas=$id
  "
);
$petugas = mysqli_fetch_assoc($result_petugas);

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
  <main class="border-bottom" style="margin-top: 25px;">

    <!-- Content -->

    <div class="container-fluid">
      <a href="../petugas/?search" class="btn btn-outline-info container-sm d-block">KEMBALI</a>
      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 mb-3">
            <!-- <h2 class="text-center text-light">Info Petugas</h2> -->
            <div class="card mb-1 border-light text-light" style="width:auto; background-color:black;">
              <div class="card-header m-auto border-bottom text-center">
                <div class="row">
                  <div class="row btn-sm m-auto">
                    <div class="col-lg-6 mb-2">
                      <a href="./edit.php?id=<?= $petugas['id_petugas']; ?>" class="btn btn-outline-light d-block">Edit's Data <span class="text-info"><?= $petugas['nama_petugas']; ?></span></a>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <a href="./hapus.php?id=<?= $petugas['id_petugas']; ?>" class=" btn btn-outline-light d-block">Hapus Data <span class="text-danger"><?= $petugas['nama_petugas']; ?></span></a>
                    </div>
                  </div>
                  <hr>
                  <h2 class="">Nama Petugas : <span class="text-warning"><?= $petugas['nama_petugas']; ?></span></h2>
                </div>
              </div>
              <div class="card-body">
                <h5>Username : <?= $petugas['username']; ?></h5>
                <hr>
                <h5>Level : <?= $petugas['level']; ?></h5>
                <hr>
                <h5>Telepon : <?= $petugas['no_telp']; ?></h5>
                <hr>
                <h5>Jenis Kelamin : <?= $petugas['jenis_kelamin']; ?></h5>
                <hr>
                <h5> Alamat : </h5>
                <p><?= $petugas['alamat']; ?></p>
                <hr>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card border-light text-light" style="width:auto; background-color:black;">
              <div class="card-header border-bottom text-center">
                <h4>Daftar Pembayaran Pada Petugas <span class="text-warning"><?= $petugas['nama_petugas']; ?></span></h4>
              </div>

              <div class="card-body table-responsive">
                <table id="" class="table text-light border table-sm mt-3">
                  <thead class="text-center bg-dark">
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Bayar</th>
                    <th>Tahun Dibayar</th>
                    <th>SPP</th>
                    <th>Jumlah Bayar</th>
                  </thead>
                  <tbody id="myTable">
                    <?php $angka = 1; ?>
                    <?php
                    $result_pembayaran = mysqli_query(
                      $conn,
                      "SELECT * FROM petugas,spp,siswa,pembayaran
                         where pembayaran.id_petugas=petugas.id_petugas and pembayaran.nisn=siswa.nisn and pembayaran.id_spp=spp.id_spp and petugas.id_petugas=$id
                      "
                    );

                    ?>
                    <?php while ($pembayaran = mysqli_fetch_assoc($result_pembayaran)) : ?>
                      <tr class="text-center text_light">
                        <td><?= $angka++; ?>.</td>
                        <td><?= $pembayaran['nama_petugas']; ?></td>
                        <td><?= $pembayaran['tgl_bayar']; ?></td>
                        <td><?= $pembayaran['bulan_dibayar']; ?></td>
                        <td><?= $pembayaran['tahun_dibayar']; ?></td>
                        <td><?= $pembayaran['nominal']; ?></td>
                        <td><?= $pembayaran['jumlah_bayar']; ?></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
  </main>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>