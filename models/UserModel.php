<?php

class UserModel {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function getByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? AND status = 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO users (id_user, nama, username, password, id_role)
             VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "sssss",
            $data['id_user'],
            $data['nama'],
            $data['username'],
            $data['password'],
            $data['id_role']
        );

        return $stmt->execute();
    }
}
