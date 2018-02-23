<?php
function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = test_input($_GET["id"]);

if (test_input($_COOKIE["username"]) == "yj" and test_input($_COOKIE["password"]) == "win") {
    $con = mysql_connect("localhost:3306", "root", "win");
    if (!$con) {
        echo 'Connect mysql failed!';
    } else {
        mysql_select_db("blog", $con);
        $sql = "delete from leavewords where id=" . $id;
        $result = mysql_query($sql, $con);
    }
    mysql_close($con);
}
?>