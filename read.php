<?php 
include 'functions/functions.php';

// echo $_SESSION['login_id'];
$loginID = $_SESSION['login_id'];

$currentUser = getOneUser($loginID);
// print_r($currentUser);
// echo $loginID;

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <p class="lead text-center"><?php echo $currentUser['fname'] ?></p>
        <table class="table table-bordered mt-5 table-danger table-hover mx-auto">
            <thead>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
                <th>Password</th>
                <th>birthdate</th>
                <th>User Image</th>
                <th colspan="3">Options</th>
            </thead>
            <tbody>
                    <?php 
                    $userList = displayUsers();
                    // print_r($userList);
                        foreach($userList as $row){
                            $id = $row['user_id'];
                           echo "<tr>";
                            // echo $id;
                                echo "<td>".$row['fname']."</td>";
                                echo "<td>".$row['lname']."</td>";
                                echo "<td>".$row['username']."</td>";
                                echo "<td>".$row['password']."</td>";
                                echo "<td>".$row['birthdate']."</td>";
                                if(!empty($row['user_img'])){
                                    $image = $row['user_img'];
                                    echo "<td><img src = 'uploads/$image' class = 'img-thumbnail'>
                                    
                                    </td>";
                                   
 
 
                                }else{
                                    echo "<td><a href = 'upload.php?user_id=$id' role ='button' class ='btn btn-info'>Upload Photo</a></td>";
                                }
                                echo "<td><a href = 'update.php?user_id=$id' role ='button' class ='btn btn-info'>Update User</a></td>";
                                echo "<td><a href = 'delete.php?user_id=$id' role ='button' class ='btn btn-danger'>Delete User</a></td>";
                                echo "<td><a href = 'upload.php?user_id=$id' role ='button' class ='btn btn-info'>Upload Photo</a></td>";
                              
                           echo "</tr>";
                        }
                    
                    
                    ?>
            </tbody>
        </table>
        <a href = 'create.php' role="button" class="btn btn-outline-danger">Add user</a>
        <a href = 'logout.php' role="button" class="btn btn-outline-danger">Logout</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>