<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单提交的数据
    $userName = $_POST['UserName'];
    $passw = $_POST['Password'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['PhoneNumber'];

    // 假设数据库连接参数如下
    include '../../database_config.php';

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 构建 SQL 查询语句并执行
    $sql = "INSERT INTO users (UserName, Password, Address, PhoneNumber) VALUES ('$userName', '$passw', '$address', '$phoneNumber')";
    if ($conn->query($sql) === TRUE) {
        echo "记录添加成功";
        header("Location:../m_users.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // 关闭数据库连接
    $conn->close();
}
?>
