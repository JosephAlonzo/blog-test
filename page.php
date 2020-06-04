<?php 
include('includes/header.php');
if(isset($_GET["article"])){
    $key=$_GET["article"];
    $article = $blogMethods->getArticle($_GET["article"]);
}
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <div class="card p-3 mb-2 bg-white" >
                <div class="card-header text-center p-3">
                    <h2><?= $article['title']?></h2>
                </div>
                <img src="<?= $article['urlToImage']?>" class="card-img-top rounded-lg shadow " alt="image of article">
                <div class="card-body">
                    <p class="mt-2">Posted by <span><?= $users[$key]['name']['first'] . ' ' . $users[$key]['name']['last']?></span> on <?= $blogMethods->changeDateFormat($article['publishedAt'])?></p>
                    <p class="card-text"><?= $article['content']?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <form class="page-form">
                <div class="form-group" >
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Send</button>
            </form>
        </div>

    </div>
</div>



<?php include('includes/footer.php')?>
