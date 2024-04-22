<?php

//Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //include database
    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //Instantiate Db and Connect
    $database = new Database();
    $db = $database->connect();

  // below are going to be the funtion for adding comments
  // below are going to be the function for calculating comments