<html>
<head><title>簡易掲示板</title></head>
<body>

<?php

$link = mysql_connect('（ホスト名）', '(ユーザ名)', '（パスワード）');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo "接続成功"."<br>";

$db_selected = mysql_select_db('bbs', $link);
if (!$db_selected) {
    die ('shippai : ' . mysql_error());
}
echo"ＤＢ選択成功"."<br>";

$result = mysql_query("SELECT * FROM respons join users using(ID)");
if (!$result) {
    die('Could not query:' . mysql_error());
}
echo "レコード取得"."<br><br>";
while($rec = mysql_fetch_array($result, MYSQL_ASSOC)){
echo $rec['resban']." 名前:"."<a href=mailto:".$rec['mail'].">".$rec['name']."</a>"." 投稿日時:".$rec['nichiji']." ID:".$rec['ID']."<br>".$rec['kakiko']."<br><br>";
}

$date = new DateTime();
echo '<p>', $date->format ('Y-m-d H:i:s'), '</p>';
?>



<p style="margin: 0; padding: 0.5em;">

</p>
<hr>
<h3><span class="common">書き込み欄</span></h3>
<form method="POST" action="okuri.php">
<p style="margin: 0 0 0 2em; font-size: 0.75em;">
<input name="bbs" value="entrance2" type="hidden">

<input name="hiduke" value=" <?php echo date('Y-m-d H:i:s'); ?>" type="hidden">
<input value="書き込む" name="submit" type="submit"><br>
名前：<input name="namae" style="width: 16em;" type="text">
E-mail：<input name="mail" style="width: 16em;" type="text"><br>
<textarea style="min-width: 40em; height: 10.0em; word-wrap: break-word;" rows="4" cols="12" name="MESSAGE"></textarea><br>
</p>
</form>
</div>
</body>
</html>