<?php
	$filename = $files['name'];
	$fileerror = $files['error'];
	$filetemp = $files['tmp_name'];
	$fileext = explode('.',$filename);
	$filecheker = strtolower(end($fileext));
	$extstore = array('png' ,'jpg','jpeg');
	if(in_array($filecheker , $extstore))
	{
		$terget = 'uploads/'.$filename;
		move_uploaded_file($filetemp , $terget);
	}
	else
	{
		echo "Photo Insertion Problem";
	}
?> 