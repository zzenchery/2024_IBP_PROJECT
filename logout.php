<?php
require_once './config/config.php';
session_start();
session_destroy();
header('Location:index.php');
exit;
?>