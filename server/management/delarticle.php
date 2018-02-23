<?php
function test_input($data) {
    $data = stripslashes($data);
    $data = str_replace('"', "&quot;", $data);
    $data = str_replace("'", "&apos;", $data);
    return $data;
}

$title = test_input(urldecode($_GET["title"]));

if (test_input($_COOKIE["username"]) == "yj" and test_input($_COOKIE["password"]) == "win") {
    $con = mysql_connect("localhost:3306", "root", "win");
    if (!$con) {
        echo 'Connect mysql failed!';
    } else {
        mysql_select_db("blog", $con);
        $sql = "delete from articles where articletitle=" . '"' . $title . '"';
        $result = mysql_query($sql, $con);
    }
    mysql_close($con);
}
?>