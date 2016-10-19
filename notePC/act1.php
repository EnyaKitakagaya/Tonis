<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<h1>確認</h1>
<?php
   include "init.inc";
   ?>
<body>
<?php
   print "<p>姓：$sei </p>";
   print "<p>名：$mei </p>";
   print "<p>ハンドル名：$penname </p>";
   print "<p>メール：$mail </p>";
   print "<p>TEL: $tel </p>";
   if ($sex) print "<p>性別：男</p>";
   if (!$sex) print "<p>性別：女</p>";
   print "<p>誕生年：$birthy </p>";
   print "<p>住所：$place </p>";
   print "<p>郵便番号：$postal </p>";
?>
<p>
  これで良ければ、カードをかざした後、確認ボタンを押してください。
  </p>
<form action="act2.php" method="POST">
<?php
   include "hidden.inc";
?>
<input type="submit" value="確認">
</form>
</body>
</html>
