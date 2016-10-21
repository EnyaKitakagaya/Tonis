<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
//
// カードをかざして会員登録情報を表示するツール by 2016-10-16 penkich
//
   include "init.inc";
   include "amazonrds.inc";

   $sql = "select *,created_at +interval +9 hour as card_created_at from card where cardid = '$nfcid'";
   $stmt = $dbh->query($sql);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   $userid = $result['userid'];
   $validity = $result['validity'];
   $card_created_at = $result['card_created_at'];
   $card_by_id = $result['by_id'];

   $sql = "select *,created_at +interval +9 hour as jst_created_at from kaiin where userid = '$userid'";
   $stmt = $dbh->query($sql);
   $result = $stmt->fetch(PDO::FETCH_ASSOC);

   $sei = $result['sei'];
   $mei = $result['mei'];
   $penname = $result['penname'];   
   $mail = $result['mail'];
   $tel = $result['tel'];
   $age = $result['age'];
   $sex = $result['sex'];
   $birthy = $result['birthy'];
   $place = $result['place'];
   $postal = $result['postal'];
   $by_id = $result['by_id'];
   $mibun = $result['mibun'];
   $created_at = $result['jst_created_at'];
   $by_id = $result['by_id'];
?>
<body>
<?php
   print "<p>カード作成日:" . $card_created_at . "</P>";     
   print "<p>有効性：" . $validity . "</p>";
   print "<p>カード作成番頭：" . $card_by_id . "</p>";
   print "<p>会員番号:" . $userid . "</P>";
   print "<p>会員登録日:" . $created_at . "</P>";   
   print "<p>姓：" . $sei . "</p>";
   print "<p>名：" . $mei . "</p>";
   print "<p>ハンドル名：" . $penname . "</p>";
   print "<p>メール：" . $mail . "</p>";
   print "<p>TEL：" . $tel . "</p>";
   print "<p>性別：" . $sex . "</p>";
   print "<p>誕生年：" . $birthy . "</p>";
   print "<p>住所：" . $place . "</p>";
   print "<p>郵便番号：" . $postal . "</p>";
   print "<p>対応番頭：" . $by_id . "</p>";
   print "<p>身分：" . $mibun . "</p>";

?>
<a href=index.php>メニューに戻る</a>
</body>
</html>
