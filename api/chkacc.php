<?php
//註解要放在api內
//檢查帳號有無重複

include_once "../base.php";

$acc=$_POST['acc'];

$chk=$Mem->count(['acc'=>$acc]);

if($chk){
  echo 1; //帳號重複
}else{
  echo 0; //不存在 可註冊，格式:string
}

?>