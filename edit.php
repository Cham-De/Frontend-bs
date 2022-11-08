<?php
session_start();
require 'db-con.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $uname = $_POST['username'];
    
    $result = mysqli_query($con, "UPDATE 'users' SET FirstName = '$fname', LastName = '$lname', Username = '$uname' WHERE ID = '$id'" );

    header("Location: admin.php");
}
else{
}

?>

<?php
//getting id from url

if(isset($_GET('ID')))
$id = $_GET['ID'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE ID=$id");

while($res = mysqli_fetch_array($result))
{
    $fname = $res['FirstName'];
    $lname = $res['LastName'];
    $uname = $res['Username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<style>
    .container{
        border: 1px solid black;
        max-width: 600px;
        margin-top: 100px;
        border-radius: 15px;
    }
    .form-group{
        padding: 20px 10px;
    }
    button{
        margin-left: 10px;
        margin-bottom: 20px;
    }
</style>

<body style="background: #e2eeee;">




<div class="container">
<form action="edit.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="email" class="form-control" name ="firstname"id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fname;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="password" name = "lastname"class="form-control" id="exampleInputPassword1" value="<?php echo $lname;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">User Name</label>
    <input type="password" name = "username" class="form-control" id="exampleInputPassword1" value="<?php echo $uname;?>">
  </div>
  <div class="form-group">
    <input type="hidden" name = "id" class="form-control" id="exampleInputPassword1" value=<?php echo $_GET['id'];?>>
  </div>
  <button type="submit" class="btn btn-primary" name = "update" value="Update">Submit</button>
</form>
</div> 
    
    
    

    

        
       
        



    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">  
    </script>
</body>
</html>