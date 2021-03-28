<?php
//function to output header of the html page and body with body class
function outputHeader($title){
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo "<title> GTO-$title</title>";
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<meta http-equiv="X-UA-Compatible" content="ie=edge">';
    echo '<link rel="stylesheet" type="text/css" href="css/styling.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>';

    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
    echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
    echo '</head>';
    echo "<body class='$title-body'>";
}

/* funciton to output the banner and the navigation bar
    The selected class is applied to the page that matches the page name variable */
function outputNavigation($pageName){
    //Output banner and first part of navigation
    echo '<div class="row">';
    echo '<div class="container navigationBar">';
    echo "<nav class='navbar fixed-top navbar-expand-lg navBarSizing rounded'>";
    echo '<a class="navbar-brand" href="index.php">Guess the Outline Shop</a>';
    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
    echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
    echo '<div class="collapse navbar-collapse row" id="navbarSupportedContent">';
    echo '<form class="form-inline my-2 my-lg-0 ml-3 searchBar">';
    echo '<input class="form-control col-8 r px-5" type="search" placeholder="Search" aria-label="Search">';
    echo '<button class="btn btn-outline-warning my-2 my-sm-0 ml-3" type="submit">Search</button>';
    echo '</form>';
    echo '<ul class="navbar-nav navColor mx-5">';
    
    
    
    //Array of pages to link to
    $linkNames = array("Products", "Account", "Cart");
    $linkAddresses = array("products.php","login.php","signup.php","cart.php");
    
    //Output navigation
    for($x = 0; $x < count($linkNames); $x++){
        
        $y = $x+1; 
        if($linkNames[$x] == $pageName){
            echo '<li class="nav-item active navColour">';
        }
        elseif ($linkNames[$x] == "Account"){
            echo '<li class="nav-item dropdown">';
        }
        else{
        echo '<li class="nav-item">';
        }
        if($linkNames[$x] == "Account"){
            
            echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            echo 'Account';
            echo '</a>';
            echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            session_start();
            if( array_key_exists("loggedInUserEmail", $_SESSION) ){
                echo '<a class="dropdown-item" href="profile.php">Profile</a>';
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                echo '</div>';
                echo '</li>';
            }
            else{
                echo '<a class="dropdown-item" href="login.php">Login</a>';
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item" href="signup.php">Sign up</a>';
                echo '</div>';
                echo '</li>';
                
            }
     
        }
        elseif($linkNames[$x] == "Cart"){
        echo '<a href="cart.php" class="nav-link">' .'<i class="fas fa-shopping-cart fa-lg"></i>  </a>';
        echo '</li>';
        }
        else{
        echo '<a href="' . $linkAddresses[$x] . '" class="nav-link">' . $linkNames[$x] . '</a>';
        echo '</li>';
        }
        
        }
    
    echo '</ul>';
    echo '</div>';
    echo '</nav>';
    echo '</div>';
    echo '</div>';
}


//function to output footer, closing body tag, closing div tag and closing HTML tag
function outputFooter(){
    echo '<footer class="end"> Thanks for Visiting. If you have any queries contact the <a href="mailto:lc1128@live.mdx.ac.uk">developer</a>.
     Copyright &copy; 2019 All rights reserved.';
    echo '</footer>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}

