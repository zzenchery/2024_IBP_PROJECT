<?php
require_once './config/config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username');
    $passwd = filter_input(INPUT_POST, 'passwd');
    $db = getDbInstance();
    $db->where("user_name", $username);
    $row = $db->get('admin_accounts');
    if ($db->count >= 1) {
        $db_password = $row[0]['password'];
        $user_id = $row[0]['id'];
        if (password_verify($passwd, $db_password)) {
            $_SESSION['user_logged_in'] = TRUE;
            $_SESSION['admin_type'] = $row[0]['admin_type'];
            $_SESSION["admin_user_id"] = $user_id;
            header('Location:index.php');

        } else {
            $_SESSION['login_failure'] = "Invalid user name or password";
            header('Location:login.php');
        }
        exit;
    } else {
        $_SESSION['login_failure'] = "Invalid user name or password";
        header('Location:login.php');
        exit;
    }
} else {
    die('Method Not allowed');
}