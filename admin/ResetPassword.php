<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link
            href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
            rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap"
            rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
        <title>Reset Password</title>
</head>
<body>
<?php
if($_SESSION['fromconfirm'] == "false"){
  //send them back
  header("Location: ../Login-Signup.php");
}
else{
  //reset the variable

include '../DB.php';
$table = 'users';
@$id=$_SESSION['id'];

if(isset($_POST['reset'])) {
  if( strlen($_POST['password'])==0 && strlen($_POST['confirmpassword'])==0)
  {
    echo "<script>
            alert('Fields are Empty Please fill them');
              </script>";
  }
  else if( strlen($_POST['password'])==0 || strlen($_POST['confirmpassword'])==0)
  {
    echo "<script>
    alert('One or More Fields are Empty Please fill them');
       </script>";
  }

  else if($_POST['password']!=$_POST['confirmpassword'])
        {
          echo "<script>
            alert('password and Confirm Password did not Match');
               </script>";
        }
        else if( strlen($_POST['password'])<8){
          echo "<script>
            alert('password must be 8 or more characters');
               </script>";
        }

 
        else{

          $password = md5($_POST['password']); 
          $confirmPassword = md5($_POST['confirmpassword']);
          if($password==$confirmPassword)
          {
          $query= "UPDATE $table SET PASSWORD='$password' WHERE id=$id";
          $id=$_SESSION['id'];
          $result = mysqli_query($connect, $query);
          $query2= "UPDATE $table SET CODE=0 WHERE id=$id";
          $result2=mysqli_query($connect,$query2);
          $_SESSION['fromconfirm'] = "false";
          session_destroy();
            echo "<script>
            alert('password Reset succesfully')
            window.location.href='../Login-Signup.php';
               </script>";
          }
          else if($password!=$confirmPassword){
            echo "<script>
            alert('Password and New Password did not Match Please try again');
               </script>";
          }
         
        }
    
    
} 

}



?>
<section>
    <div class="resetpassword">
        <h2>Reset Password</h2>
        <form method="post" id="resetpasswordform" action="ResetPassword.php?id=<?php echo $id; ?>">
       

        
        <div class="row mb-3">
        <label>Password</label>
        <div class="dol-sm-10">
        <input type="password" class="form-control inputresetpassword" name="password">
        </div>
        
        </div>  
            
        <div class="row mb-3">
        <label>Confirm Password</label>
        <div class="dol-sm-10">
        <input type="password" name="confirmpassword" class="form-control inputresetpassword">
        </div>
        
        </div>

            
            <input type="submit" name="reset"  value="Confirm" class="btn btn-primary">
        </form>
    </div>
</section>

  
  
</body>
</html>

