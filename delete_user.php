<?php
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
$db = getDbInstance();
if ($_SESSION['admin_type'] != 'super') {
    header('HTTP/1.1 401 Unauthorized', true, 401);
    exit("401 Unauthorized");
}
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Only super admin is allowed to access this page
    if ((int)$del_id === (int)$_SESSION["admin_user_id"]) {
        $_SESSION['failure'] = "You cannot delete yourself.";
        header('location: admin_users.php');
        exit;
    }

    $db->where('id', $del_id);
    $stat = $db->delete('admin_accounts');
    if ($stat) {
        $_SESSION['info'] = "User deleted successfully!";
        header('location: admin_users.php');
        exit;
    }
}