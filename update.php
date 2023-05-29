<?php

include("config.php");

$select_data = "SELECT * FROM post_api";
$select_exe = mysqli_query($con, $select_data);
$select_arr = mysqli_fetch_assoc($select_exe);
$hobby = $select_arr['hobby'];

$id = $_POST['uid'];
$name = $_POST['name'] ? $_POST['name'] : $select_arr['name'];
$email = $_POST['email'] ? $_POST['email'] : $select_arr['email'];
$password = $_POST['password'] ? $_POST['password'] : $select_arr['password'];
$date = $_POST['date'] ? $_POST['date'] : $select_arr['date'];
$color = $_POST['color'] ? $_POST['color'] : $select_arr['color'];
$hobby = $_POST['hobby'] ? $_POST['hobby'] : $hobby;
$gender = $_POST['gender'] ? $_POST['gender'] : $select_arr['gender'];
$country = $_POST['country'] ? $_POST['country'] : $select_arr['country'];


$update = "UPDATE post_api SET `name`='$name',`email`='$email',`password`='$password',`date`='$date',`color`='$color',`hobby`='$hobby',`gender`='$gender',`country`='$country' WHERE `id`='$id'";

if (mysqli_query($con, $update)) {
    echo json_encode(array('msg' => 'DATA UPDATE SUCCESSFULLY ! ', 'status' => true));
} else {
    echo json_encode(array('msg' => 'SOMETHING WENT WRONG ! ', 'status' => false));
}

?>