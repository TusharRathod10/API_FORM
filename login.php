<?php
include("config.php");

$email = $_POST['email'];
$password = $_POST['password'];
$res = [];

if (empty($email)) {
    echo $res['email_err'] = "Email Is Required ! ";
}
if (empty($password)) {
    echo $res['password_err'] = "Password Is Required ! ";
} elseif (empty($res)) {
    
    $select = "SELECT * FROM post_api WHERE `email`='$email' AND `password`='$password'";
    $select_exe = mysqli_query($con, $select) or die("SQL Query Failed ! ");
    if (mysqli_num_rows($select_exe) > 0) {
        $select_arr = mysqli_fetch_all($select_exe, MYSQLI_ASSOC);
        echo json_encode($select_arr);
        echo json_encode(array('message' => 'LOGIN SUCCESSFULLY ! ', 'status' => true));
    } else {
        echo json_encode(array('message' => 'SOMETHING WENT WRONG ! ', 'status' => false));
    }
    
}
json_encode($res);
?>