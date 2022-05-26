<?php

function display_recipe(array $recipe) //: string
{
    $recipe_content = '';

    if ($recipe['is_enabled']) {
        $recipe_content = '<article>';
        $recipe_content .= '<h3>' . $recipe['title'] . '</h3>';
        $recipe_content .= '<div>' . $recipe['recipe'] . '</div>';
        $recipe_content .= '<i>' . $recipe['author'] . '</i>';
        $recipe_content .= '</article>';
    }

    return $recipe_content;
}

function display_author(string $authorEmail, array $users) //: string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }
}

function get_recipes(array $recipes, int $limit): array
{
    $valid_recipes = [];
    $counter = 0;

    foreach ($recipes as $recipe) {
        if ($counter == $limit) {
            return $valid_recipes;
        }

        if ($recipe['is_enabled']) {
            $valid_recipes[] = $recipe;
            $counter++;
        }
    }

    return $valid_recipes;
}

function updDelRecipeBtn(string $add, string $upd, string $del): string
{
    $btns = '<a href="' . $add . '" class="btn btn-success mx-3">Ajouter</a>';
    $btns .= '<a href="' . $upd . '" class="btn btn-warning mx-3">Mettre à jour</a>';
    $btns .= '<a href="' . $del . '" class="btn btn-danger mx-3">Suprrimer</a>';
    return $btns;
}
