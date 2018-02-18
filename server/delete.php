<?php
$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    mysql_select_db("blog", $con);
    $sql = "drop database blog;";
    mysql_query($sql, $con);
}

mysql_close($con);
?>