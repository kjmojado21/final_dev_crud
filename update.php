<?php 
include 'functions/functions.php';
$userID = $_GET['user_id'];

$row = getOneUser($userID);

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
    <div class="container">
        <div class="card mt-5 mx-auto w-75">
            <div class="card-header">
                <p class="lead">
                    Add User
                </p>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-8">
                                <input type="text" name="fname" placeholder="<?php echo $row['fname'] ?>" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="lname" placeholder="<?php echo $row['lname'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <input type="text" name="username" placeholder="<?php echo $row['username'] ?>" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <input type="password" name="password" placeholder="<?php echo $row['password'] ?>" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <input type="date" name="birthdate" value="<?php echo $row['birthdate'] ?>" class="form-control">
                            </div>
                        </div>
                        <button type="submit" name="addUser" class="btn btn-outline-info mt-3 btn-block">Add User</button>
                    </div>
                </form>

            </div>
        </div>
        <?php 
            if(isset($_POST['addUser'])){
                $firstname = $_POST['fname'];
                $lastname = $_POST['lname'];
                $username = $_POST['username'];
                $password =$_POST['password'];
                $birthDate = $_POST['birthdate'];

                updateUser($userID,$firstname,$lastname,$username,$password,$birthDate);

            }
        
        
        ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>