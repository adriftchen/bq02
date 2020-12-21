<form action="api/editnews.php" method="post"></form>
<table class='ct' style="width:100%">
<tr>
  <td width="10%">編號</td>
  <td width="70%">標題</td>
  <td width="10%">顯示</td>
  <td width="10%">刪除</td>
</tr>
<?php
  //製作分頁
  $count=$News->count();
  $div=3; //一頁三筆
  $pages=ceil($count/$div);
  $now=(isset($_GET['p']))?$_GET['p']:1;
  $start=($now-1)*$div;

  $all=$News->all(" limit $start,$div");
  foreach($all as $key=>$news){

  
?>
<tr>
  <td><?=$start+$key+1;?>.</td> <!-- key起始值為0，要+1。-->
  <td><?=$news['title'];?></td>
  <td><input type="checkbox" name="sh[]" value="<?=$news['id'];?>" <?=($news['sh']==1)?"checked":"";?>></td>
  <td><input type="checkbox" name="del[]" value="<?=$news['id'];?>"></td>
  <input type="hidden" name="id[]" value="<?=$news['id'];?>">
</tr>
<?php
}
?>
</table>
<div class="ct">

<?php
  if(($now-1)>0){
    echo "<a href='backend.php?do=news&p=" .($now-1)."' > &lt;  </a>";
  }

  for($i=1;$i<=$pages;$i++){
    $fontsize=($i==$now)?"28px":"18px";
    echo "<a href='backend.php?do=news&p=$i' style='font-size:$fontsize'> $i </a>"; //製作頁碼
  }

  if(($now+1)<=$pages){
    echo "<a href='backend.php?do=news&p=" .($now+1)."' > &gt;  </a>";
  }
?>

</div>
<div class="ct"><input type="submit" value="確定修改"></div>
</form>