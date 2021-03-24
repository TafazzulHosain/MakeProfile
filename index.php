<?php
	///Insert into database
	require "connection.php";
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$name = $_POST['fulltname'];
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$versity = $_POST['versity'];
		$dept = $_POST['department'];
		$skills = $_POST['skills'];

		$files = $_FILES['fileToUpload'];
		
		include "upload.inc.php";
	
		$q = "select * from student_info where email='$email'";
		$checker = mysqli_query($conn , $q);
		

		if(mysqli_num_rows($checker)>=1) ///For Email uniqueness
		{
			header("location:index.php?Used");
		}
		else
		{
			$sql = "INSERT INTO student_info (id,name, email,fname,versityname,dept,skills,photo)VALUES
			('$id','$name','$email','$fname' , '$versity' , '$dept','$skills','$terget')";
			$insertValues = mysqli_query($conn,$sql);
			header("location:index.php?OK");
		}
	
	       
	}
	if(isset($_POST['view']))
	{
		header("location:view.php");
	}
?>

<!-- HTML code for Registration -->

<html>
<head>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		
	<h1 class = "text-dark bg-info text-center">All Registered Profile</h1>

		<form action=" " method="post" enctype="multipart/form-data">
			<div class ="row">
				<?php if(isset($_GET['Used'])){echo "Try Another E-mail";} ?>
				<?php if(isset($_GET['OK'])){echo "Insert Successfully";} ?>
			</div>
			
			<div class="row">
				<div class="col-25">
					<label for="fname">Full Name</label>
				</div>
				<div class="col-75">
					<input type="text"name="fulltname" placeholder="Your name..">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">ID</label>
				</div>
				<div class="col-75">
					<input type="number" name="id" placeholder="Your ID..">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="fname">Email</label>
				</div>
				<div class="col-75">
					<input type="email" name="email" placeholder="Your Email..">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="lname">Father Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="fname" placeholder="Your father name..">
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="country">University</label>
				</div>
				<div class="col-75">
					<select  name="versity">
						<option value="duet">DUET</option>
						<option value="buet">BUET</option>
						<option value="du">DU</option>
						<option value="ruet">RUET</option>
						<option value="cuet">CUET</option>
						<option value="kuet">KUET</option>
					</select>
					
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="country">Department</label>
				</div>
				<div class="col-75">
					<select  name="department">
						<option value="cse">CSE</option>
						<option value="eee">EEE</option>
						<option value="ce">CE</option>
						<option value="me">ME</option>
						<option value="te">TE</option>
						<option value="food">FOOD</option>
					</select>
					
				</div>
			</div>
			<div class="row">
				<div class="col-25">
					<label for="skills">Skills</label>
				</div>
				<div class="col-75">
					<textarea id="skills" name="skills" placeholder="Write about your skills.." style="height:200px"></textarea>
				</div>
			</div>
			<div class = "row">
				<div class ="col-25">
					<label for="photo">Photo</label>
				</div>
				<div class="col-75">
					<input type="file" name="fileToUpload" id="fileToUpload" >
				</div>
			</div>
			<div class="row right">
				<input type ="submit" value="View" name="view">
				<input type="submit" value="Submit" name="submit">
				
				
			</div>
		</form>
	</div>
</body>
</html>