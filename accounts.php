<?php
include  'database.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="dashboard/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="dashboard/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="dashboard/css/tooplate.css">
</head>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="accounts.php">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Dashboard</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="registration.php">Pridať pouzivatela</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.php">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->

       <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Operacie</th>
    </tr>
  </thead>

  <?php
        $sql = "Select * from `users`";
        $result = mysqli_query($conn, $sql);
        if ($result){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $username = $row['username']; 
                $email = $row['email'];
                echo'<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$username.'</td>
                <td>'.$email.'</td>
                <td>
                    <button class="btn btn-primary"><a href="update.php? updateid='.$id.'">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class = "text-light">Delete</a></button>
                </td>
              </tr>';
            }
        }
        ?>
</tbody>
</table>
        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>