<?php
session_start();
session_destroy();
header("location:/Sekolah/admin/login.php");
