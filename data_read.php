<?php
  $massage = false;
  $type = 'success';

      if(isset($_POST['loggin'])){
          $email = strtolower(trim($_POST['email']));
          $password =trim($_POST['password']);


          require_once 'php_db.php';
           $query = 'SELECT id,email,password FROM `user_info` WHERE email=:email';
           $stmt =  $connection->prepare($query);
           $stmt->bindParam(':email',$email);
            $stmt->execute();

            $user = $stmt->fetch();

               if ($user){
                      if (password_verify($password,$user['password']) == true){

                          $massage = 'User logged in.';
                      }
                      else{
                          $massage = 'Invalid credentials.';
                          $type = 'danger';
                      }

               }
               else{
                   $massage = 'User not foun.';
                   $type = 'danger';

               }


      }


 ?>

<!doctype html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>PHP Form</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                  crossorigin="anonymous">
            </head>
  <body>
    <div class="container">
          <?php if ($massage):?>
            <div class="alert alert-<?php echo $type ?>">
                <?php echo $massage;?>
            </div>
          <?php endif;?>

        <form class="form-signin" action="" method="post" enctype="multipart/form-data">
                <div class="form-label-group">
                    <h1 align="center">Loggin</h1>
             <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="form-label-group">
             <input type="password" id="inputPassword" name="password" class="form-control"placeholder="Password"required>
                </div>
                <div class="">
              <input type="file" name="photo" class="form-control" >
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="loggin">Loggin</button>
            </div>

        </form>
    </div>

 </body>
</html>

