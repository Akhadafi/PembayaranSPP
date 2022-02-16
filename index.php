<?php

include_once './admin/koneksi.php';

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
            background-image: url(./images/imgwoe.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="bgrn" style="margin-top: 10px;">
    <main class="border-bottom">

        <!-- Navbar -->
        <div class="d-flex container-fluid flex-column flex-md-row align-items-center mb-2 border-bottom border-top" style="background-color:black;">
            <a href="./" class="d-flex my-1 align-items-center text-light text-decoration-none">
                <img src="https://web.smkn4pyk.sch.id/wp-content/uploads/2019/04/Logo-SMKN-4-Payakumbuh-PNG.png" alt="logo" style="width: 50px;"> <span class="mx-2">PEMBAYARAN SPP</span>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"> -->
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path>
                </svg>
            </a>
            <nav class="d-inline-flex mt-md-0 ms-md-auto">

                <a class="nav-link text-light text-decoration-none" href="./">Dashboard</a>

                <!-- <a class="btn btn-sm btn-outline-light m-1 py-2 text-light text-decoration-none dropdown-toggle" style="background-color:transparent;" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Admin
    </a>
    <ul class="dropdown-menu mt-2 justify-content-end" aria-labelledby="navbarDropdownMenuLink">
      <li><a class="dropdown-item" href="../siswa/?search=">Siswa</a>
      </li>
      <li><a class="dropdown-item" href="../petugas/">Petugas</a>
      </li>
    </ul> -->
            </nav>
        </div>

        <!-- Content -->
        <div class="border-bottom position-relative overflow-hidden mb-1 p-sm-8 text-center text-light bg-light bgrnn">
            <div class="col-md-12 p-4">
                <h1 class="display-4 fw-normal">SPP</h1>
                <hr>
                <p class="lead fw-normal">Informasi Data Pembayaran SPP Siswa</p>
                <div class="row container-fluid text-center">
                    <div class="col-5"><a class="btn d-block btn-outline-light" href="./siswa/siswa.php?search">Siswa</a></div>
                    <div class="col-2"></div>
                    <div class="col-5"><a class="btn d-block btn-outline-light" href="#">Pembayaran</a></div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <div class="text-light" style="width:auto; background-color:transparent;">
                            <div class="text-center">
                                <img class="border-4 border rounded-circle border-danger mb-2" style="width: 150px; height: 150px;" src="https://web.smkn4pyk.sch.id/wp-content/uploads/2019/04/Logo-SMKN-4-Payakumbuh-PNG.png" alt="" srcset="">
                                <div class="row">
                                    <p class="card-text">
                                        <b>Sistem Informasi Pembayaran SPP SMK N 4 Payakumbuh</b> ini dibuat dengan tujuan untuk memudahkan <span class="text-warning">petugas</span> melakukan pendataan agar menjadi terstruktur serta lebih efektif dan efisien. Sistem ini juga bermanfaat bagi <span class="text-warning">siswa</span> yang bersekolah di SMK N 4 Payakumbuh, seperti untuk cek pembayaran, dan info pembayaran.
                                    </p>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 mt-3">
                    <!-- <h2 class="text-center text-light">Info Petugas</h2> -->
                    <div class="card mb-1 border-light text-light" style="width:auto; background-color:black;">
                        <div class="card-header border-bottom text-center">
                            <h4>Petugas Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <h5>Nama Petugas : Eve</h5>
                            <hr>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-outline-light">Baca..</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <h2 class="text-center text-light">Pembayaran Terbaru</h2>
                    <div class="card mb-1 border-light text-light" style="width:auto; background-color:black;">
                        <div class="card-body table-responsive">
                            <table class="table text-light border table-sm">
                                <thead class="bg-dark">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Petugas</th>
                                        <th>Siswa</th>
                                        <th>Tgl Bayar</th>
                                        <th>Bln Bayar</th>
                                        <th>Thn Bayar</th>
                                        <th>SPP</th>
                                        <th>Jml Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $angka = 1; ?>
                                    <?php
                                    $result_pembayaran = mysqli_query(
                                        $conn,
                                        "SELECT * FROM pembayaran
                                        INNER JOIN siswa
                                        ON pembayaran.nisn = siswa.nisn
                                        INNER JOIN petugas
                                        ON pembayaran.id_petugas = petugas.id_petugas
                                        INNER JOIN spp
                                        ON pembayaran.id_spp = spp.id_spp
                                        "
                                    );
                                    ?>
                                    <?php while ($pembayaran = mysqli_fetch_assoc($result_pembayaran)) : ?>
                                        <tr class="text-center text_light">
                                            <th><?= $angka++; ?>.</th>
                                            <td><?= $pembayaran['nama_petugas']; ?></td>
                                            <td><?= $pembayaran['nama']; ?></td>
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
            <br>
    </main>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>