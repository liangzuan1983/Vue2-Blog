<?php
function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = test_input($_POST["username"]);
$password = test_input($_POST["password"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($username == "yj" and $password == "win") {
        setcookie("username", $username, time()+3600*12);
        setcookie("password", $password, time()+3600*12);
        echo 1;
    } else {
        echo 0;
    }
}
?>