<?php

include_once "../base.php";

$type=$_GET['type'];

$news=$News->all(['type'=>$type]);

foreach($news as $n){
  echo "<a href='javascript:getNews({$n['id']})' style='display:block'>{$n['title']}</a>"; //getNews({$n['id']}給文章id，撈到文章內容
}


?>