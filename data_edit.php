<?php
$massage =false;
require_once'php_db.php';

   $id = (int)$_GET['id'];
     if($id == 0){

         header('Location:all_row_read.php');

            exit();
     }

        if(isset($_POST['update'])){

            $email = strtolower(trim($_POST['email']));

            $query = 'UPDATE user_info SET email=:email WHERE id=:id';
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':id',$id);
            $stmt->execute();

        }




                 $query = 'SELECT email FROM user_info WHERE id=:id';
                 $stmt = $connection->prepare($query);
                 $stmt->bindParam(':id',$id);
                 $stmt->execute();
                 $user = $stmt->fetch();









?>


<!doctype html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0,
                  maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>PHP Form</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                  crossorigin="anonymous">
            </head>
  <body>
    <div class="container">
          <?php if ($massage):?>
            <div class="alert alert-success">
                <?php echo $massage;?>
            </div>
          <?php endif;?>

        <form class="form-signin" action="" method="post" enctype="multipart/form-data">
            <div class="form-label-group">
                    <h2 align="center">Edit User</h2>
             <input type="email" id="inputEmail" name="email" class="form-control" value="<?php echo $user['email']; ?>"
                    placeholder="Email address" required>
                </div>
                <div class="form-label-group">
             <input type="password" id="inputPassword" name="password" class="form-control"placeholder="Password">
                </div>
                <div class="">
              <input type="file" name="photo" class="form-control" >
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Update</button>
            </div>

        </form>
    </div>

 </body>
