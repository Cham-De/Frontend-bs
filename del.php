<?php

require 'db-con.php';

if(isset($_POST['delete'])){

    $user_id = mysqli_real_escape_string($con, $_POST['delete']);
    $sql = "DELETE FROM users WHERE id ='$user_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $_SESSION['message'] = "Deleted";
        header("Location: admin.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Not Deleted";
        header("Location: admin.php");
        exit(0);
    }
}

?>