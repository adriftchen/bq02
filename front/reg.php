<!-- 註冊頁面(在會員登入點進去之後才會有 忘記密碼/註冊頁面=>先做login.php) -->
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
     <td><input type="text" name="pw2" id="pw2"></td>
   </tr>
   <tr>
     <td>Step4:信箱(忘記密碼時使用)</td>
     <td><input type="text" name="email" id="email"></td>
   </tr>
   <td><input type="submit" value="註冊"><input type="reset" value="清除"></td>
   <td></td>
  </table>
</fieldset>
</form>
