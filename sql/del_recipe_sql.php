<?php
require_once('./../config/user.php');
require_once('./../config/connect.php');

// Validation du formulaire
if (!isset($_POST['id'])) {
    $errorMessage = "L'identifiant de la recette est obligatoire";
} else {
    $request = 'DELETE FROM recipes WHERE recipe_id=:id';
    $dbp = $db->prepare($request);
    $dbp->execute([
        "id" => $_POST["id"]
    ]);
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
        <?php include_once('./../components/header.php'); ?>
        <?php if (!isset($errorMessage)) : ?>
            <div class="alert alert-success" role="alert">
                Recette supprimée avec succès !!!
            </div>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorMessage ?>
            </div>
        <?php endif; ?>
        <?= header('location: ' . $rootUrlComp . 'home.php') ?>
    </div>

    <?php include_once('./../components/footer.php'); ?>
</body>

</html>