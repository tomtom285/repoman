<html>
<body>

<?php

$link = mysql_connect('�z�X�g��', '���[�U��', '�p�X���[�h');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo "�ڑ�����"."<br>";

$db_selected = mysql_select_db('bbs', $link);
if (!$db_selected) {
    die ('shippai : ' . mysql_error());
}
echo"�c�a�I�𐬌�"."<br>";

$nakami = $_POST["MESSAGE"];
$namae = $_POST["namae"];
$mail = $_POST["mail"];
$hiduke =$_POST["hiduke"]; 
echo $nakami.$namae.$mail.$hiduke;

$mysql_kakiko = mysql_query("INSERT INTO respons (resban, nichiji, ID, kakiko) SELECT MAX(resban) + 1, '$hiduke', 1, '$nakami' FROM respons",$link);

if (!$mysql_kakiko) {
    die('kakiko sippai: ' . mysql_error());
}
echo"�������݂܂���"."<br>";
?>

</body>
</html>