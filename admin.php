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
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body style="background: #e2eeee;">


    <nav class="navbar navbar-light bg-white" id="nav_bar">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

    


    <div class="vertical-nav bg-white" id="sidebar">
        <div class="content">
            <div class="media d-flex align-items-center" id="med"><img src="cham2.png" width="100px" height="100px" alt="user image">
                <div class="media-body text-primary">
                    <h4>Chamodi</h3>
                    <h5>Admin</h5>
                </div>
            </div>
            <ul class="list-unstyled ml-4" id="side-list">
                <li class="media my-4" id="active">
                    <i class="bi bi-house"></i>
                    <b><a href="#">Home</a></b>
                </li>
                <li class="media my-4">
                    <i class="bi bi-person"></i>
                    <b><a href="#">Profile</a></b>
                </li>
                <li class="media my-4">
                    <i class="bi bi-gear"></i>
                    <b><a href="#">Settings</a></b>
                </li>
                <li class="media">
                    <i class="bi bi-box-arrow-right"></i>
                    <b><a href="#">Logout</a></b>
                </li>
            </ul>
            
        </div>
        </div>
    </div>


    <div class="container">
        <div class="row gy-5 py-4" id="row-btn">
            <div class="col mx-4" id="btns">
                <!--<h3>Sales<span><i class="bi bi-coin"></i></i></span></h3>
                <h2>$ 12,500</h2>-->
                <button type="button" class="btn btn-primary" id="change_pwd">Add User</button>
            </div>
            <div class="col mx-4" id="btns">
                <!--<h3>Purchases<span><i class="bi bi-cart-check-fill"></i></i></span></h3>
                <h2>$ 18,000</h2>
                <button type="button" class="btn btn-primary" id="edit_user">Edit User</button>-->
            </div>
            <div class="col mx-4" id="btns">
                <!--<h3>Visitors<span><i class="bi bi-people-fill"></i></i></i></span></h3>
                <h2>13,000</h2>
                <button type="button" class="btn btn-primary" id="del_user">Delete User</button>-->
            </div>
        </div>
    </div>

    <div class="popup-container-pwd" id="popup_container_pwd"> 


        <div class="update-modal">
          <form action="crud.php" method="post">
              <label for="current_password">First Name
                  <input type="text" name="name-f">
              </label>
              
  
              <label for="new_password">Last Name
                  <input type="text" name="name-l">
              </label>
              
  
              <label for="re_enter_password">Username
                  <input type="text" name="name-u">
              </label>
              
              <label class="sp-label">
                  <button class="cancel" id="close" type="reset">Close</button>
                  <input type="submit" value="Save" class="submit" id="save" name="saved">
              </label>
              
          </form>
        </div>
      </div>



    <div class="container" id="tb-cont">
        <table class="table" id="tb">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM Users";
                    $query = mysqli_query($con, $sql);

                    if(mysqli_num_rows($query) > 0 ){

                        foreach($query as $user){
                            ?>
                                <tr>
                                    <td scope="row"><?=$user['ID']; ?></td>
                                    <td><?=$user['FirstName']; ?></td>
                                    <td><?=$user['LastName']; ?></td>
                                    <td><?=$user['Username']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" name ="update" value ="Update" id="edit"><a href="edit.php" style="text-decoration:none; color:white;">Edit</a></button>
                                    <form action="del.php" method="POST" class="d-inline">
                                        <button type="button" name="delete" class="btn btn-danger" value="<?$user['ID'];?>">Delete</button>
                                    </form>
                                    </td> 
                                </tr>

                            <?php 

                        }
                    }
                    else{
                        echo "<h4>No records</h4>";
                    }
                
                ?>
            </tbody>
          </table>
    </div>
    
    <script>
        const popup_container_pwd = document.getElementById('popup_container_pwd');
        const close = document.getElementById('close');
        const edit = document.getElementById('edit');

        const change_pwd = document.getElementById('change_pwd');
        const save = document.getElementById('save');


        change_pwd.addEventListener('click', () => {
            popup_container_pwd.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container_pwd.classList.remove('show');
        });

        save.addEventListener('click', () => {
            popup_container_pwd.classList.remove('show');
        });


        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"          integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">  
    </script>
</body>
</html>