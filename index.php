<?php
    require "connection.php";
    session_start();
    if(isset($_POST['sub']))
    {
        if(empty($_POST['email']) or empty($_POST['password']))
        {
            header("location:index.php");
        }
        // else if($_POST['name'] =='admin')
        // {
        //     $result = mysqli_query($conn , "select * from student_info where name = '".$_POST['name']."' and password = '".$_POST['password']."' ");

        //     if(mysqli_fetch_assoc($result))
        //     {
        //         $_SESSION['User'] = $_POST['name'];

        //         header("location:view.php?wellcome");
        //     }
        //     else
        //     {
        //         header("location:index.php?invalid=Please fill with correct Email and password!");
        //     } 

        // }
        else
        {
            $result = mysqli_query($conn , "select * from login where email = '".$_POST['email']."' and password = '".$_POST['password']."' ");
            
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User'] = $_POST['email'];

                header("location:registration.php?wellcome");
            }
            else
            {
                header("location:index.php?invalid=Please fill with correct Email and password!");
            } 
        }


    }
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card  bg-light mt-5">
                    <?php
                        if(@isset($_GET['invalid']))
                        {
                    ?>      <div class="alert-danger text-danger text-center mt-2 py-2 "> <?php echo $_GET['invalid'];?> </div>
                    <?php    
                        } 
                    ?>

                    <div class="card-title bg-info   mt-5">
                        <h1 class="text-center text-white py-3">Login form</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="was-validated">
                            <input type="email" name="email" placeholder="Email.." class="form-control mb-3" required> 
                            <input type="password" name="password" placeholder="Password.." class="form-control mb-3" required>
                        
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                                </label>
                            </div>
                            <input type="submit" name="sub" class="btn btn-primary">
                            <a href="signup.php" class="btn btn-info" role="button">Sign Up</a>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>
       
    </body>
</html>