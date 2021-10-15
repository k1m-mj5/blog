<?php

include '../class/post.php';

if(isset($_POST["post"])){
    //Input
    $title = $_POST["title"];
    $date = $_POST["date"];
    $category = $_POST["category"];
    $message = $_POST["message"];
    $author = $_POST["author"];

    // call add post function in post.php
    $post = new Post();
    $post->addPost($title,$date,$category,$message,$author);
    
}

?>