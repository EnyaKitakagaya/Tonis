<html>
<?php
//
// カードをかざして会員登録情報を表示するツール by 2016-10-16 penkich
//

$handle = fopen("/tmp/nfcid", "r");
$nfcid = substr(fgets($handle),-16);

$dbhost = 'XXXXXXXXXX.XXXXXXXXXXX.XXXXXXXXXX.rds.amazonaws.com';
$dbname = 'fablabkitakagaya';
$dsn = 'mysql:host='.$dbhost.';dbname='.$dbname;
$user = 'XXXXXXXXXXX';
$pass = 'XXXXXXXXXXX';
$options = array(
    PDO::MYSQL_ATTR_SSL_CA => '/home/enya/rds-combined-ca-bundle.pem',
    PDO::MYSQL_ATTR_SSL_KEY => 'NONE',
    PDO::MYSQL_ATTR_SSL_CERT => 'NONE'
);

$dbh = new PDO($dsn,$user,$pass,$options);

if (!$dbh) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}

$sql = "select userid from card where cardid = '$nfcid'";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$userid = $result['userid'];
$sql = "select * from kaiin where userid = '$userid'";
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

print "会員番号:" . $userid . "<br>";
print "姓：" . $sei . "<br>";
print "名：" . $mei . "<br>";
print "ハンドル名：" . $penname . "<br>";
print "メール：" . $mail . "<br>";
print "TEL：" . $tel . "<br>";
print "年齢：" . $age . "<br>";
print "性別：" . $sex . "<br>";
print "誕生年：" . $birthy . "<br>";
print "住所：" . $place . "<br>";
print "郵便番号：" . $postal . "<br>";
?>
</html>
