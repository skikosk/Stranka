<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body> 
 <div class="container">

 <?php
                        include 'database.php';
                        $id=$_GET['updateid'];
                        $sql="Select * from `users` where id=$id";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        $username=$row['username'];
                        $email=$row['email'];
                        $password=$row['password'];

                        if (isset($_POST["submit"])){
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            $sql="update `users` set id='$id', username='$username', email='$email', password='$password' where id=$id"; 
                            $result=mysqli_query($conn,$sql);
                            if($result){
                                header('Location:accounts.php');
                            }else{
                                die(mysqli_error($conn));
                            }
                        }
?>



 <form method="post">
        <div class="form-group">
            <input autocomplete="off" value=<?php echo $username;?> name="username" type="text" class="form-control" placeholder="Meno">
        </div>
        <div class="form-group">
            <input autocomplete="off" value=<?php echo $email;?> name="email" type="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <input autocomplete="off" value=<?php echo $password;?> name="password" type="text" class="form-control" placeholder="Heslo">
        </div>
        <div class="form-btn">
            <input name="submit" class="btn btn-primary" type="submit" Value="Update">
        </div>
        <p><a href="accounts.php">Naspäť</a></p>
    </form>
</div>
</body>

</html>