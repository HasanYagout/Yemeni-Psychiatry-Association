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
  
 if(isset($_POST['submit']))
 {

    if(empty($_POST['email']))
    {
        echo "<script>
        alert('Email Field is Empty');
        </script>"; 
    }
    else{
    include '../DB.php';
    $email=$_POST['email'];
    $_SESSION['email']=$email;
    $table = 'users';
    $result=mysqli_query($connect,"select * from $table where EMAIL='".$email."'");
 if(mysqli_num_rows($result)==1)
 {   
     $row=mysqli_fetch_array($result);
     $firstname= ucwords($row['FIRSTNAME']);
     $code=rand(10000,100000);
     $_POST['code']=$code;
     
     $update_query = "UPDATE users SET CODE ='$code' WHERE EMAIL='$email'";
     $result=mysqli_query($connect,$update_query);
     $mail = new PHPMailer(true);
     $mail->isSMTP();
     $mail->Host='mail.yemenipsychiatry.com';
     $mail->SMTPAuth=true;
     $mail->Username='_mainaccount@yemenipsychiatry.com';
     $mail->Password= 'r2[8lA4ZwB7)dS';
     $mail->SMTPSecure= 'ssl';
     $mail->Port= '465';
     $mail->setFrom('info@yemenipsychiatry.com');
     $mail->addAddress($_POST['email']);
     $mail->isHTML(true);
     $body .= <<<EOD
      <a href=''><img src='https://yemenipsychiatry.com/images/logo.png' alt='logo'></img></a>
      EOD;
       $mail->Subject = "Reset Password";
        $mail-> Body="
        <body>
            <a href='https://my-website.com'><img src='https://yemenipsychiatry.com/images/logo.png' style='margin: 0 auto; display: block;' alt='logo'></img></a>
        <div class='content' style='text-align: center;>
     <h1 style='color:#73DDC2;'>Hello $firstname</h1>
     <p style='color:#11698E;'>We Recieved a Request to reset the password for your account and this is your confirmation Code.</p>
     <strong style='text-decoration: underline; color:#11698E;'>$code</strong>
        </div>'
        </body>
        ";
        if($mail->send())
        {
        echo "<script>
        alert('we have sent an email to $email with your confirmation code')
        </script>";
        $_SESSION['fromforget'] = "true";
        echo "<script>
            window.location.href='confirmcode.php';
            </script>";}
        else{
        echo "<script>
        alert('Error');
        </script>"; 
        }
  
 }

 else if(mysqli_num_rows($result)==0){
    echo "<script>
    alert('there is no registered email with this email please check and try again')
    </script>";  
}
 }
}
 ?>
<div class="forgetpassword">
    <h1>Enter Your Email</h1>
    <form action="ForgetPassword.php" id="forgetform" method="post" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="inputTitle" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" id="inputforget">
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>