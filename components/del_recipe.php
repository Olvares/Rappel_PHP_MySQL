<?php
require_once('./../config/user.php'); // To be loaded first
require_once('./../config/connect.php');

if (!isset($_GET['id'])) {
    $errorMessage = "L'identifiant de a recette doit être renseigné.";
} else {
    $id = $_GET['id'];

    $request = "SELECT title FROM recipes WHERE recipe_id = :id";
    $dbp = $db->prepare($request);
    $dbp->execute([
        'id' => $id
    ]);
    $recipeExist = $dbp->fetch(PDO::FETCH_ASSOC);
    $recipeExist ?
        $recipe = $recipeExist['title'] :
        $errorMessage = "Cette recette (cet id) n'existe pas dans la base de données.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Suppression de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>

        <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
        <?php if (isset($loggedUser)) : ?>
            <?php if (!isset($errorMessage)) : ?>
                <h2>Suppression de la recette <?= $recipe ?></h2>
                <form action=<?= $rootUrlSql . "del_recipe_sql.php" ?> method="post">
                    <div class="mb-3 visually-hidden">
                        <label for="id" class="form-label">Identifiant de la recette</label>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $id ?>"></input>
                    </div>
                    <button type="submit" class="btn btn-primary mx-3">Valider</button>
                    <a href=<?= $rootUrlComp . "home.php" ?> class="btn btn-secondary mx-3">Annuler</a>
                </form>
            <?php else : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errorMessage ?>
                </div>
            <?php endif; ?>
            <!-- Si utilisateur/trice bien connectée on affiche un message de succès -->
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                Vous devez être connecté pour éditer une recette.
            </div>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>