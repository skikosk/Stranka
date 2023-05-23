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
                        if (isset($_POST["submit"])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $email = $_POST['email'];
                            $passwordRepeat = $_POST['repeat_password'];
                            
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                            $errors = array();
                            
                        if (empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
                                array_push($errors,"Vyplnte vsetky polia");
                            }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                array_push($errors, "Email is not valid");
                            }
                        if (strlen($password)<8) {
                            array_push($errors, "Heslo musi mat aspon 8 znakov");
                        }
                        if ($password!==$passwordRepeat) {
                            array_push($errors, "Heslá sa nezhodujú");
                        }
                        require_once "database.php";
                        $sql = "SELECT * FROM users WHERE email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount>0) {
                            array_push($errors, "Email už existuje!");
                        }
                        if (count($errors)>0) {
                            foreach ($errors as $error) {
                                echo "<dic class='alert alert-danger'>$error</div>";
                            }
                        }else{
                            
                            $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                            if ($prepareStmt) {
                                mysqli_stmt_bind_param($stmt,"sss",$username, $passwordHash, $email);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>Ste uspesne zaregistrovany.</div>";
                            }else{
                                die("Niečo sa pokazilo :(");
                            }
                        }
                    }
                    
                     ?>


    <form action="registration.php" method="post">
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Meno">
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Heslo">
        </div>
        <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <input name="repeat_password" type="password" class="form-control" placeholder="Opakovať heslo">
        </div>
        <div class="form-btn">
            <input name="submit" class="btn btn-primary" type="submit" Value="Register">
        </div>
        <p><a href="login.php">Prihlásiť</a></p>
        <p><a href="index.php">Späť na hlavnú stránku</a></p>
    </form>
</div>
</body>

</html>