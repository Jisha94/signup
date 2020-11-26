<?php

include_once('db_functions.php');

$conn = new Database();

$email = $_POST["useremail"];

$sql = $conn->useremailchecking($email);
$result = mysqli_num_rows($sql);
if (!empty($result)) {
    echo "<span style='color:red'> Email Id already Registered.</span>";
    echo "<script>$('#save').prop('disabled', true);</script>";
} else {
    echo "<span style='color:green'> Email Id available for Registration .</span>";
    echo "<script>$('#save').prop('disabled', false);</script>";
}
