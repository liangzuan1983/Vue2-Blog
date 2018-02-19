<?php
$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    if (mysql_query("CREATE DATABASE blog", $con)) {
        
    } else {
        echo "Error creating database:" . mysql_error() . "<br />";
    }

    echo '开始执行' . '<br />';
    mysql_select_db("blog", $con);
    $sql = "create table articles (id int AUTO_INCREMENT primary key, articletitle varchar(100), articletype varchar(15), articlecontent text, articledate date);";
    mysql_query($sql, $con);

    $sql = "create table leavewords (id int AUTO_INCREMENT primary key, articletitle varchar(100),leavename varchar(20), leavemail varchar(30), leavecontent varchar(300), leavedate date);";
    mysql_query($sql, $con);

    echo 'ok';
}
mysql_close($con);
?>