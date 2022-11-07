<?php
session_start();
require 'db-con.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body style="background: #e2eeee;">



<div class="form-clz">
    <?php
        if(isset($_GET['ID'])){
            $user_id = mysqli_real_escape_string($con, $_GET['ID']);
            $sql = "SELECT * FROM users where ID='$user_id'";

            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query) > 0 ){
                $user = mysqli_fetch_array($query); 
                
                ?>

                    <form action="crud.php" method="POST">
                    <input type="hidden" name="student_id" value="<?= $user['ID']; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['FirstName']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" value="<?= $user['LastName']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" value="<?= $user['Username']; ?>">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                <?php
            }
        }

    ?>

</div>    
    
    
    

    

        
       
        



    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">  
    </script>
</body>
</html>