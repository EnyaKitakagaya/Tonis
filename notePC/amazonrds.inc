<?php
//
// SQLサーバへつなぐとこは、共用なので、インクルードして使おう。
//
$charset= 'utf8';
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
$dbh = new PDO($dsn,$user,$pass,$options,$charset);
if (!$dbh) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}
?>
