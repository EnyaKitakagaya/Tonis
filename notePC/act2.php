<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php

   include "init.inc";
   include "amazonrds.inc";
   
function mk_number(){
    $s =  date('y') . sprintf("%03d",rand(1,999));
    $chk = ($s[0]*6 + $s[1]*5 + $s[2]*4 + $s[3]*3 + $s[4]*2)%10;
    return ($s . $chk);
}

$sql = "select count(*) as count from card where cardid = '$nfcid'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $result['count'];
if ($count){
    print "このカードは既に登録されています。<br>";
    print "<a href=index.php>メニューに戻る</a>";
    exit;
}

do {
    $userid = mk_number();
    $sql = "select count(*) as count from kaiin where userid = '$userid'";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $result['count'];
} while($count);


$sql = "insert into card(cardid,userid) values('$nfcid','$userid')";
$dbh->exec($sql);
$stmt = $dbh->prepare("insert into kaiin(userid,sei,mei,penname,mail,tel,age,sex,birthy,place,postal) values(:userid,:sei,:mei,:penname,:mail,:tel,:age,:sex,:birthy,:place,:postal)";
$stmt->bindValue(':userid',$userid);
$stmt->bindValue(':sei',$sei);
$stmt->bindValue(':mei',$mei);
$stmt->bindValue(':penname',$penname);
$stmt->bindValue(':mail',$mail);
$stmt->bindValue(':tel',$tel);
$stmt->bindValue(':age',$age);
$stmt->bindValue(':sex',$sex);
$stmt->bindValue(':birthy',$birthy);
$stmt->bindValue(':place',$place);
$stmt->bindValue(':postal',$postal);
$dbh->exec($sql);
                      
print "登録しました。このPCを番頭さんへ渡してください。";
print "<a href=index.php>メニューに戻る</a>";
?>
</html>
