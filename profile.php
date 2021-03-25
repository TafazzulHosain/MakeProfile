<?php 
    require "connection.php";
    session_start();
    if($_SESSION['id'] )
    {

        if(isset($_GET['id'])) 
        {
            $id = $_GET['id'];
            $q = "select * from student_info where id ='$id'"; ///Qurey for Finding specific profile
            $result = mysqli_query($conn , $q);

        }
?>

<html>
    <head>
        <!-- <link rel="stylesheet" href="style.css" />-->  
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body class="bg-light">
    <div class="container bg-light">
         <br>
         <a class='btn-sm btn-secondary' role='button' href='registration.php'>Registration</a>
        <a class='btn-sm btn-secondary' role='button' href="view.php">View</a>
        <small class = " btn-sm btn-secondary col-sm-12  text-left">Profile</small>
        <h1 class = "text-dark bg-info text-center ">Personal Profile</h1>
        

        <?php
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_array($result))
                {        
            
        ?>
                    <div class="row ">
                        <div class="col-sm-4">
                            <img class="img-thumbnail" alt="Cinque Terre" src="<?php echo $row['photo']; ?>" height="200px" width="200px">
                            <p class ="text-info text-justify" ><?php echo $row['skills'];?></p>
                        </div>

                        <div class="col-sm-8">
                            <div class ="row">
                                <div class ="col-sm-3">
                                    <lable> ID:</lable>
                                </div>
                                <div class ="col-sm-5">
                                    <p><?php echo $row['id'];?></p>
                                </div>
                            </div>
                            <div class ="row">
                                <div class ="col-sm-3">
                                    <lable> Name:</lable>
                                </div>
                                <div class ="col-sm-5">
                                    <p><?php echo $row['name'];?></p>
                                </div>
                            </div>

                            <div class ="row">
                                <div class ="col-sm-3">
                                    <lable> Email:</lable>
                                </div>
                                <div class ="col-sm-5">
                                    <p><?php echo $row['email'];?></p>
                                </div>
                            </div>

                            <div class ="row">
                                <div class ="col-sm-3">
                                    <lable> Father Name:</lable>
                                </div>
                                <div class ="col-sm-5">
                                    <p><?php echo $row['fname'];?></p>
                                </div>
                            </div>

                            <div class ="row">
                                <div class ="col-sm-3">
                                    <lable> University Name:</lable>
                                </div>
                                <div class ="col-sm-5">
                                    <p class="text-uppercase"><?php echo $row['versityname'];?></p>
                                </div>
                            </div>
                            <div class ="row">
                                <div class ="col-sm-3">
                                    <lable> Department:</lable>
                                </div>
                                <div class ="col-sm-5">
                                    <p class="text-uppercase"><?php echo $row['dept'];?></p>
                                </div>
                            </div>
                        
                        </div>


         <?php 

                }
            }
            echo "<a class='btn btn-info' role='button' href='logout.php?logout'>Logout</a>";
        }
        else
        {
            header("location:view.php");
        }


        ?>

                    </div>
                    
       

        
    </div>
       
    </body>
</html>
