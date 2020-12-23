<?php

include_once "../base.php";

$subject=$_POST['subject']; //可略
$Que->save(['text'=>$subject,'subject'=>0,'count'=>0]); //存主題
$main=$Que->find(['text'=>$subject]);  //去撈剛存入的main[id]給foreach用

foreach($_POST['option'] as $option){
  $Que->save(['text'=>$option,'subject'=>$main['id'],'count'=>0]);
}

to("../backend.php?do=que");

?>