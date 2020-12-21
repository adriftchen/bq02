<fieldset>
<!-- 製作刪除帳號的頁面，第一題有 -->
  <legend>帳號管理</legend>
  <!-- form表單把以下全部包起來 -->
  <form action="api/deladmin.php" method="post"> 
    <table style="width:50%;margin:auto">
    <tr>
      <td>帳號</td>
      <td>密碼</td>
      <td>刪除</td>
    </tr>
    <?php
    // $mems=$Mem->all(" where acc !='admin' "); 管理者帳號不可被刪，只撈admin以外的帳號
    // print_r($mems); 印出來看是否有撈到資料
    $mems=$Mem->all();
    foreach($mems as $mem){
      if($mem['acc']!='admin'){ //管理者帳號不可被刪，不顯示admin
      

    ?>
    <tr>
      <td><?=$mem['acc'];?></td>
      <td><?=str_repeat("*",strlen($mem['pw']));?></td>
      <td><input type="checkbox" name="del[]" value="<?=$mem['id'];?>"></td>
    </tr>
    <?php
        }
      }
    ?>

    </table>

    <div class="cent ct">
    <input type="submit" value="確定刪除">
    <input type="reset" value="清空選取">
    </div>
    </form>


<h1>新增會員</h1>
<!-- 以下自front/reg.php複製，記得改最後更新完的路徑location.reload(); -->
<form>
<fieldset>
  <legend>會員註冊</legend>
  <div style="color:red">"請設定要註冊的帳號及密碼(最長12字元)"</div>
  <table>
   <tr>
     <td>Step1:登入帳號</td>
     <td><input type="text" name="acc" id="acc"></td>
   </tr>
   <tr>
     <td>Step2:登入密碼</td>
     <td><input type="password" name="pw" id="pw"></td>
   </tr>
   <tr>
     <td>Step3:再次確認密碼</td>
     <td><input type="password" name="pw2" id="pw2"></td>
   </tr>
   <tr>
     <td>Step4:信箱(忘記密碼時使用)</td>
     <td><input type="text" name="email" id="email"></td>
   </tr>
   <td><input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除"></td> <!-- 利用button觸發api/reg.php -->
   <td></td>
  </table>
</fieldset>
</form>
<script>

function reg(){
    let acc=$("#acc").val()
    let pw=$("#pw").val()
    let pw2=$("#pw2").val()
    let email=$("#email").val()
    if(acc=="" || pw=="" || pw2=="" || email==""){
        alert("不可空白")
    }else if(pw!=pw2){
        alert("密碼錯誤")
    }else{
        $.post("api/chkacc.php",{acc},function(res){
          // console.log(res) 用來檢查錯誤
            if(res=='1'){
                alert("帳號重覆")
            }else{
                $.post("api/reg.php",{acc,pw,email},function(){
                    // location.href='backend.php?do=admin';  新增完回到本頁同下，不可以用to()那是前台用的
                    location.reload();
                })
            }
        })
    }

}



</script>

</fieldset>


