<?php
require_once "../models/UserModel.php";
require_once "../core_app/app_id_gen.php";
require_once "../core_app/session.php";

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function login($username, $password) {
        $user = $this->userModel->getByUsername($username);

        if (!$user) {
            return "User tidak ditemukan";
        }

        if (!password_verify($password, $user['password'])) {
            return "Password salah";
        }

        setSession('id_user', $user['id_user']);
        setSession('username', $user['username']);
        setSession('role', $user['role']);

        header("Location: index.php");
        exit;
    }
}
