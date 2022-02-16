<?php
include_once '../koneksi.php';

// tangkap id melalui url
$id = $_GET['nisn'];

$query = "DELETE FROM siswa WHERE nisn = $id";

mysqli_query($conn, $query);

$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
    echo "
            <script>
                alert('Data berhasil di dihapus');
                window.location.href = 'index.php?search';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal di dihapus');
                window.location.href = 'detail.php';
            </script>
        ";
}
