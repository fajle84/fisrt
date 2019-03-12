<?php
   require_once 'php_db.php';

   $query = 'SELECT id,email FROM   user_info ORDER BY email asc';

   $stmt = $connection->query($query);
   $stmt->execute();

   $user = $stmt->fetchAll();


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
          <div class="row">
              <table class="table table-bordered table-hovered">
                   <thead>
                       <tr>
                           <td>Serial</td>
                           <td>Id</td>
                           <td>Email</td>
                           <td>Action</td>
                       </tr>

                          </thead>
                              <tbody>
                              <?php $i=1; ?>
                              <?php foreach ($user as $name):?>

                                 <tr>
                                     <td><?php echo $i++;?></td>
                                     <td><?php echo $name['id']; ?> </td>
                                     <td><?php echo $name['email']; ?></td>
                                       <td>
                                           <a href="data_edit.php?
                                           id=<?php echo $name['id']; ?>"
                                             class="btn btn-sm btn-info" >

                                              Edit
                                           </a>

                                             <a href="data_delet.php?id=<?php echo
                                             $name['id'];?>"
                                                onclick="return confirm('Are you sure!.')"
                                                class="btn btn-sm btn-danger">
                                                 Delete
                                             </a>
                                         </td>

                                     <?php endforeach; ?>
                                 </tr>
                              </tbody>

              </table>
          </div>
    </div>
  </body>
</html>





