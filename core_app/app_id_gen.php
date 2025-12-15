<?php

function generateId($table, $field, $prefix, $length = 6) {
    global $conn;

    $query = "SELECT $field FROM $table ORDER BY $field DESC LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $lastId = $result->fetch_assoc()[$field];
        $number = (int) substr($lastId, strlen($prefix) + 1);
        $number++;
    } else {
        $number = 1;
    }

    return $prefix . "_" . str_pad($number, $length, "0", STR_PAD_LEFT);
}
