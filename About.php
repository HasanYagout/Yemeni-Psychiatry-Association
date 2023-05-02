<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>About</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand"><img class="logo" src="images/logo.png" height="80px" width="80px" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      
    <ul class="navbar-nav mx-auto">
    
        <li class="nav-item"><a class="nav-link fs-5" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="About.php">About</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="News.php">News</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="Contact-Us.php">Contact Us</a></li>


          <li class="nav-item"><a class="nav-link fs-5" id="login" href="Login-Signup.php">Login</a></li>

<?php
        if(!empty($_SESSION['firstname'])){
            if($_SESSION['type']==1){
                ?>
                <li class="dropdown-center nav-item">
                <a class=" dropdown-toggle nav-link fs-5" data-bs-toggle="dropdown" aria-expanded="false">
                  Manage
                </a>
                <ul class="dropdown-menu">
                    <a class="nav-link fs-5" href="admin/ManageNews.php">News</a>
                    <a class="nav-link fs-5" href="admin/ManageUsers.php">Users</a>
                </ul>
            </li>
            <?php
            }
            ?>
           

       <?php
        }
         ?>      
           
   
       
    </ul>

   <div class="account">
    <h1 class="username fs-6 text-end "><?php
        if(!empty($_SESSION['firstname']))
        {

            $FN= $_SESSION['firstname']; $LN=$_SESSION['lastname']; echo  ucwords($FN)." ". ucwords($LN);         

        }
        else{
         
        }
         
         ?></h1>
<?php
         if(!empty($_SESSION['firstname']))
         {
            ?>
            <a class="logout" onclick="myFunction()">Log out</a>
            <script>
  function myFunction() {
    var logout = confirm("Are you sure you want to LOG OUT ?");
  
  if(logout){
       location.href = "admin/Logout.php";
  }
  }
  </script>
  <?php
         }
         else{
          ?>
          
          <?php
         }
         
?>
    </div>
  </div>
</nav>

<div class="all">
<h1 class="fs-1 about-h1">نبذة عن الجمعية</h1>

<div class="about-first-container">
  

  <div class="build">
    <h3>التأسيس:</h3>
    <p class="lh-lg fs-5">
    جمعية تخصصية يمنية مركزها الرئيسي العاصمة صنعاء ؛ تسعى لتحقيق أقصى المعايير في مجالات الطب النفسي والصحة النفسية بالمجتمع المحلي ، أنشئت في 18 مارس 2021 شعارها نزرع أملاً لتطمئن نفوساً .
      </p>
  
  </div>
  
  
  
</div>
  <div class="about-middle-container">

    <div class="message">
      <h3>:الرسالة</h3>
      <img src="images/email.png" alt="">
      <p class="lh-lg fs-5">  تسعى الجمعية اليمنية للطب النفسي أن تكون الأول إقليمياً و يمنياً في تقديم الخدمات النفسية والرعاية الصحية المتكاملة وفق أعلى المعايير المهنية و الممارسات الموثوقة لحماية المرضى النفسانيين وكافة شرائح المجتمع من خلال كادر متخصص  في ظل بيئة محفزة وملهمة للعمل 
       </p>
    </div>
  
    
    
     <div class="value">
        <h3>:القيم</h3>
        <img src="images/value.png" alt="">
        <ul class="lh-lg fs-5">
          <li class="home-li text-end fs-5 lh-lg">انسانية</li>
          <li class="home-li text-end fs-5 lh-lg">العمل الجماعي</li>
          <li class="home-li text-end fs-5 lh-lg">الخدمة المجتمعية</li>
          <li class="home-li text-end fs-5 lh-lg">الشراكة</li>
          <li class="home-li text-end fs-5 lh-lg">الشفافية</li>
        </ul>
     </div>
  
     <div class="vision">
      <h3>:الرؤية</h3>
      <img id="vision-img" src="images/shared-vision.png" alt="">
      <p class="lh-lg fs-5">ان تكون الجمعية أحد المراجع  المعتمدة
         في الاستشارات والإشراف في الطب النفسي في الجمهورية اليمنية والوطن العربي</p>
    </div>

    <div class="goal">
      <h3>الأهداف</h3>
      <img src="images/target.png" alt="">
      <ul>
        <li class="text-end fs-5 lh-lg">نشر الوعي بأهمية الصحة النفسية بين أفراد المجتمع ومؤسساته</li>
        <li class="text-end fs-5 lh-lg"> تقديم خدمات الصحة النفسية المتميزة والمؤثرة في تطوير المجتمع</li>
        <li class="text-end fs-5 lh-lg">تعزيز حقوق الإنسان المرتبطة بالصحة النفسية</li>
        <li class="text-end fs-5 lh-lg">الاستجابة الواعية لحالات الطوارئ والأزمات وتقديم المعالجات النفسية الممكنة لها</li>
        <li class="text-end fs-5 lh-lg"> تأهيل وتدريب الكوادر في مجال الطب النفسي</li>
        <li class="text-end fs-5 lh-lg"> خلق شراكات مستدامة مع الجهات ذات العلاقة في  تقديم أفضل الخدمات الطبية النفسية </li>
        <li class="text-end fs-5 lh-lg">تقديم أفضل الخدمات الطبية النفسية</li>
        <li class="text-end fs-5 lh-lg">توفير موارد مستدامة لغرض تحقيق الاكتفاء الذاتي للجمعية</li>
        <li class="text-end fs-5 lh-lg">المساهمة الفاعلة في تخفيف معاناة المرضى النفسانيين</li>
      </ul>
    </div>

  </div>


  </div>



    <footer>






      <div class="footer_container">
      <div class="row">
      <div class="col-4 " id="links">
       
        <div class="contact-div">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          <h2 class="location fs-5">Zubairi.St, Sana'a, Yemen</h2>
        </div>
        <div class="contact-div" >
      
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
          </svg>
       
          <a class="phone text-decoration-none" href="tel:00967772379364">00967772379364</a>
      </div>
      
       <div class="contact-div" > 
         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
          </svg>
          <p class="email"><a class="text-decoration-none" href="mailto:yemenipsychiatric@gmail.com">yemenipsychiatric@gmail.com</a></p>
       
        </div>
      </div>
      
      
      
      <div class="col-4">
        <h1 class="fs-4 text-start">OVERVIEW</h1>
        <div class="footer_links">
         
          <ul>
            
             <li ><a class="list-group-item text-start" href="index.php">Home</a> </li>
             <li ><a class="list-group-item text-start" href="About.php">About</a> </li>
             <li ><a class="list-group-item text-start" href="News.php">News</a> </li>
                <li><a class="list-group-item text-start" href="Contact-Us.php">Contact Us</a> </li>
                
             </ul>
        </div>
        
      </div>
     
        <div class="col-4">
        <h1 class="fs-4 text-start">MY ACCOUNT</h1>
        <ul>
          <li><a class="list-group-item text-start">My Account</a></li>
          <li><a href="Login-Signup.php" class="list-group-item text-start">Login/Register</a></li>
        </ul>
      </div>
      
      
      </div>
      
      
      </div>  
      
      <div class="copyright">
      
      <em>YagoTech &copy;<?php echo date("Y") ?> All Rights Reserved</em> 
      </div> 
      
      </footer>


</body>
</html>