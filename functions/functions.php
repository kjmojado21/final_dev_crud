<?php
include 'connection.php';

// creates a reusable function for adding a user in the database
function addUser($fname, $lname, $uname, $pword, $bDate)
{
    // converting connection into a variable
    $connection = connection();
    //putting sql code inside a variable
    $sql = "INSERT INTO users(fname,lname,username,password,birthdate)VALUES('$fname','$lname','$uname','$pword','$bDate')";
    // variable that would execute the sql code
    $result = $connection->query($sql);
    // making sure that there is no error(if else for display any error)
    if ($result == FALSE) {
        die("adding user error" . $connection->connect_error);
    } else {
        // change webpage if there is no error
        header('location:read.php');
    }
}

function displayUsers()
{
    $connection = connection();
    $sql = "SELECT * FROM users";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) { // checks the data inside the database. if its more than 0, the execute the  code below
        $row = array(); // initiate array for later use (used inside while loop)
        while ($rows = $result->fetch_assoc()) { //creating while loop to get all of the data inside the database
            $row[] = $rows; //passing the data from the database inside the initiated row array
        }

        return $row; //returning row which holds the data from the database back to function displayUsers

    } else {
        return FALSE; // return false if there is no data inside database
    }
}

function deleteUser($id)
{
    $connection = connection();
    $sql = "DELETE FROM users WHERE user_id = '$id'";
    $result = $connection->query($sql);

    if ($result == FALSE) {
        die("deleting user failed" . $connection->connect_error);
    } else {
        header('location:read.php');
    }
}

function getOneUser($id)
{
    $connection = connection();
    $sql = "SELECT * FROM users WHERE user_id = '$id'";
    $result = $connection->query($sql);

    if ($result == FALSE) {
        die('cannot get one user' . $connection->connect_error);
    } else {
        return $result->fetch_assoc();
    }
}

function updateUser($id, $fname, $lname, $username, $password, $bDate)
{
    $connection = connection();
    $sql = "UPDATE users SET fname ='$fname',lname = '$lname',username='$username',password ='$password',birthdate = '$bDate' WHERE user_id='$id'";
    $result = $connection->query($sql);

    if ($result == FALSE) {
        die('cannot update user' . $connection->connect_error);
    } else {
        header('location:read.php');
    }
}

function login($username, $password)
{
    $conn = connection();
    // the query for login
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    //if the query returns one data- do the code inside if else
    if($result->num_rows==1){
        $row = $result->fetch_assoc();
        
        //session is a pre defined variable the will hold the data that has been saved inside your machine, in this case im passing the user id from the database in sesion
        $_SESSION['login_id'] = $row['user_id'];


        header('location:read.php');

        // print_r($row);


    }else{
        echo "<div class='alert alert-danger'>User Doesn't Exist!</div>";
    }

}

function uploadPhoto($id,$photoName){
    // the folder that will hold the uploaded files
    $target_dir = 'uploads/';
    //basename() gets the file name.. returns a value of string since filename is letters.
    $target_file = $target_dir.basename($photoName);
    $conn = connection();
    //a simple updating query for img
    $sql = "UPDATE users SET user_img = '$photoName' WHERE user_id = '$id'";
    $result = $conn->query($sql);

    if($result == FALSE){
        die('unable to upload photo'.$conn->connect_error);
    }else{
        //move uploaded files creates a copy of your picture and moving it inside the directory
        move_uploaded_file($_FILES['picture']['tmp_name'],$target_file);
        header('location:read.php');
    }


}
