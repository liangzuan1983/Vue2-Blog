<?php
$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    echo '开始执行' . '<br />';
    mysql_select_db("blog", $con);

    $sql = "select * from articles";
    $result = mysql_query($sql, $con);
    $count = 0;
    while($row = mysql_fetch_array($result)) {
        $count = $count + 1;
    }
    echo $count;
    echo 'ok';
}
mysql_close($con);
?>