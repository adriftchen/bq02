<?php

include_once "../base.php";

$type=$_GET['type'];

$news=$News->all(['type'=>$type]);

$result=[]; //二維陣列


foreach($news as $n){
  $result[]=[
    'title'=>$n['title'],
    'id'=>$n['id']
  ];
}


echo json_encode($result);

?>