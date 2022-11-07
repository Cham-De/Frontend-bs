<?php
   include("login.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 
      
      $sql = "SELECT id FROM admin WHERE User = '$myusername' and Pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    
</head>
<body class="bg-primary">

    <div class="container-fluid">
        <div class="row content d-flex justify-content-center">
            <div class="col-12 col-md-3 col-sm-6">
                <form class="form-container mt-5" action="login.php" method="post">
                    <div class="mb-3">
                        <h1 class="text-center text-primary">Login</h1>
                    </div>
                    <div class="mb-3">
                        <label for="username"  class="form-label">Username</label>
                        <input type="text" class="form-control" name="uname">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pwd" >
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </div>    
                </form>
            </div>
            
        </div>
        
    </div>


    
    



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"          integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">    
</script>
</body>
</html>