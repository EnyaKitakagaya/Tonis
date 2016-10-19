<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
   include "init.inc";
   include "amazonrds.inc";
   
   $banto_cardid = $nfcid;
   fclose($handle);
   $user_cardid = $_POST['user_cardid'];
   $mibun = $_POST['mibun'];

$sum=0;
foreach ($mibun as $key => $v){
  $sum += $v;
}



$sql = "select userid from card where cardid='$banto_cardid'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$bantoid = $result['userid'];

$sql = "select userid,mibun from kaiin where userid='$bantoid'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$bantoid = $result['userid'];
$bantomibun = $result['mibun'];

if (!$bantoid){
    print "<p>登録されたカードではありません！</p>";
    print "<a href=index.php>メニューに戻る</a>";
    exit;
}

if (($bantomibun/2) %2 !=1){
    print "<p>番頭さんのカードではありません！</p>";
    print "<a href=index.php>メニューに戻る</a>";
    exit;
}

$sql = "select userid from card where cardid='$user_cardid'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$userid = $result['userid'];

if ($bantoid == $userid){
    print "<p>自己で有効化はできません！</p>";
    print "<a href=index.php>メニューに戻る</a>";
    exit;
}

$sql = "update kaiin set mibun=$sum, by_id='$bantoid' where userid='$userid'";
$dbh->exec($sql);

$sql = "update card set validity=1, by_id='$bantoid' where userid='$userid'";
$dbh->exec($sql);

print "<p>有効化できました。</p>";
print "<a href=index.php>メニューに戻る</a>";

?>
</html>
