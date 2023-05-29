<?php
include("config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$date = $_POST['date'];
$color = $_POST['color'];
$country = $_POST['country'];
$res = [];

if (empty($name)) {

    echo $res['name_err'] = "Name Is Required ! ";

}
if (empty($email)) {

    echo $res['email_err'] = "Email Is Required ! ";

}
if (empty($password)) {

    echo $res['password_err'] = "Password Is Required ! ";

}
if (empty($date)) {

    echo $res['date_err'] = "Date is Required ! ";

}
if (empty($color)) {

    echo $res['color_err'] = "Color is Required ! ";

}

if (isset($_POST['hobby'])) {

    $hobby = $_POST['hobby'];
} else {

    echo $res['hobby_err'] = "Hobby is Required ! ";

}

if (isset($_POST['gender'])) {

    $gender = $_POST['gender'];

} else {

    echo $res['gender_err'] = "Gender is Required ! ";

}

if (empty($country)) {

    echo $res['country_err'] = "Country is Required ! ";

}

if (empty($_FILES['image']['name'])) {

    echo $res['img_err'] = "Image is Required ! ";

} elseif (empty($res)) {

    $explode = explode('.', $_FILES['image']['name']);
    $extension = end($explode);
    $image = time() . "." . $extension;
    $tmp_name = $_FILES['image']['tmp_name'];
    $file = 'img/' . $image;
    if (move_uploaded_file($tmp_name, $file)) {
        $insert = "INSERT INTO post_api(`name`,`email`,`password`,`date`,`color`,`hobby`,`gender`,`country`,`image`) VALUES ('$name','$email','$password','$date','$color','$hobby','$gender','$country','$image')";
        if (mysqli_query($con, $insert)) {
            echo json_encode(array('message' => 'DATA INSERT SUCCESSFULLY ! ', 'status' => true));
        } else {
            echo json_encode(array('message' => 'SOMETHING WENT WRONG ! ', 'status' => false));
        }
    }else{
        echo $res['error'] = " SOMETHING WENT WRONG ! ";
    }

}
json_encode($res);
?>