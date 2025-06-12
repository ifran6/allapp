<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standard/<?= $pageName."/".$topic ;?></title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
<div class="header">
    <div class="header-left-box title-box">
        <a href="index.php" class="nav-linker nav-title">
            
                <img src="./assets/images/me.jpg" alt="Enrich-Technologies" class="logo-img">
               
            <span><h4>Enrich-Technologies</h4></span>
        </a>
    </div>
    <div class="header-middle-box search-box">
        <form action="" class="search-form" id="search-form">
            <div class="form-group d-flex">
                <input type="text" id="search-bar" class="form-control w-100" placeholder="search">
                <button type="submit" class="btn btn-dark button-search">Search</button>
            </div>
        </form>
    </div>
    <div class="header-left-box">
    <ul class="super-nav d-flex">
                    <li><a href="pages/user_action.php" class="nav-linker">Sign In</a></li>
                    <!-- <li><a href="pages/user_action.php" class="nav-linker">Register</a></li> -->
                    <!-- <li><a href="#" class="nav-linker">LinedIn</a> -->
                    </ul>
    </div>
</div>