<?php

include_once '../koneksi.php';

// cek tombol tambah di tekan
if (isset($_POST['tambah'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_petugas = $_POST['nama_petugas'];
  $level = $_POST['level'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $jenis_kelamin = $_POST['jenis_kelamin'];


  $result_petugas = mysqli_query($conn, "INSERT INTO petugas VALUES ('','$username','$password','$nama_petugas','$level','$alamat','$no_telp','$jenis_kelamin')");

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
              // window.location.href = 'tambah.php';
          </script>
      ";
    echo $username . $password . $nama_petugas . $level . $alamat . $no_telp . $jenis_kelamin;
  }
}
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
  <main id="up" class="border-bottom border-top" style="margin-top: 25px;">

    <!-- Content -->

    <div class="container">
      <div class="row">
        <div class="container">
          <div class="card mb-3 mt-3 border-light text-light" style="width:auto; background-color:black;">
            <h2 class="text-center text-light">PENAMBAHAN DATA SISWA</h2>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-3 border-light text-light" style="width:auto; background-color:black;">
              <div class="card-header border-bottom text-center">
                <div class="row">
                  <div class="col-6">
                    <a href="../petugas/?search" class="btn btn-outline-danger">Kembali</a>
                  </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-outline-success" name="tambah">Tambah</button>
                  </div>
                </div>
              </div>
              <div class="card-body form-control-sm form-select-sm">
                <div class="mb-3">
                  <label for="username" class="form-label">Username Petugas :</label>
                  <input name="username" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="username" placeholder="Masukan username petugas">
                </div>
                <hr>

                <div class="mb-3">
                  <label for="password" class="form-label">Password Petugas :</label>
                  <input name="password" type="password" class="text-light btn-outline-info form-control" style="background-color:transparent" id="password" placeholder="Masukan password petugas">
                </div>
                <hr>

                <div class="mb-3">
                  <label for="nama_petugas" class="form-label">Nama Petugas :</label>
                  <input name="nama_petugas" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nama_petugas" placeholder="Masukan nama petugas">
                </div>
                <hr>

                <label class="form-label">Jenis Kelamin Petugas :</label>
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
                  <label for="no_telp" class="form-label">No Telepon Petugas :</label>
                  <input name="no_telp" type="text" class="text-light btn-outline-info form-control" style="background-color:transparent" id="no_telp" placeholder="Masukan No Telepon Siswa">
                </div>
                <hr>

                <label class="form-label">Level Petugas :</label>
                <div class="form-check">
                  <input class="form-check-input text-light btn-outline-info" type="radio" name="level" id="level1" value="admin" style="background-color:transparent">
                  <label class="form-check-label" for="level1">
                    Admin
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input text-light btn-outline-info" type="radio" name="level" id="level2" value="petugas" style="background-color:transparent">
                  <label class="form-check-label" for="level2">
                    Petugas
                  </label>
                </div>
                <hr>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat Petugas :</label>
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
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>