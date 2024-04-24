<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //Instantiate Db and Connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Blog Post Object
    $post = new Post($db);

    //Blog Post Query
    $result = $post->read();

    //get row count
    $num = $result->rowCount();

    //Check if there is any post
    if($num > 0) {
        //post array
        $post_arr = array();
        $post_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = array(
                'id' => $id,
                'title' => $title,
                'body' => html_entity_decode($body),
                'author' => $author,
                'category_id' => $category_id,
                'category_name' => $category_name
            );

            //push to the data
            array_push($post_arr['data'], $post_item);
        }

        //turn it to json
        echo json_encode($post_arr);
    } else {
        //no post
        echo json_encode(
            array('Message' => 'No Post found')
        );
    }
    //reading php
    