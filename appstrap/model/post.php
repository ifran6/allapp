<?php
include_once('../includes/connect.php');

function select_post(){
    global $conn;
    $sql = "SELECT * FROM posts ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $users = $stmt->fetch();
    }else {
        $users = 0;
    }

    return $users;
}


function postCounter($sql){
    global $conn;

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['item'] ?? 0;
}


function get_PostBy_Id($id){
    global $conn;
    $sql = "SELECT * FROM posts WHERE id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    if($stmt->rowCount() > 0){
        $posts = $stmt->fetch();
    }else {
        $posts = 0;
    }

    return $posts;

}


function is_post_exist($data){
    global $conn;
    $sql = "SELECT * FROM posts WHERE title = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$data]);
    $result = $stmt->fetch();
    return $result;
}


function insert_post($data){
    global $conn;
    // id	title	slug	category	content	author	post_image	statu	created_at	updated_at			
    $sql = "INSERT INTO posts(title, slug, category, content, author, post_image,statu,created_at, updated_at)VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $inserter = $stmt->execute($data);
    return $inserter;

}


function update_post($data){
    global $conn;
    $sql = "UPDATE posts SET title = ?, category = ?, content = ?, author = ?, post_image = ?, statu = ?, updated_at = ? WHERE id = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $updated = $stmt->execute($data);
    return $updated;
}


function delete_posts($id){
    global $conn;
    $sql = "DELETE FROM posts WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
    return $result;
}

function delete_post($id){
    global $conn;
    $sql = "DELETE FROM posts WHERE id = ? LIMIT 1";
    
    $stmt = $conn->prepare($sql);
    $success = $stmt->execute([$id]);
    return $success;
    
}
