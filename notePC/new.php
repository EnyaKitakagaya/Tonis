<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
<h1>会員登録</h1>
<?php
  include "init.inc";
//include "amazonrds.inc";
   ?>
<body>
<form action="act1.php" method="post">
  <p>
    姓：<input type="edit" name="sei">
  </p>
  <p>
    名: <input type="text" name="mei">
  </p>
  <p>    
    ハンドル名（アルファベット）: <input type="text" name="penname">
  </p>
  <p>
    メール：<input type="text" name="mail">
  </p>
  <p>
    TEL：<input type="text" name="tel">
  </p>
  <p>
    誕生年：<input type="text" name="birthy">
  </p>
  <p>
    性別：<input type="radio" name="sex" value="1" checked=checked>男
  <input type="radio" name="sex" value=0>女
  </p>
  <p>
    郵便番号: <input type="text" name="postal">
  </p>
  <p>
    住所: <input type="text" size="80" name="place">
  </p>
  <input type=submit value="送信" />
</form>
</body>
</html>
