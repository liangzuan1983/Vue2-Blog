<?php
$con = mysql_connect("localhost:3306", "root", "win");
if (!$con) {
    echo 'Connect mysql failed!';
} else {
    echo '开始执行' . '<br />';
    mysql_select_db("blog", $con);

    $d = date('Y-m-d');
    $sql = "INSERT INTO articles values(null, '测试文章标题', 'javascript', '测试文章内容', '$d')";
    mysql_query($sql, $con);
    $sql = "INSERT INTO leavewords values(null, '测试文章标题', '测试留言姓名', '测试邮箱', '测试留言内容', '$d')";
    mysql_query($sql, $con);
    echo 'ok';
}
mysql_close($con);
?>