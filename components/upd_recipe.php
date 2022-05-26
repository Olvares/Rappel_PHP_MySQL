<?php
require_once('./../config/user.php'); // To be loaded first
require_once('./../config/connect.php');

if (!isset($_GET['id'])) {
    $errorMessage = "L'identifiant de a recette doit être renseigné.";
} else {
    $id = $_GET['id'];

    $request = "SELECT * FROM recipes WHERE recipe_id = :id";
    $dbp = $db->prepare($request);
    $dbp->execute([
        'id' => $id
    ]);
    $recipeExist = $dbp->fetch(PDO::FETCH_ASSOC);
    if ($recipeExist) {
        $title = $recipeExist['title'];
        $recipe = $recipeExist['recipe'];
        $is_enabled = $recipeExist['is_enabled'];
    } else {
        $errorMessage = "Cette recette (cet id) n'existe pas dans la base de données.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Mise à jour de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>

        <!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
        <?php if (isset($loggedUser)) : ?>
            <?php if (!isset($errorMessage)) : ?>
                <form action=<?= $rootUrlSql . "upd_recipe_sql.php" ?> method="post">
                    <div class="mb-3 visually-hidden">
                        <label for="id" class="form-label">Identifiant de la recette</label>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $id ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Ajouter un titre</label>
                        <input type="text" name="title" class="form-control" placeholder="Titre de la recette" value="<?= $title ?>"></input>
                    </div>
                    <div class="mb-2">
                        <label for="recipe" class="form-label">Description de la recette</label>
                        <textarea class="form-control" placeholder="Décrivez la recette ici" name="recipe"><?= $recipe ?></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="is_enabled" <?= $is_enabled ? "checked" : null ?>>
                        <label class="form-check-label" for="flexCheckChecked">
                            Activer
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
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