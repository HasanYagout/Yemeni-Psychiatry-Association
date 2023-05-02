<?php
	require_once '../DB.php';
	if(ISSET($_POST['save'])){
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$title = $_POST['title'];
		$date = $_POST['date'];
		$paragraph = $_POST['paragraph'];
		$link=$_POST['link'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($connect, "INSERT INTO `news` VALUES('', '$date', '$path', '$title', '$paragraph','$link')") or die(mysqli_error());
				echo"<script>if(!alert('News has been Added'))
    				document.location = 'ManageNews.php';
              		</script>";
			}	
		}else{
			echo "<script>alert('Error')</script>";
		}
	}

	if(ISSET($_POST['saveuser'])){
		$query="select * from users where EMAIL='".$_POST['email']."'";
		$result=mysqli_query($connect,$query);
		  if(mysqli_num_rows($result)!=0)
		  {
			echo"<script>if(!alert('User Already Exists'));
			  </script>";
			exit();

		  }
		  else{
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$jobplace=$_POST['jobplace'];
			$experience=$_POST['experience'];
			$degree=$_POST['degree'];
			$type=$_POST['type'];
			mysqli_query($connect, "INSERT INTO `users` VALUES('', '$firstname', '$lastname', '$jobplace', '$experience' , '$degree', '$email' , '$password', '$type', '0')") or die(mysqli_error());
			echo"<script>if(!alert('User has been Added'))
					document.location = 'ManageUsers.php';
					   </script>";
		  }
		
	}


?>