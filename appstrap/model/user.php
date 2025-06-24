<?php
include_once('../includes/connect.php');

function select_ads(){
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

function adsCounter($sql){
    global $conn;

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['item'] ?? 0;
}


function get_AdsBy_Id($id){
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



function is_Ads_exist($data){
    global $conn;
    $sql = "SELECT * FROM ads_tab WHERE ads_title = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data);
    $stmt->execute();
    $ads_data = $stmt->get_result();
    if($ads_data && $ads_data->num_rows > 0){
        return true;
    }

    return false;
}


function insert_Ads($data){
    global $conn;
    	
    $sql = "INSERT INTO ads_tab(ads_title, ads_description, ads_category,ads_image,is_active, created_at,updated_at)VALUES(?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $inserter = $stmt->execute($data);
    return $inserter;

}

function update_ads($data){
    global $conn;
    $sql = "UPDATE ads_tab SET ads_title = ?, ads_description = ?, ads_category = ?, ads_image = ?, is_active = ?, updated_at = ? WHERE id = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $updated = $stmt->execute($data);
    return $updated;
}

function delete_ads($id){
    global $conn;
    $sql = "DELETE FROM ads_tab WHERE id = ? LIMIT 1";

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
//     $sql = "DELETE FROM product WHERE id = ? LIMIT 1"
//     $stmt = $conn->prepare($sql);
//     $updated = $stmt->execute([$id]);
//     return $updated;
// }