<?php
    require "connection.php";
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = $_POST['psw'];
        $r_pass = $_POST['psw-repeat'];

        if($pass != $r_pass)
        {
            header("location:signup.php?invalid");
        }
        else
        {
            $check = mysqli_query($conn , "select * from login where email ='$email'");
            if(mysqli_num_rows($check)>0)
            {
                header("location:signup.php?Used");
            }
            else
            {
                $result = mysqli_query($conn ,"insert into login(id ,email , password) values ('','$email' , '$pass')" );
                header("location:index.php");

            }

        }
        
        
    }
?>


<html>
<body class="bg-light">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
        <form action=" " method="post" >
            <div class="container">
                <div class="col-lg-10 m-auto">
                    <div class ="bg-light mt-5">
                        <br>
                        <h1 class = "text-dark bg-info text-center py-3">Register</h1>

                        <?php if(@isset($_GET['invalid'])) { ?>
                            <div class=" text-danger text-center mt-2 py-2 "> <?php echo "Password does not match!"; ?> </div>

                        <?php } ?>

                        <?php if(@isset($_GET['Used'])) { ?>
                            <div class=" text-danger text-center mt-2 py-2 "> <?php echo "That email previously used!"; ?> </div>

                        <?php } ?>
                    
                        <div class = "form-group">
                            <label for="email"><b>Email</b></label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="psw"><b>Password</b></label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
                        </div>
                        <div class="form-group">
                            <label for="psw-repeat"><b>Repeat Password</b></label>
                            <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                            <hr>
                        </div>
                        <button type="submit" name="submit"  class="registerbtn btn btn-primary">Register</button>
                    </div>

                    <div class="container signin">
                        <p>Already have an account? <a href="index.php">Sign in</a>.</p>
                    </div>
                </div>
            </div>
        </form>
<body>
</html>
