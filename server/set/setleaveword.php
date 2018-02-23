<?php
function test_input($data) {
    $data = stripslashes($data);
    $data = str_replace('"', "&quot;", $data);
    $data = str_replace("'", "&apos;", $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysql_connect("localhost:3306", "root", "win");
    if (!$con) {
        echo 'Connect mysql failed!';
    } else {
        mysql_select_db("blog", $con);
        $articletitle = test_input($_POST["articletitle"]);
        $name = test_input($_POST["name"]);
        $mail = test_input($_POST["mail"]);
        $content = test_input($_POST["content"]);
        $d = date('Y-m-d');

        $sql = "INSERT INTO leavewords values(null,'$articletitle', '$name', '$mail', '$content', '$d')";
        mysql_query($sql, $con);
        mysql_close($con);
    }
}
?>