<?php
function test_input($data) {
    $data = stripslashes($data);
    $data = str_replace('"', "&quot;", $data);
    $data = str_replace("'", "&apos;", $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (test_input($_COOKIE["username"]) == "yj" and test_input($_COOKIE["password"]) == "win") {
        $con = mysql_connect("localhost:3306", "root", "win");
        if (!$con) {
            echo 'Connect mysql failed!';
        } else {
            mysql_select_db("blog", $con);
            $articletitle = test_input($_POST["articletitle"]);
            $articletype = test_input($_POST["articletype"]);
            // 替换回&
            $articlecontent = str_replace("@8@8@8", "&", test_input($_POST["articlecontent"]));
            $d = date('Y-m-d');

            $sql = "INSERT INTO articles values(null, '$articletitle', '$articletype', '$articlecontent', '$d')";
            mysql_query($sql, $con);
            mysql_close($con);
        }
    }
}
?>