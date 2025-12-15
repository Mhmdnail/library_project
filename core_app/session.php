<?php

if (!session_id()) {
    session_start();
}

function setSession($key, $value) {
    $_SESSION[$key] = $value;
}

function getSession($key) {
    return $_SESSION[$key] ?? null;
}

function destroySession() {
    session_destroy();
}
