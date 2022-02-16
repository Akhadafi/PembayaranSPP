<?php

include_once '../admin/koneksi.php';

$id = $_GET['nisn'];

// result(query wisata)
$result_siswa = mysqli_query(
  $conn,
  "SELECT * FROM siswa
    INNER JOIN spp
    ON siswa.id_spp = spp.id_spp
    INNER JOIN kelas
    ON siswa.id_kelas = kelas.id_kelas where nisn=$id
  "
);
$siswa = mysqli_fetch_assoc($result_siswa);

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
      background-image: url(../images/imgwoe.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
</head>

<body class="bgrn">
  <?php
  include_once '../navbar.php'
  ?>
  <main class="border-bottom" style="margin-top: 20px;">
    <!-- Content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 mb-3">
          <!-- <h2 class="text-center text-light">Info Petugas</h2> -->
          <div class="card mb-1 border-light text-light" style="width:auto; background-color:black;">
            <div class="card-header m-auto border-bottom text-center">
              <div class="row">
                <h4 class="">Nama Siswa : <span class="text-warning"><?= $siswa['nama']; ?></span></h4>
              </div>
            </div>
            <div class="card-body">
              <h5>NISN : </h5>
              <p><?= $siswa['nisn']; ?></p>
              <hr>
              <h5>NIS : </h5>
              <p><?= $siswa['nis']; ?></p>
              <hr>
              <h5>No Telepon : </h5>
              <p><?= $siswa['no_telp']; ?></p>
              <hr>
              <h5>Jenis Kelamin : </h5>
              <p><?= $siswa['jenis_kelamin']; ?></p>
              <hr>
              <h5>Kelas : </h5>
              <p><?= $siswa['nama_kelas']; ?>(<?= $siswa['kopetensi_keahlian']; ?>)</p>
              <hr>
              <h5> Alamat : </h5>
              <p><?= $siswa['alamat']; ?></p>
              <hr>
              <hr>
              <h5 class="text-warning">SPP : <?= $siswa['tahun']; ?>/<?= $siswa['nominal']; ?></h5>
              <hr>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card border-light text-light" style="width:auto; background-color:black;">
            <div class="card-header border-bottom text-center">
              <h4>Daftar Pembayaran <span class="text-warning"><?= $siswa['nama']; ?></span></h4>
            </div>

            <div class="card-body table-responsive">
              <table id="" class="table text-light border mt-3">
                <thead class="text-center bgrnn">
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
                         where pembayaran.id_petugas=petugas.id_petugas and pembayaran.nisn=siswa.nisn and pembayaran.id_spp=spp.id_spp and siswa.nisn=$id
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