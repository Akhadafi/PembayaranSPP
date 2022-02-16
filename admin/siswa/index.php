<?php

include_once '../koneksi.php';
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
<!-- tambah -->
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
              <h4>Detail Data Siswa</h4>
            </div>
            <div class="card-body">
              <h5>Jumlah Siswa : <span class="text-warning">
                  <?php

                  $query = mysqli_query($conn, "SELECT COUNT(nisn) as jumlah FROM siswa");
                  $result = mysqli_fetch_assoc($query);
                  echo $result['jumlah'];

                  ?> Siswa
                </span></h5>
              <hr>
              <p class="card-text">Keterangan : Siswa keseluruhan</p>
              <hr>
              <a type="button" class="btn btn-outline-success d-block" data-bs-toggle="modal" data-bs-target="#myModal">
                Tambah Siswa
              </a>

              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content card border" style="margin-top: 25px;width:auto; background-color:black;">
                    <!-- form tambah -->
                    <main id="up">
                      <!-- Content -->
                      <?php
                      // cek tombol tambah di tekan
                      if (isset($_POST['tambah'])) {
                        $nisn = $_POST['nisn'];
                        $nis = $_POST['nis'];
                        $nama = $_POST['nama'];
                        $id_kelas = $_POST['id_kelas'];
                        $alamat = $_POST['alamat'];
                        $no_telp = $_POST['no_telp'];
                        $id_spp = $_POST['id_spp'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];

                        $result_siswa = mysqli_query($conn, "INSERT INTO siswa VALUES ('$nisn','$nis','$nama',$id_kelas,'$alamat','$no_telp',$id_spp,'$jenis_kelamin')");

                        $cek = mysqli_affected_rows($conn);

                        if ($cek > 0) {
                          echo "
                          <script>
                            alert('Data berhasil di tambahkan');
                            window.location.href = 'index.php?search';
                          </script>
                          ";
                        } else {
                          echo "
                          <script>
                            alert('Data gagal di tambahkan');
                            window.location.href = 'tambah.php';
                          </script>
                          ";
                          echo $nisn . $nis . $nama . $id_kelas . $alamat . $no_telp . $id_spp . $jenis_kelamin;
                        }
                      }
                      ?>

                      <div class="container">
                        <div class="row">
                          <div class="container">
                            <div class="card mb-3 mt-3 border-light text-light" style="width:auto; background-color:black;">
                              <h2 class="text-center text-light">PENAMBAHAN DATA SISWA</h2>
                            </div>
                            <form action="" method="post">
                              <div class="card mb-3 border-light text-light" style="width:auto; background-color:black;">
                                <div class="card-header border-bottom text-center">
                                  <div class="row">
                                    <div class="col-6">
                                      <a href="../siswa/?search" class="btn btn-outline-danger">Kembali</a>
                                    </div>
                                    <div class="col-6">
                                      <button type="submit" class="btn btn-outline-success" name="tambah">Tambah</button>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body form-control-sm form-select-sm">
                                  <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Siswa :</label>
                                    <input name="nama" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nama" placeholder="Masukan nama siswa">
                                  </div>
                                  <hr>

                                  <div class="mb-3">
                                    <label for="nisn" class="form-label">NISN Siswa :</label>
                                    <input name="nisn" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nisn" placeholder="Masukan NISN siswa">
                                  </div>
                                  <hr>

                                  <div class="mb-3">
                                    <label for="nis" class="form-label">NIS Siswa :</label>
                                    <input name="nis" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nis" placeholder="Masukan NIS siswa">
                                  </div>
                                  <hr>

                                  <label for="id_spp" class="form-label">SPP Siswa :</label>
                                  <select class="form-select text-light btn-outline-info" name="id_spp" id="id_spp" aria-label="Default select example" style="background-color:transparent">
                                    <option selected class="text-dark">Pilih spp ..</option>
                                    <?php
                                    $result_spp = mysqli_query($conn, "SELECT * FROM spp");
                                    while ($spp = mysqli_fetch_assoc($result_spp)) : ?>
                                      <option class="text-dark" value="<?= $spp['id_spp']; ?>"><?= $spp['nominal']; ?></option>
                                    <?php endwhile; ?>
                                  </select>
                                  <hr>

                                  <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon Siswa :</label>
                                    <input name="no_telp" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="no_telp" placeholder="Masukan No Telepon Siswa">
                                  </div>
                                  <hr>

                                  <label for="id_kelas" class="form-label">Kelas Siswa :</label>
                                  <select class="form-select text-light btn-outline-info" name="id_kelas" id="id_kelas" aria-label="Default select example" style="background-color:transparent">
                                    <option selected class="text-dark">Pilih kelas ..</option>
                                    <?php
                                    $result_kelas = mysqli_query($conn, "SELECT * FROM kelas");
                                    while ($kelas = mysqli_fetch_assoc($result_kelas)) : ?>
                                      <option class="text-dark" value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama_kelas']; ?></option>
                                    <?php endwhile; ?>
                                  </select>
                                  <hr>

                                  <label class="form-label">Jenis Kelamin Siswa :</label>
                                  <div class="form-check">
                                    <input class="form-check-input text-light btn-outline-info" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="laki-laki" style="background-color:transparent">
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
                                  <hr>

                                  <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Siswa :</label>
                                    <textarea name="alamat" class="form-control text-light btn-outline-info" id="alamat" rows="3" style="background-color:transparent"></textarea>
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
                    <!-- form tambah -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mb-3">
          <div class="card border-light text-light" style="width:auto; background-color:black;">
            <div class="card-header border-bottom text-center">
              <h4>Data Siswa</h4>
            </div>

            <div class="row mx-2 mt-3">
              <div class="col-5">
                <a href="./?search" class="btn btn-outline-light">Semua Daftar Siswa</a>
              </div>
              <div class="col-7">
                <form class="d-flex" method="GET">
                  <input value="<?php if (isset($_GET['search'])) {
                                  echo $_GET['search'];
                                } ?>" name="search" required style="background-color: transparent;" class="form-control btn-sm me-2 text-light btn-outline-info" type="search" placeholder="Cari Data Siswa" aria-label="Search">
                  <button class="btn btn-outline-info" type="submit">Cari</button>
                </form>
              </div>
            </div>

            <div class="card-body table-responsive">
              <table id="" class="table text-light border table-sm">
                <thead class="text-center bgrnn">
                  <th>No</th>
                  <th>NISN</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>SPP</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>No Tlp</th>
                  <th>Kelamin</th>
                </thead>
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