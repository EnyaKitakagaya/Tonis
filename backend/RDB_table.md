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
<tr><td>id</td><td>varchar(32)</td><td>会員番号</td></tr><br>
penname varchar(32) ハンドル名<br>
sei varchar(32) 姓<br>
mei varchar(32) 名<br>
mail varchar(32) メールアドレス<br>
tel varchar(32) 電話番号<br>
birthy int(4) 誕生年<br>
sex int(4) 性別<br>
banto int(4) 番頭（身分）<br>
moddate timestamp データ更新時刻（自動）<br>




