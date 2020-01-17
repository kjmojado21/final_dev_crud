<?php 
session_start();
// function of our database connection
function connection(){
    // the name of the server
    $servername ='localhost';
    //username of phpmyadmi
    $username ='root';
    //windows user doesnt have password
    //for mac user: password is root
    $password ='';
    //the database name created in phpmyadmin
    $database ='januarydev';

    // a variable that holds the connection between php and phpmyadmin
    $conn = new mysqli($servername,$username,$password,$database);

    // displays error if there is any
    if($conn->connect_error){
        die("Connection error in ".$conn->connect_error);
    }else{
        // returns the connection to the function for future uses
        return $conn;
        // echo "connection successful";
    }

}

// echo connection();








?>