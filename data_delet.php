<?php
    require_once'php_db.php';

    $id = (int)$_GET['id'];
    if($id> 0){
        $query = 'DELETE FROM user_info WHERE id=:id';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

    }

    header('Location:all_row_read.php');
