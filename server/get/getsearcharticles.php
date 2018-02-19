<?php
$word = urldecode($_GET["word"]);

$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    mysql_select_db("blog", $con);
    $sql = "select * from articles where articletitle like " . '"%' . $word . '%"';
    $result = mysql_query($sql, $con);

    $re = "";
    $count = 0;
    while($row = mysql_fetch_array($result)) {
            $count += 1;
            $re .= ("{" .
                '"title"' . ":" . '"' . $row["articletitle"] . '"' . ',' .
                '"type"' . ":" . '"' . $row["articletype"] . '"' .  "," .
                '"content"' . ":" . '"' . $row["articlecontent"] . '"' .  "," .
                '"date"' . ":" . '"' . $row["articledate"] . '"' .
                 "},"
            );
    }
    echo "[" . substr($re, 0, -1) . "," . $count . "]";
}
mysql_close($con);
?>