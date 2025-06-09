<?php
// function connectToCharger(){
    // $host = "localhost";
    // $user = "root";
    // // $password = "sql@2025";
    // $password ="";
    // $_db = "elite_db";

    // $conn = mysqli_connect($host, $user, $password, $_db);

    // if(!$conn){
    //     die("Connection failed".mysqli_connect_error());
    // }

    // echo "Contected Successfully!";

    // mysqli_close($conn);

// }

$host = "localhost";
$user = "root";
$password = "";
$database = "elite_db";

$conn = new mysqli($host, $user, $password, $database, 3307);

if($conn->connect_error){
    die("Connect failed:".$conn->connect_error);
}
