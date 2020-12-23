<?php

//從front/vote.php 複製

$id=$_GET['id'];
$subject=$Que->find($id); //撈到問題
$options=$Que->all(['subject'=>$id]);  //撈選項
?>

<fieldset>
  <legend>目前位置: 首頁　>問卷調查> <?=$subject['text'];?></legend>
  <h3><?=$subject['text'];?></h3>
<form action="api/vote.php" method="post">
  <table>
  <?php
  foreach($options as $key => $option){
    $div=($subject['count']!=0)?$subject['count']:1;
    $rate=$option['count']/$div;
    
    //同上，但完成功能要多投一些選項。分母不得為0
    // $rate=$option['count']/$subject['count'];
  ?>
    <tr>
      <td width="50%">
        <?=$key+1;?>
        <?=$option['text'];?>
      </td>
      <td>
      <div style="display:inline-block;height:25px;background:#999;width:<?=100*$rate;?>%"></div>
        <?=$option['count'];?>票(<?=round(($rate)*100,2);?>%)  <!-- 2表示小數後取兩位 -->
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
      <input type="hidden" name="subject" value="<?=$subject['id'];?>">
  <div class="ct"><a href="index.php?do=que"><button type="button">返回</button></a></div> <!-- button包在form裡 要加type="button"-->
</form>
</fieldset>