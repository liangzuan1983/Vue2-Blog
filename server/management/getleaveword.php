<?php
function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (test_input($_COOKIE["username"]) == "yj" and test_input($_COOKIE["password"]) == "win") {
    $con = mysql_connect("localhost:3306", "root", "win");
    if (!$con) {
        echo 'Connect mysql failed!';
    } else {
        mysql_select_db("blog", $con);
        $re = "";
        $sql = "select * from leavewords order by leavedate desc";
        $result = mysql_query($sql, $con);
        while($row = mysql_fetch_array($result)) {
            $re .= ("{" .
                '"name"' . ":" . '"' . $row["leavename"] . '"' . ',' .
                '"id"' . ":" . '"' . $row["id"] . '"' .  "," .
                '"content"' . ":" . '"' . $row["leavecontent"] . '"' .  "," .
                '"date"' . ":" . '"' . $row["leavedate"] . '"' .
                 "},"
            );
        }

        echo "[" . substr($re, 0, -1) . "]";
    }
}
mysql_close($con);
?>