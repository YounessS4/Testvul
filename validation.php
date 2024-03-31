<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["login"]) || empty($_POST["password"])) {
        header("Location: loginn.html?error=1");
        exit;
    } else {
        $login = $_POST["login"];
        $password = $_POST["password"];
        if ($login === USERLOGIN && $password === USERPASS) {
           
            header("Location: index.html");
            exit;
        } else {
            header("Location: loginn.html?error=2");
            exit;
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["afaire"]) && $_GET["afaire"] == "deconnexion") {
    session_destroy();
    header("Location: login.php?error=3");
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>
