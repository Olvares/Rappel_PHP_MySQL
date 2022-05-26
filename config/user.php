<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
isset($_SESSION['LOGGED_USER']) ?
    $loggedUser = $_SESSION['LOGGED_USER'] : null;
