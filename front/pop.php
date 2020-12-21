<fieldset>
  <legend>目前位置:　首頁　>　人氣文章區</legend>
  <table>
    <tr>
      <td width="20%">標題</td>
      <td width="60%">內容</td>
      <td width="20%"></td>
    </tr>
    <?php
      $count=$News->count(['sh'=>1]); /* 複製自backend/news.php，改['sh'=>1]*/
      $div=5;
      $pages=ceil($count/$div);
      $now=(isset($_GET['p']))?$_GET['p']:1;
      $start=($now-1)*$div;
    
      $all=$News->all(['sh'=>1]," order by good desc limit $start,$div");
      foreach($all as $news){
    ?>
    <tr>
      <td class="header" id="t<?=$news['id'];?>" style="cursor:pointer;color:blue;text-decoration:underline"><?=$news['title'];?></td> <!-- 設定class="header" 底下寫js -->
      <td class="tt" style="position:relative">
          <span class="title"><?=mb_substr($news['text'],0,30,'utf8');?>...</span>
          <div class="text all">
          <h3><?=$typeStr[$news['type']];?></h3>
          <?=nl2br($news['text']);?>
          </div>
      </td>  
      <td>
        <!-- 給id 定位dom，給js去作用收回讚、按讚等-->
        <span id="vie<?=$news['id'];?>"><?=$news['good'];?></span>個人說<img src="icon/02B03.jpg" style="width:20px;height:20px">

      <?php
      //先去增加一張資料表log(id、acc、news)，記錄誰點擊過，並且在登入的情況下才能看
      if(!empty($_SESSION['login'])){
        $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$news['id']]); /* 判斷log表單某acc有沒有對某news按過讚 */
        if($chk){
      ?>

       <a href='#' id="news<?=$news['id'];?>" onclick="good('<?=$news['id'];?>','<?=$_SESSION['login'];?>','2')">收回讚</a>

      <?php
      
       }else{
      ?>

        <a href='#' id="news<?=$news['id'];?>" onclick="good('<?=$news['id'];?>','<?=$_SESSION['login'];?>','1')">讚</a>
        <?php
       }
      }
      
      ?>
      
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
  <!-- 複製自backend/news.php，改a:link路徑index.php... -->
  <div class="ct">

<?php
  if(($now-1)>0){
    echo "<a href='index.php?do=pop&p=" .($now-1)."' > &lt;  </a>";
  }

  for($i=1;$i<=$pages;$i++){
    $fontsize=($i==$now)?"28px":"18px";
    echo "<a href='index.php?do=pop&p=$i' style='font-size:$fontsize'> $i </a>";
  }

  if(($now+1)<=$pages){
    echo "<a href='index.php?do=pop&p=" .($now+1)."' > &gt;  </a>";
  }
?>

</div>
</fieldset>

<script>
$(".header").hover(function(){
  $(this).next().children('.text').toggle()
})

$(".tt").hover(function(){
    $(this).children('.text').toggle()

})
</script>