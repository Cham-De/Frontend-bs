<?php
session_start();
require 'db-con.php';

if(isset($_POST['delete_user'])){

    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);
    $sql = "DELETE FROM users  WHERE ID='$user_id'";
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

if(isset($_POST['saved'])){

    $fname = mysqli_real_escape_string($con, $_POST['name-f']);
    $lname = mysqli_real_escape_string($con, $_POST['name-l']);
    $uname = mysqli_real_escape_string($con, $_POST['name-u']);
}

$data = $_POST;

if (empty($data['name-f']) ||
    empty($data['name-l']) ||
    empty($data['name-u'])) {
    
    die('Please fill all required fields!');
}
else{
    $sql = "INSERT INTO users (FirstName, LastName, Username) values ('$fname','$lname','$uname')";
}

$query = mysqli_query($con, $sql);
if($query){

    $_SESSION['message'] = "User added successfully";
    header("Location: admin.php");
    exit(0);
}
else{
    $_SESSION['message'] = "User not added";
    header("Location: admin.php");
    exit(0);
}

?>