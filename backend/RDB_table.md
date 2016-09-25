# データベースの設計
mysqlを使う（なんでもいいけど、phpmyadminが使いやすそうだったので採用）<br>
ホスト名: localhost （とりあえず、自サーバで動かしてみる）<br>
データベース名:Tonis_db<br>


<table>
<th>テーブル:card_id</th>
<tr><td>cardid</td><td>varchar(32)</td><td>フェリカカードのID</td></tr>
<tr><td>id</td><td>varchar(32)</td><td>会員番号</td></tr>
<tr><td>moddate</td><td>timestamp</td><td>データ更新時刻（自動）</td></tr>
</table>



<table>
<th>テーブル:kaiin</th>
<tr><td>id</td><td>varchar(32)</td><td>会員番号</td></tr>
<tr><td>penname</td><td>varchar(32)</td><td>ハンドル名</td></tr>
<tr><td>sei</td><td>varchar(32)</td><td>姓</td></tr>
<tr><td>mei</td><td>varchar(32)</td><td>名</td></tr>
<tr><td>mail</td><td>varchar(32)</td><td>メールアドレス</td></tr>
<tr><td>tel</td><td>varchar(32)</td><td>電話番号</td></tr>
<tr><td>birthy</td><td>int(4)</td><td>誕生年</td></tr>
<tr><td>sex</td><td>int(4)</td><td>性別</td></tr>
<tr><td>banto</td><td>int(4)</td><td>番頭（身分）</td></tr>
<tr><td>moddate</td><td>timestamp</td><td>データ更新時刻（自動）</td></tr>




