<?php
require_once('./../config/connect.php');
require_once('./../config/user.php');

// Validation du formulaire
$verif = false;
if (isset($_POST['title']) &&  isset($_POST['recipe'])) {
    $request = 'INSERT INTO recipe(title, recipe, author, is_enable) VALUES (:title, :recipe, :author, :is_enable)';
    $dbp = $db->prepare($request);
    $dbp->execute([
        "title" => $_POST["title"],
        "recipe" => $_POST["recipe"],
        "author" => $loggedUser,
        "is_enable" => 1
    ]);
    $verif = true;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>
        <?php if ($verif) : ?>
            <div class="alert alert-success" role="alert">
                Recette ajouter avec succès !!!
            </div>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                Erreur lors de l'ajout de la recette !!!
            </div>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>