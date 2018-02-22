<?php
$title = urldecode($_GET["title"]);

$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    mysql_select_db("blog", $con);
    $sql = "select * from articles where articletitle=" . '"' . $title . '"';
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
            break; 
    }

    $sql = "select * from leavewords where articletitle=" . '"' . $title . '"';
    $result = mysql_query($sql, $con);
    $re .= "[";
    while($row = mysql_fetch_array($result)) {
        $re .= ("{" .
            '"name"' . ":" . '"' . $row["leavename"] . '"' . ',' .
            '"mail"' . ":" . '"' . $row["leavemail"] . '"' .  "," .
            '"content"' . ":" . '"' . $row["leavecontent"] . '"' .  "," .
            '"date"' . ":" . '"' . $row["leavedate"] . '"' .
             "},"
        );
    }

    if (mysql_num_rows($result) > 0) {
        echo "[" . substr($re, 0, -1) . "]]";
    } else {
        echo "[" . substr($re, 0, -2) . ",[]]";
    }
}
mysql_close($con);
?>