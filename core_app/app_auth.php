<?php
require_once "session.php";

function requireLogin() {
    if (!isset($_SESSION['id_user'])) {
        header("Location: login.php");
        exit;
    }
}

function requireRole($role) {
    if ($_SESSION['role'] !== $role) {
        die("AKSES DITOLAK");
    }
}
