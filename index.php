<?php
define('ROOT', __DIR__);
define('DB_USERS', ROOT . '/db/users.json');
define('STORAGE', ROOT . '/storage');
session_start();
// if(!isset($_SESSION['login'])){
//     $_SESSION['login'] = false;
// }

//  $_SESSION['login'] = false;
include_once('./services/auth_service.php');
// include_once('../tools/dd.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>GalleryApp</title>
</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href=".">Gallary</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php?page=registration">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php?page=login">LogIn</a>
                            </li>
                            <?php
                                if(isLogin()):                            
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php?page=load">Load images</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php?page=gallery">Your album</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php?scripts=logout">LogOut</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row justify-content-center">
            
            <!-- подгрузка контента динамически -->
            <?php 
            if(isset($_GET['scripts']))
            {
                switch($_GET['scripts']){
                    case 'logout':
                        include_once('./scripts/logout.php');
                        break;
                    default:
                        include_once('./pages/404.php');
                    }
            }
            $priv_pages = [
                'load', 'gallery',
            ];
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                if(in_array($page, $priv_pages) && !isLogin()){
                    header("Location: index.php?page=login");
                }
                switch($page){
                    case 'registration':
                        include_once('./pages/registration.php');
                        break;
                    case 'login':
                        include_once('./pages/login.php');
                        break;
                    case 'load':
                        include_once('./pages/load.php');
                        break;
                    case 'gallery':
                        include_once('./pages/gallery.php');
                        break;
                    case 'logout':
                        include_once('./scripts/logout.php');
                        break;
                    default:
                        include_once('./pages/404.php');
                }
            }

            
            
            ?>
        </div>
    </div>


    <script src="./js/bootstrap.min.js"></script>
</body>

</html>