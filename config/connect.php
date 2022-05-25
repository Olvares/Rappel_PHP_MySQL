<?php
// setcookie(
//     'LOGGED_USER',
//     'laurene.castor@exemple.com',
//     [
//         'expires' => time(), // + 365 * 24 * 3600,
//         'secure' => true,
//         'httponly' => true,
//     ]
// );
//session_destroy();


// Data base information
$host = 'localhost';
$dbname = 'my_recipes';
$my_id = 'root';
$pswd = '';
// Connecting to the database
try {
    $db = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8',
        $my_id,
        $pswd,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
