# データベースの設計
mysqlを使う<br>
ホスト名: localhost <br>
データベース名:Tonis_db<br>
テーブル名1:card_id<br>
 cardid varchar(32)  フェリカカードのID<br>
 id varchar(32) 会員番号<br>
 moddate timestamp データ更新時刻（自動）<br>



テーブル名2:kaiin<br>
<table>
<tr><td>id</td><td>varchar(32)</td><td>会員番号</td></tr>
<tr><td>penname</td><td>varchar(32)</td><td>ハンドル名<tr>
<tr><td>sei</td><td>varchar(32)</td><td>姓<tr>
<tr><td>mei</td><td>varchar(32)</td><td>名<tr>
<tr><td>mail</td><td>varchar(32)</td><td>メールアドレス<tr>
<tr><td>tel</td><td>varchar(32)</td><td>電話番号<tr>
<tr><td>birthy</td><td>int(4)</td><td>誕生年<tr>
<tr><td>sex</td><td>int(4)</td><td>性別<tr>
<tr><td>banto</td><td>int(4)</td><td>番頭（身分）<tr>
<tr><td>moddate</td><td>timestamp</td><td>データ更新時刻（自動）<tr>




