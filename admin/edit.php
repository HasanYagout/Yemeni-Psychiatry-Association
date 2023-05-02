<?php
	require_once '../DB.php';
	if(ISSET($_POST['edit'])){
    $user_id = $_POST['user_id'];
    if($_FILES['photoupdate']['name']==''){
      $result=mysqli_query($connect, "SELECT IMAGE from `news` WHERE ID = '$user_id'") or die(mysqli_error());
      $row=mysqli_fetch_array($result);
      $rr=$row['IMAGE'];
      $title = $_POST['title'];
      $link=$_POST['link'];
		$date = $_POST['date'];
    $paragraph = $_POST['paragraph'];
    mysqli_query($connect, "UPDATE `news` set `DATE` = '$date', `IMAGE` = '$rr', `TITLE` = '$title', `PARAGRAPH` = '$paragraph', `LINK` = '$link' WHERE `ID` = '$user_id'") or die(mysqli_error());
    echo "<script>alert('News Updated!')
    window.location.href='ManageNews.php';
    </script>";

    }
    else{
      $image_name = $_FILES['photoupdate']['name'];
      $image_temp = $_FILES['photoupdate']['tmp_name'];
      $title = $_POST['title'];
      $date = $_POST['date'];
      $link=$_POST['link'];
      $paragraph = $_POST['paragraph'];
      $previous = $_POST['previous'];
      $exp = explode(".", $image_name);
      $end = end($exp);
      $name = time().".".$end;
      $path = "../admin/upload/".$name;
      $allowed_ext = array("gif", "jpg", "jpeg", "png","");
        
            move_uploaded_file($image_temp, $path);
            mysqli_query($connect, "UPDATE `news` set `DATE` = '$date', `IMAGE` = '$path', `TITLE` = '$title', `PARAGRAPH` = '$paragraph',`LINK` = '$link' WHERE `ID` = '$user_id'") or die(mysqli_error());
            echo "<script>alert('News Updated!')
            window.location.href='ManageNews.php';
            </script>";
    
  
    }
		

				
				
		
	}


	if(ISSET($_POST['updateuser'])){
		$user_id = $_POST['user_id'];
		$firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$jobplace = $_POST['jobplace'];
    	$experience = $_POST['experience'];
    	$degree = $_POST['degree'];
    	$email = $_POST['email'];
    	$type = $_POST['type'];


			
				mysqli_query($connect, "UPDATE `users` SET FIRSTNAME='$firstname', LASTNAME='$lastname',JOBPLACE='$jobplace',EXPERIENCE='$experience',DEGREE='$degree',EMAIL='$email',TYPE='$type' WHERE ID=$user_id") or die(mysqli_error());
				echo"<script>if(!alert('User has been updated'))
    document.location = 'ManageUsers.php';
              </script>";
		
	}
?>