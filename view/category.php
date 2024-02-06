<?php

/*Genera header navegable que fa les crides a fetch*/
function printCategoryHeader($categories)
{
   
    foreach($categories as $instance)
    {
    	$category_name = htmlentities($instance['category_name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        echo '<li class="nav-item li-cat-pd">';
        echo '<button class="category-button" id="'.$instance["category_id"].'" onclick="fetchData('."'".$instance["category_id"]."'".')">';
        echo $category_name;
        echo '</button>';
        echo '</li>';
    }
    
}

/*Genera les cartes de la main page*/
function printCategoryCards($categories)
{
    echo '<section id="category_cards" class="home-page-categories" style="grid-area: categories;">';
    foreach ($categories as $category)
    {
    	$category_name = htmlentities($category['category_name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        echo '<div class="home-page-card">';
            echo '<a class="a-cat-pd" id = "'.$category['category_id'].'" href="index.php?resource=products&category='.$category['category_id'].'">';
                echo '<h5>'.$category_name.'</h5>';
                echo '<p class="p-cat">'.$category['category_description'].'</p>';
                echo '<img src="'.$category['category_image'].'" alt="'.$category_name.' image here">'; 
            echo '</a>';
        echo '</div>';
    }
    echo '</section>';
}

/*Genera el nom i la descripció de les categories que se li enviin */
function printCategoryDescription($categories)
{
    echo '<section class="category-title" style="grid-area: category-title;">';
        foreach ($categories as $instance)
        {
            $category_name = htmlentities($instance['category_name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            echo '<h2 id="h2-cat">'.$category_name.'</h2>';
            echo '<p class="p-cat">'.$instance['category_description'].'</p>';
        }    
    echo '</section>';
}

