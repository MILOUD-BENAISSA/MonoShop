<?php
session_start();
if (isset($_SESSION['yacine'])) {

    $_SESSION['yacine'] = array();
    session_destroy();

    header("location: ../");
} else {
    header("location: ../login.php");
}
