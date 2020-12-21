<fieldset>
  <legend>目前位置:　首頁　>　最新文章區</legend>
  <table>
    <tr>
      <td width="20%">標題</td>
      <td width="60%">內容</td>
      <td width="20%"></td>
    </tr>
    <?php
      $all=$News->all(['sh'=>1]);
      foreach($all as $news){
    ?>
    <tr>
      <td id="t<?=$news['id'];?>"><?=$news['title'];?></td>
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
</fieldset>