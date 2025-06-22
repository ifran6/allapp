<?php
include_once('../includes/connect.php');

function select_product(){
    global $conn;
    $sql = "SELECT * FROM product ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $users = $stmt->fetch();
    }else {
        $users = 0;
    }

    return $users;
}

function productCounter($sql){
    global $conn;

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['item'] ?? 0;
}


function get_ProductBy_Id($id){
    global $conn;
    $sql = "SELECT * FROM product WHERE id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    if($stmt->rowCount() > 0){
        $users = $stmt->fetch();
    }else {
        $users = 0;
    }

    return $users;

}



function is_product_exist($data){
    global $conn;
    $sql = "SELECT * FROM product WHERE product_name = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$data]);
    $prodo = $stmt->fetch();
    return $prodo;
}


function insert_product($data){
    global $conn;
    	// id	product_name	category	product_description	qty	price	is_active	
    $sql = "INSERT INTO product(product_name, category, product_description, qty, price,created_at, updated_at, is_active)VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $inserter = $stmt->execute($data);
    return $inserter;

}

function update_product($data){
    global $conn;
    $sql = "UPDATE product SET product_name = ?, product_description = ?, category = ?, qty = ?, price = ?, updated_at = ? WHERE id = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $updated = $stmt->execute($data);
    return $updated;
}

function delete_product($id){
    global $conn;
    $sql = "DELETE FROM product WHERE id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt, "i", $id);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $success;
    }
}


// function delete_product($id){
//     global $conn;
//     $sql = "DELETE FROM product WHERE id = ? LIMIT 1";

//     $stmt = $conn->prepare($sql);
//     $updated = $stmt->execute([$id]);
//     return $updated;
// }