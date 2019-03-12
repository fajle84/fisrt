<?php

  try{
      $connection = new PDO('mysql:dbname=user;host=127.0.0.1','root','');

      $connection-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }
  catch (Exception $errors)
  {
     //log( $va->getMessage());
  }




