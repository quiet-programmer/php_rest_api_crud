<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //Instantiate Db and Connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Blog Post Object
    $post = new Post($db);

    //get the raw post data
    $data = json_decode(file_get_contents("php://input"));

    //set the id
    $post->id = $data->id;

    $post->title = $data->title;
    $post->body = $data->body;
    $post->author = $data->author;
    $post->category_id = $data->category_id;

    //to update
    if($post->update()){
        echo json_encode(
            array(
                'Message' => 'Post Updated'
            )
        );
    } else {
        echo json_encode(
            array(
                'Message' => 'Post not updated, error occured'
            )
        );
    }
//update php

//update php

    