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
                '"content"' . ":" . '"' . $row["articlecontent"] . '"' . "," .
                '"leavecontent"' . ":" . '"' . $row["leavecontent"] . '"' . "," .
                '"leavemail"' . ":" . '"' . $row["leavemail"] . '"' . "," .
                '"leavename"' . ":" . '"' . $row["leavename"] . '"' .
                 "}"
            );
            break; 
    }
    echo $re;
}
mysql_close($con);
?>