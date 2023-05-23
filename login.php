<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
         if (isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"]; 
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    header("Location: accounts.php");
                    die();
                }else{
                    echo"<div class='alert alert-danger'>Heslo sa nezhoduje</div>";
                }
            }else {
                echo"<div class='alert alert-danger'>Email sa nezhoduje</div>";
            }
         }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Zadajte Email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Zadajte Heslo" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
            <p><a href="registration.php">Registrovať</a></p>
            <p><a href="index.php">Späť na hlavnú stránku</a></p>
        </form>
    </div>
</body>
</html>