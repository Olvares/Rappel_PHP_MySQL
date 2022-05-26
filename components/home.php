<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <!-- Navigation -->
        <?php include_once('header.php'); ?>

        <!-- Inclusion du formulaire de connexion -->
        <?php include_once('login.php'); ?>
        <!-- Si l'utilisateur existe, on affiche les recettes -->
        <?php if (isset($loggedUser)) :
        ?>
            <h1>Site de Recettes !</h1>

            <?php foreach (get_recipes($recipes, $limit) as $recipe) : ?>
                <article class="mb-3">
                    <h3><?php echo $recipe['title']; ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <i><?php echo display_author($recipe['author'], $users); ?></i>
                    <div class="mt-2">
                        <a href=<?= $rootUrlComp . "add_recipe_form.php" ?> class="btn btn-success mx-3"> Ajouter </a>
                        <a href=<?= $rootUrlComp . "upd_recipe.php?id=" . $recipe['recipe_id'] ?> class="btn btn-warning mx-3"> Mettre à jour </a>
                        <a href=<?= $rootUrlComp . "del_recipe.php?id=" . $recipe['recipe_id'] ?> class=" btn btn-danger mx-3"> Supprimer </a>
                    </div>
                </article>
            <?php endforeach; ?>
            <!-- <a href="add_recipe_form.php" class="btn btn-primary">Ajouter</a> -->
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>