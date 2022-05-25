<?php
require_once('./config/connect.php');

// Get the information from the database
$sqlQuery = 'SELECT * FROM recipes';
$recipesStatement = $db->prepare($sqlQuery); // Select all
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['author']; ?></p>
<?php
}

$sqlQuery = 'SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled'; // markers

$dbp = $db->prepare($sqlQuery);
$dbp->execute([
    'author' => 'mathieu.nebra@exemple.com',
    'is_enabled' => true,
]);
$recipes = $dbp->fetchAll();

foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['title']; ?></p>
<?php
}
?>