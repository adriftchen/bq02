<!-- 為了在front/reg.php使用ajax，建立這個api/reg.php 及資料表mem-->
<?php
include_once "../base.php";

$Mem->save($_POST);
?>