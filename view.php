
<?php

    require 'connection.php'; // For connetion
    $result = mysqli_query($conn,"SELECT * FROM student_info"); /// Retriveing all data from database to show

?>



<!-- View page HTML -->

<!DOCTYPE html>
<html>
<head>
    <title> Retrive data</title>
    <!--<link rel="stylesheet" href="style.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    <body>
        <div class="container bg-light " >
            <br>
            <a href="index.php">index</a> 
            <h1 class = "text-dark bg-info text-center">All Registered Profile</h1>
            <div class="table-responsive text-center">
                <table class="table table-hover table-striped table-bordered">
                    <thead class = "">
                        <th>ID</td>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($result) > 0) 
                            {
                                $i=0;
                                while($row = mysqli_fetch_array($result))
                                {
                        ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <!--<td><a href="profile1.php?id=<?php echo $row['id']?>" ><button  class ="view" >View Details</button></a></td>-->
                                        <td><a href="profile.php?id=<?php echo $row['id']?>" ><img src="<?php echo $row['photo']; ?>"  width="100px" height="60px"  ></a></td>

                                        <!--<td class ="view" ><a href="profile.php?id " >Profile</a></td>  -->

                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                    </tbody>
                </table>

                        <?php
                            }
                            else{echo "No result found";}
                        ?>
            </div>

        </div>
    </body>
</html>