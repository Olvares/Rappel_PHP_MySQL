<?php

$request = "SELECT * FROM users";
$dbp = $db->prepare($request);
$dbp->execute();
$users = $dbp->fetchAll();

if (isset($loggedUser)) {
    $author = $loggedUser['email'];
    $request = "SELECT * FROM recipes WHERE author = :author";
    $dbp = $db->prepare($request);
    $dbp->execute([
        "author" => $author
    ]);
    $recipes = $dbp->fetchAll();

    if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
        $limit = (int) $_GET['limit'];
    } else {
        $limit = 10;
    }
}

$rootUrl = "http://localhost/rappelphp/";
$rootUrlComp = $rootUrl . "components/";
$rootUrlSql = $rootUrl . "sql/";
