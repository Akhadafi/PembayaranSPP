<?php

include_once '../koneksi.php';

$id = $_GET['nisn'];
// result(query wisata)
$result_siswa = mysqli_query(
  $conn,
  "SELECT * FROM siswa"
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
      <a href="../siswa/?search" class="btn btn-outline-info container-sm d-block">KEMBALI</a>
      <br>

      <div class="container-fluid">
        <div class="row">

          <!-- Card -->
          <div class="col-lg-6 mb-3">
            <div class="card mb-1 border-light text-light" style="width:auto; background-color:black;">
              <div class="card-header m-auto border-bottom text-center">
                <div class="row">
                  <div class="row btn-sm m-auto">
                    <div class="col-lg-6 mb-2">
                      <a type="button" class="btn btn-outline-light d-block" data-bs-toggle="modal" data-bs-target="#va-edit">
                        Edit Data <span class="text-info"><?= $siswa['nama']; ?></span>
                      </a>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <a type="button" class="btn btn-outline-light d-block" data-bs-toggle="modal" data-bs-target="#va-hapus">
                        Hapus Data <span class="text-danger"><?= $siswa['nama']; ?></span>
                      </a>
                    </div>

                    <!-- The Modal Validasi -->
                    <div class="modal fade" id="va-hapus">
                      <div class="modal-dialog">
                        <div class="modal-content border border-light" style="background-color: black;">
                          <!-- Modal body -->
                          <div class="modal-body">
                            <h6>Yakin untuk menghapus data <span class="text-danger"><?= $siswa['nama']; ?></span></h6>
                            <hr>
                            <div class="row">
                              <div class="col-6">
                                <a href="./detail.php?nisn=<?= $siswa['nisn']; ?>" class=" btn btn-outline-info d-block">Kembali</a>
                              </div>
                              <div class="col-6">
                                <a href="./hapus.php?nisn=<?= $siswa['nisn']; ?>" class="btn btn-outline-danger d-block">Hapus</a>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- The Modal Edit -->
                    <div class="modal fade" id="va-edit">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content border border-light" style="background-color: black;">
                          <!-- Modal body -->
                          <div class="modal-body">
                            <?php
                            include_once '../koneksi.php';

                            // mengambil id melalui url
                            $id = $_GET['nisn'];

                            // query data untuk memasukkan ke input
                            $query = "SELECT * FROM siswa WHERE nisn = '$id'";
                            $result = mysqli_query($conn, $query);
                            $siswa = mysqli_fetch_assoc($result);

                            // cek tombol tambah di tekan
                            if (isset($_POST['ubah'])) {
                              $nisn = $_POST['nisn'];
                              $nis = $_POST['nis'];
                              $nama = $_POST['nama'];
                              $id_kelas = $_POST['id_kelas'];
                              $alamat = $_POST['alamat'];
                              $no_telp = $_POST['no_telp'];
                              $id_spp = $_POST['id_spp'];
                              $jenis_kelamin = $_POST['jenis_kelamin'];

                              // echo $nisn .
                              //   $nis .
                              //   $nama .
                              //   $id_kelas .
                              //   $alamat .
                              //   $no_telp .
                              //   $id_spp .
                              //   $jenis_kelamin;

                              $query = "UPDATE siswa
                                            SET
                                        nis = '$nis',
                                        nama = '$nama',
                                        id_kelas = $id_kelas,
                                        alamat = '$alamat',
                                        no_telp = '$no_telp',
                                        id_spp = $id_spp,
                                        jenis_kelamin = '$jenis_kelamin'
                                            WHERE
                                        nisn = '$nisn'
                                        ";

                              $result = mysqli_query($conn, $query);

                              $cek = mysqli_affected_rows($conn);

                              if ($cek > 0) {
                                echo "
                                      <script>
                                          alert('Data berhasil di ubah');
                                          window.location.href = 'detail.php?nisn='nisn'';
                                      </script>
                                  ";
                              } else {
                                echo "
                                      <script>
                                          alert('Data gagal di ubah');
                                          // window.location.href = 'edit.php';
                                      </script>
                                  ";
                              }
                            }
                            ?>
                            <main id="up">
                              <!-- Content -->
                              <div class="container">
                                <div class="row">
                                  <div class="container">
                                    <div class="card mb-3 mt-3 border-light text-light" style="width:auto; background-color:black;">
                                      <h2 class="text-center text-light">PENGEDITAN DATA SISWA</h2>
                                    </div>
                                    <form action="" method="post">
                                      <div class="card mb-3 border-light text-light" style="width:auto; background-color:black;">
                                        <div class="card-header border-bottom text-center">
                                          <div class="row">
                                            <div class="col-6">
                                              <a href="./detail.php?nisn=<?= $siswa['nisn']; ?>" class="btn btn-outline-danger">Kembali</a>
                                            </div>
                                            <div class="col-6">
                                              <button type="submit" class="btn btn-outline-success" name="ubah">Edit Data</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="card-body form-control-sm form-select-sm">
                                          <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Siswa :</label>
                                            <input name="nama" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nama" value="<?= $siswa['nama']; ?>" placeholder="Masukan nama siswa">
                                          </div>
                                          <hr>

                                          <div class="mb-3">
                                            <label for="nisn" class="form-label">NISN Siswa :</label>
                                            <input type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nisn" value="<?= $siswa['nisn']; ?>" placeholder="Masukan NISN siswa" disabled>
                                            <input type="hidden" name="nisn" value="<?= $siswa['nisn']; ?>">
                                          </div>
                                          <hr>

                                          <div class="mb-3">
                                            <label for="nis" class="form-label">NIS Siswa :</label>
                                            <input name="nis" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nis" value="<?= $siswa['nis']; ?>" placeholder="Masukan NIS siswa">
                                          </div>
                                          <hr>

                                          <label for="id_spp" class="form-label">SPP Siswa :</label>
                                          <select class="form-select text-light btn-outline-info" name="id_spp" id="id_spp" aria-label="Default select example" style="background-color:transparent">
                                            <?php
                                            $result_spp = mysqli_query($conn, "SELECT * FROM spp");
                                            while ($spp = mysqli_fetch_assoc($result_spp)) : ?>
                                              <option class="text-dark" value="<?= $spp['id_spp']; ?>" <?php if ($spp['id_spp'] == $siswa['id_spp']) {
                                                                                                          echo 'selected';
                                                                                                        } else {
                                                                                                          echo '';
                                                                                                        } ?>><?= $spp['nominal']; ?>
                                              </option>
                                            <?php endwhile; ?>
                                          </select>
                                          <hr>

                                          <div class="mb-3">
                                            <label for="no_telp" class="form-label">No Telepon Siswa :</label>
                                            <input name="no_telp" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="no_telp" value="<?= $siswa['no_telp']; ?>" placeholder="Masukan No Telepon Siswa">
                                          </div>
                                          <hr>

                                          <label for="id_kelas" class="form-label">Kelas Siswa :</label>
                                          <select class="form-select text-light btn-outline-info" name="id_kelas" id="id_kelas" aria-label="Default select example" style="background-color:transparent">
                                            <?php
                                            $result_kelas = mysqli_query($conn, "SELECT * FROM kelas");
                                            while ($kelas = mysqli_fetch_assoc($result_kelas)) : ?>
                                              <option class="text-dark" value="<?= $kelas['id_kelas']; ?>" <?php if ($kelas['id_kelas'] == $siswa['id_kelas']) {
                                                                                                              echo 'selected';
                                                                                                            } else {
                                                                                                              echo '';
                                                                                                            } ?>><?= $kelas['nama_kelas']; ?>
                                              </option>
                                            <?php endwhile; ?>
                                          </select>
                                          <hr>

                                          <?php if ($siswa['jenis_kelamin'] == 'laki-laki') : ?>
                                            <label class="form-label">Jenis Kelamin Siswa :</label>
                                            <div class="form-check">
                                              <input class="form-check-input text-light btn-outline-info" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" style="background-color:transparent" checked>
                                              <label class="form-check-label" for="jenis_kelamin1">
                                                Laki-laki
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input text-light btn-outline-info" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="perempuan" style="background-color:transparent">
                                              <label class="form-check-label" for="jenis_kelamin2">
                                                Perempuan
                                              </label>
                                            </div>
                                          <?php endif; ?>
                                          <?php if ($siswa['jenis_kelamin'] == 'perempuan') : ?>
                                            <label class="form-label">Jenis Kelamin Siswa :</label>
                                            <div class="form-check">
                                              <input class="form-check-input text-light btn-outline-info" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" style="background-color:transparent">
                                              <label class="form-check-label" for="jenis_kelamin1">
                                                Laki-laki
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input text-light btn-outline-info" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="perempuan" style="background-color:transparent" checked>
                                              <label class="form-check-label" for="jenis_kelamin2">
                                                Perempuan
                                              </label>
                                            </div>
                                          <?php endif; ?>
                                          <hr>

                                          <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat Siswa :</label>
                                            <textarea name="alamat" class="form-control text-light btn-outline-info" id="alamat" rows="3" style="background-color:transparent"><?= $siswa['alamat']; ?></textarea>
                                          </div>
                                          <hr>
                                          <center>
                                            <a href="#up" class="btn btn-sm btn-outline-secondary">SELESAI ?</a>
                                          </center>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </main>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <hr>
                  <?php
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
                  <h2 class="">Nama Siswa : <span class="text-warning"><?= $siswa['nama']; ?></span></h2>
                </div>
              </div>
              <div class="card-body">
                <h5>NISN : <?= $siswa['nisn']; ?></h5>
                <hr>
                <h5>NIS : <?= $siswa['nis']; ?></h5>
                <hr>
                <h5>Telepon : <?= $siswa['no_telp']; ?></h5>
                <hr>
                <h5>Jenis Kelamin : <?= $siswa['jenis_kelamin']; ?></h5>
                <hr>
                <h5>Kelas : </h5>
                <h5><?= $siswa['nama_kelas']; ?>(<?= $siswa['kopetensi_keahlian']; ?>)</h5>
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
          <!-- Card -->

          <!-- Daftar Bayar -->
          <div class="col-lg-6">
            <div class="card border-light text-light" style="width:auto; background-color:black;">
              <div class="card-header border-bottom text-center">
                <h4>Daftar Pembayaran <span class="text-warning"><?= $siswa['nama']; ?></span></h4>
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
          <!-- Daftar Bayar -->

        </div>
      </div>
      <br>
      <!-- Content -->
  </main>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>