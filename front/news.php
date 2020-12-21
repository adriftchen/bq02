<fieldset>
  <legend>目前位置:　首頁　>　最新文章區</legend>
  <table>
    <tr>
      <td width="20%">標題</td>
      <td width="60%">內容</td>
      <td width="20%"></td>
    </tr>
    <?php
      $count=$News->count(['sh'=>1]);
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
      <td></td>
    </tr>
    <?php
    }
    ?>
  </table>
  <div class="ct">

<?php
  if(($now-1)>0){
    echo "<a href='index.php?do=news&p=" .($now-1)."' > &lt;  </a>";
  }

  for($i=1;$i<=$pages;$i++){
    $fontsize=($i==$now)?"28px":"18px";
    echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize'> $i </a>"; //製作頁碼
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
</script>