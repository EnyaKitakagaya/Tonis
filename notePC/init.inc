<?php
//
// カードid読むとこは、共用なので、インクルードして使おう。
//
$handle = fopen("/tmp/nfcid", "r");
$nfcid = substr(fgets($handle),-16);
fclose($handle);

?>
