<?php
require_once "../routes/app_routes.php";
require_once "../core/auth.php";
requireLogin();

echo "SELAMAT DATANG DI PERPUSTAKAAN DIGITAL, " . $_SESSION['username'];
