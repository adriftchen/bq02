<fieldset>
  <legend>目前位置:　首頁　>　最新文章區</legend>
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
    
      $all=$News->all(['sh'=>1]," limit $start,$div");
      foreach($all as $news){
    ?>
    <tr>
      <td class="header" id="t<?=$news['id'];?>" style="cursor:pointer;color:blue;text-decoration:underline"><?=$news['title'];?></td> <!-- 設定class="header" 底下寫js -->
      <td>
          <span class="title"><?=mb_substr($news['text'],0,30,'utf8');?>...</span>
          <span class="text" style="display:none"><?=nl2br($news['text']);?></span>  <!-- nl2br(string) 函數在字符串中的每個新行(\n) 之前插入HTML 換行符(<br />)。 -->
      </td>  
      <td>
      <?php
      //先去增加一張資料表log(id、acc、news)，記錄誰點擊過，並且在登入的情況下才能看
      if(!empty($_SESSION['login'])){
        $chk=$Log->count(['acc'=>$_SESSION['login'],'news'=>$news['id']]); /* 判斷log表單某acc有沒有對某news按過讚 */
        if($chk){
      ?>

       <a href='#' class="kk" id="news<?=$news['id'];?>">收回讚</a>

      <?php
      
       }else{
      ?>

        <a href='#' class="kk" id="news<?=$news['id'];?>">讚</a>
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
    echo "<a href='index.php?do=news&p=" .($now-1)."' > &lt;  </a>";
  }

  for($i=1;$i<=$pages;$i++){
    $fontsize=($i==$now)?"28px":"18px";
    echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize'> $i </a>";
  }

  if(($now+1)<=$pages){
    echo "<a href='index.php?do=news&p=" .($now+1)."' > &gt;  </a>";
  }
?>

</div>
</fieldset>

<script>
$(".header").on("click",function(){
  $(this).next().children('.title').toggle() /* 一個隱藏 另一個就顯示 */
  $(this).next().children('.text').toggle()
})

// 用jQ，只帶一個變數，可控制流量
$(".kk").on("click",function(){
  let id=$(this).attr('id')).replace("news","")
  let text=$(this).text();
  // console.log(text)
  if(text=='讚'){
    $($this).text('收回讚')
  }else{
    $(this).text('讚')
  }
  $.post("api/good.php",{id})

})
</script>