<?php

include("config.php");

$id = $_POST['uid'];
$select_data = "SELECT * FROM post_api WHERE `id`='$id'";
$select_exe = mysqli_query($con, $select_data);
$data = mysqli_fetch_assoc($select_exe);
$image = $data['image'];

if ($image) {
    if(unlink('img/'.$image)){
        $delete = "DELETE FROM post_api WHERE `id`= '$id'";
        $delete_exe = mysqli_query($con, $delete);
    } else {
        echo "SOMETHING WENT WRONG ! ";
    }

    echo json_encode(array('msg' => 'DATA DELETE SUCCESSFULLY ! ', 'status' => true));
} else {
    echo json_encode(array('msg' => 'SOMETHING WENT WRONG ! ', 'status' => false));
}

?>