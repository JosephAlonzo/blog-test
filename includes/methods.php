<?php
class BlogMethods{
    public $users;
    public $articles;

    public function __construct($apiurl){
        $articles =  $this->getInfoApi($apiurl);
        $this->articles = $articles['articles'];
        $url = 'https://randomuser.me/api/?results='.count($this->articles);
        $users = $this->getInfoApi( $url );
        $this->users = $users['results'];
    }
    public function getInfoApi($apiurl){
        $endpoint = $apiurl;
        $session = curl_init($endpoint);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($session);
        curl_close($session);
        $search_results = json_decode($data,true);
        return $search_results;
    }
    public function getArticle($number){
        return $this->articles[$number];
    }
    public function getArticles($paginationNumber){
        return array_slice($this->articles, (($paginationNumber-1)*10), ($paginationNumber * 10) ); 
    }

    public function changeDateFormat($originalDate){
        return date("d F, Y", strtotime($originalDate));
    }

    public function getNumberOfPagination(){
        $pagination = count($this->articles)/10;
        return (is_float($pagination))? $pagination+1 : $pagination;
    }

    public function site_url($url=null){
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            dirname($_SERVER['PHP_SELF']) .'/'
          ). $url;
    }

    public function uri(){
        return $_SERVER['REQUEST_URI'];
    }
      
}

?>