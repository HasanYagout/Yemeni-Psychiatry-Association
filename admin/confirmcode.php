<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php'; 
 
    session_start();
    
?>
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
        <title>Login</title>
</head>
<body>

<?php
if($_SESSION['fromforget'] == "false"){

    echo "<script>
            window.location.href='../Login-Signup.php';
            </script>";
 }
 else{
    //reset the variable

    if(isset($_POST['check']))
    {
    include '../DB.php';
    $email=$_SESSION['email'];
        $table = 'users';
    $result=mysqli_query($connect,"select * from $table where EMAIL='".$email."'");
    $row=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)==1)
    {  
        $_SESSION['id']=$row['ID'];
        if($row['CODE']==$_POST['code']){
            $_SESSION['fromforget'] = "false";
           $_SESSION['fromconfirm'] = "true";
           echo "<script>
           window.location.href='ResetPassword.php';
           </script>";}
        else if($row['CODE']!=$_POST['code']){
            echo "<script>
        alert('the confirmation code is incorrect please check and try again');
   </script>";
        }
   
   
        
    }
    else{
        echo "<script>
        alert('Error');
   </script>";
    }
    }
    
   
 }

 ?>


 
 <div class="confirmcode">
     <h1>Enter the code that has been sent to your Email </h1>
     <form action="confirmcode.php" id="confirmcodeform"  method="post" enctype="multipart/form-data">
<div class="row mb-3">
 <label for="inputTitle" class="col-sm-2 col-form-label">Confirmation Code</label>
 <div class="col-sm-10">
   <input type="text" class="form-control" name="code" id="inputconfirmcode">
 </div>
</div>




<button type="submit" name="check" class="btn btn-primary">Confirm</button>
</form>
 </div>

   

</body>
</html>