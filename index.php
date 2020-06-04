<?php 
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <?php foreach($articles as $key=>$article) {?>
            <div class="card p-3 mb-2 bg-white" >
                <div class="card-header text-center p-3">
                    <h2><?= $article['title']?></h2>
                </div>
                <img src="<?= $article['urlToImage']?>" class="card-img-top rounded-lg shadow " alt="image of article">
                <div class="card-body">
                    <p class="mt-3">Posted by <span><?= $users[$key]['name']['first'] . ' ' . $users[$key]['name']['last']?></span> on <?= $blogMethods->changeDateFormat($article['publishedAt'])?></p>
                    <p class="card-text"><?= $article['description']?></p>
                </div>
                <div class="card-footer">
                    <a  href="page.php?article=<?=$key+(($currentPage-1)*10)?>">Read More</a>
                </div>
            </div>
            <?php } ?>  
        </div>
        <div class="col-md-4 mt-4 horizontal-card">
            <h3 class="">YOU MIGHT ALSO LIKE</h3>
            <?php foreach($articles as $key=>$article) {?>
                <div class="card mb-3 mt-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?= $article['urlToImage']?>" class="card-img" alt="image">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body horizontal-card">
                            <h5 class="card-title"><a href="page.php?article=<?=$key+(($currentPage-1)*10)?>"><?= $article['title']?></a></h5>
                            <p class="card-text"><?= substr($article['description'],0, 100). '...'?></p>
                            <p class="card-text"><small class="text-muted">Last updated <?=rand(0, 15)?> mins ago</small></p>
                        </div>
                        </div>
                    </div>
                </div>
            <?php } ?>  
        </div>
    </div>
    <div class="col-12 col-md-12">
        <nav aria-label="navigation" id="navigation" class="pb-4">
            <ul class="pagination justify-content-end">
                <li class="page-item <?=($currentPage==1)?'disabled':''?>">
                <a class="page-link" href="<?=$blogMethods->site_url('?currentPage='.($currentPage-1))?>" tabindex="-1" aria-disabled="<?=($currentPage==1)?'true':'false'?>">Previous</a>
                </li>
                <?php 
                for ($i=1; $i <= $blogMethods->getNumberOfPagination() ; $i++) { 
                    if($i == $currentPage){
                        echo'
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">'.$i.'<span class="sr-only">(current)</span></a>
                        </li>';
                    }
                    else if ($i > $currentPage){
                    echo'
                    <li class="page-item">
                    <a class="page-link" href="'.$blogMethods->site_url('?currentPage='.($currentPage+1)).'">'.$i.'</a>
                    </li>';
                    }
                    else {
                        echo'
                        <li class="page-item">
                        <a class="page-link" href="'.$blogMethods->site_url('?currentPage='.($currentPage-1)).'">'.$i.'</a>
                        </li>';
                    }
                }?>
                <li class="page-item  <?=($currentPage==$blogMethods->getNumberOfPagination())?'disabled':''?>">
                    <a class="page-link" href="<?=$blogMethods->site_url('?currentPage='.($currentPage+1))?>" aria-disabled="<?=($currentPage==$blogMethods->getNumberOfPagination())?'true':'false'?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php include('includes/footer.php')?>


