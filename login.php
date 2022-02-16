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

        <div class="container mt-3">
            <div class="row">
                <div class="container">
                    <div class="d-flex mb-2 justify-content-center">
                        <img class="border-4 border rounded-circle border-danger mb-2" style="width: 150px; height: 150px;" src="https://web.smkn4pyk.sch.id/wp-content/uploads/2019/04/Logo-SMKN-4-Payakumbuh-PNG.png" alt="" srcset="">
                    </div>

                    <form action="" method="post">
                        <div class="card mb-3 border-light text-light" style="width:auto; background-color:black;">
                            <div class="card-header border-bottom text-center">
                                <div class="row">
                                    <h1>LOGIN</h1>
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
                                    <input name="nisn" type="password" class="text-light btn-outline-info form-control" style="background-color:transparent" id="nisn" placeholder="Masukan NISN siswa">
                                </div>
                                <hr>

                                <center>
                                    <a href="#up" class="btn btn-outline-info">Login</a>
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