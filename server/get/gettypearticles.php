<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$type = urldecode($_GET["type"]);
$pagination = (int)test_input($_GET["pagination"]) * 10;

$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    mysql_select_db("blog", $con);
    $sql = "select * from articles where articletype=" . '"' . $type . '"' . " limit " . ($pagination-10) . "," . 10;
    $result = mysql_query($sql, $con);

    $re = "";
    while($row = mysql_fetch_array($result)) {
            $re .= ("{" .
                '"title"' . ":" . '"' . $row["articletitle"] . '"' . ',' .
                '"type"' . ":" . '"' . $row["articletype"] . '"' .  "," .
                '"content"' . ":" . '"' . $row["articlecontent"] . '"' .  "," .
                '"date"' . ":" . '"' . $row["articledate"] . '"' .
                 "},"
            );
    }
    $sql = "select * from articles where articletype=" . '"' . $type . '"';
    $result = mysql_query($sql, $con);

    echo "[" . substr($re, 0, -1) . "," . mysql_num_rows($result) . "]";
}
mysql_close($con);
?>