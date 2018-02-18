<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    mysql_select_db("blog", $con);
    $sql = "select * from articles limit 0,10";
    $result = mysql_query($sql, $con);

    $re = "";
    while($row = mysql_fetch_array($result)) {
            $re .= ('"' . $row["articletitle"] . '"' . ",");
    }
    echo "[" . substr($re, 0, -1) . "]";
}
mysql_close($con);
?>