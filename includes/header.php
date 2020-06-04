<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<?php 
include('includes/methods.php');

$blogMethods = new BlogMethods('http://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=fa0e991db9d04729993ef0ab8bce0dfd');
$users = $blogMethods->users;
$currentPage= (isset($_GET['currentPage']))? $_GET['currentPage']: 1;
$articles = $blogMethods->getArticles($currentPage);
?>
<header>
    <div class="logo m-auto">
        <img src="images/logo.svg" alt="logo">
        <h1>BLOG NEWS</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light pl-5 p-3">
        <a class="navbar-brand" href="#">News</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav center-text">
            <li class="nav-item active">
                <a class="nav-link" href="<?= $blogMethods->site_url('index.php') ?>">Top business headlines<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >Bitcoin news</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" >Apple articles</a>
            </li>
            </ul>
        </div>
    </nav>
</header>