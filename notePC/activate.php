<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<h1>活性化</h1>
<?php

include "init.inc";

   $user_cardid = $nfcid;
   fclose($handle);

?>
<form action="activate_exe.php" method="POST">
<p>
  資格：
     <input type="checkbox" name="mibun[]" value="1" checked="checked">定期利用
     <input type="checkbox" name="mibun[]" value="2">番頭
     <input type="checkbox" name="mibun[]" value="4">インストラクタ
     <input type="checkbox" name="mibun[]" value="8">法人側スタッフ
</p>
<p>
これで良ければ、（番頭さんの）カードをかざした後、確認ボタンを押してください。
<input type="hidden" name="user_cardid" value="<?php echo $user_cardid; ?>">
</p>
<p>
  <input type="submit" value="確認">
</p>
</form>
</html>
