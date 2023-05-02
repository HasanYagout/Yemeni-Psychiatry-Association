<?php 
session_start();

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="جمعية تخصصية يمنية مركزها الرئيسي العاصمة صنعاء ؛ تسعى لتحقيق أقصى المعايير في مجالات الطب النفسي والصحة النفسية بالمجتمع المحلي ، أنشئت في 18 مارس 2021 شعارها نزرع أملاً لتطمئن نفوساً">
        <meta name="keywords" content="yemeni psychiatry,psychiatry,psychiatric, الجمعيه اليمنيه,الجمعيه اليمنيه للطب النفسي,الطب النفسي">
        <meta name="author" content="YagoTech">
        <link rel="stylesheet" href="css/styles.css">
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
            <link rel="icon" type="image/x-icon" href="images/logo.ico">

        <title>Home</title>
       
    </head>
    <body >

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
            $FN= $_SESSION['firstname']; $LN=$_SESSION['lastname']; echo $FN." ".$LN;         

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
        <div class="index-second-div">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="fs-1 home-h1">
                        الجمعية اليمنية للطب النفسي</h1>
                </div>
            </div>
        </div>
        <div class="middle-container">
            <h1>Events</h1>
            <div class="row event">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <h2 class="fs-4">اليوم العلمي الأول لعام 2023 بمشاركة 42 طبيباً وطبيبة
                        <em class="fs-5">فبراير 2023</em>
                    </h2>
                    <img src="images/1679787049385.jpg" alt="">
                    <p>
                        بحضور متميز فاق التوقعات لأكثر من أربعين طبيباً وطبيبة من إستشاريي وإختصاصيي
                        الطب النفسي وأطباء الزمالة العربية واليمنية اختصاص الطب النفسي ؛ أقامت الجمعية
                        اليمنية للطب النفسي ظهر يوم الخميس ٢٣ فبراير ٢٠٢٣م اليوم العلمي الشهري الأول ضمن
                        خطتها العلمية لعام 2023 بقاعة الاجتماعات بمستشفى الأمراض النفسية والعصبية (
                        الأمل للطب النفسي ) بالعاصمة صنعاء وبالتنسيق مع المجلس الطبي اليمني واعتماده
                        كساعات تعليم طبي مستمر ، حيث تناول اليوم العلمي بإسهاب موضوع الفصام وأسبابه
                        وأعراضه وعلاجه والأدوية المضادة للذهان وآثارها الجانبية وكيفية التعامل معها وعن
                        جديد العلم في ذلك . وتتوجه الهيئة الإدارية للجمعية للأستاذ الدكتور نبيل نعمان
                        إستشاري الطب النفسي بجزيل الشكر على إثرائه الموضوع وليس هذا بالأمر المستغرب منه
                        ، كما تثمن المشاركة الرائعة والمستوى المتميز للزملاء د. علي الأكوع ود. فؤاد
                        المزاحم ود. نوال التويتي ود. إيمان عقبة في تناولهم للموضوع . يشار أن هذا اليوم
                        العلمي كان برعاية شركة سن الرائدة في صناعة الادوية ووكيلها باليمن ، وتنسيق
                        الهيئة الإدارية والرقابية بالجمعية .</p>
                </div>

            </div>
            <div class="row event">
                <div class="col-lg-12">

                    <h2 class="fs-4">الأمسية الرمضانية لأعضاء الجمعية بالعاصمة صنعاء
                        <em class="fs-5">إبريل 2021</em>
                    </h2>
                    <img src="images/Screenshot (65).png" alt="">
                    <p>أقامت الجمعية اليمنية للطب النفسي مساء يوم الخميس الثالث من شهر رمضان ١٤٤٢
                        هجرية الموافق 15 إبريل ٢٠٢١ أمسية رمضانية برعاية شركة الأهلية فارما ومستشفى
                        الرسالة للطب النفسي بالنادي الترفيهي ( نادي الشرطة سابقا ) ، حيث حضر جمع كبير من
                        الأطباء النفسيين بالعاصمة صنعاء من أعضاء الجمعية ، حيث بدأت الفعالية بالترحيب
                        بالأعضاء وإعطاء شرح واف لما تم انجازه من قبل الهيئة الإدارية للجمعية في الفترة
                        الماضية بعد انتخابها ب ۱۸ مارس الماضي ۲۰۲۱ اثناء مؤتمر الطب النفسي اليمني ،
                        وأيضا قدم رئيس الجمعية د. إبراهيم الشرفي تصورا مفصلا لما تأمل الجمعية إقامته من
                        الأنشطة والفعاليات في الفترة المقبلة ، ومن ثم استمع الحضور لكلمة مفيدة و رائعة
                        من الدكتور سامي العربي عن بروبيون المضاد للاكتئاب واستخداماته الطبية المتنوعة
                        لاقت استحسانا واستمتاعا من الحاضرين</p>
                </div>

            </div>
            <div class="row event">
                <div class="col-lg-12">

                    <h2 class="fs-4">مؤتمر الطب النفسي اليمني الواقع والطموح
                        <em class="fs-5">
                            مارس 2021</em>
                    </h2>

                    <img src="images/Screenshot (64).png" alt="">
                    <p>برعاية كريمة من معالي رئيس مجلس الشورى الأستاذ محمد العيدروس ورعاية معالي
                        وزير الصحة العامة والسكان الأستاذ الدكتور طه المتوكل وتحت إشراف المجلس الطبي
                        أقامت الجمعية مؤتمر الطب النفسي اليمني الواقع والطموح في العاصمة اليمنية صنعاء
                        خلال الفترة ۱۷ و ۱۸ من شهر مارس ۲۰۲۱ وبحضور عدد كبير من مسئولي الدولة وأمانة
                        العاصمة وبحضور معظم الأطباء النفسانيين من مختلف محافظات الجمهورية اليمنية وأطباء
                        التخصصات الطيبة الأخرى والأطباء العموم وأساتذة الجامعات واختصاصيي علم النفس
                        والاجتماع وطلبة الكليات وجمع كبير من المهتمين والمواطنين امتلأت بهم قاعات النادي
                        الترفيهي ( نادي الشرطة سابقا ) ، حيث تم استعراض ونقاش عدد كبير من الأوراق
                        العلمية في مجال الطب النفسي والصحة النفسية ، ولم شمل الأطباء النفسانيين وإشهار
                        الجمعية اليمنية للطب النفسي بانتخاب هيئة إدارية جديدة . كان تكريم الآباء
                        الراحلين المؤسسين للطب النفسي باليمن لفتة فريدة بالمؤتمر ومنحهم أوسمة لما بذلوه
                        من جهود عظيمة كانت البذرة لما نحن عليه الآن . . تخلل أيام المؤتمر معرض كبير
                        لشركات الأدوية الراعية للفعالية في باحات النادي الترفيهي التي بلغت قرابة 35 شركة
                     وفي ختام المؤتمر تم عرض التوصيات الختامية وتكريم شركاء النجاح من الشركات
                        الراعية للفعالية من شركات الأدوية و الاتصالات والهيئة التحضيرية واللجان التنظيمية والخدماتية للمؤتمر</p>
                </div>
            </div>

            <div class="row event">
                <div class="col-lg-12">

                    <h2 class="fs-4">الملتقى العلمي الرمضاني بمشاركة أكثر من ٤٠ طبيباً وطبيبة
                        <em class="fs-5">
                            ٣٠ مارس 2023</em>
                    </h2>

                    <img src="images/event4.jpeg" alt="">
                    <p>بيوم الطبيب العالمي ٣٠ مارس ؛ الجمعية اليمنية للطب النفسي تقيم الملتقى العلمي
                        الرمضاني بمشاركة أكثر من ٤٠ طبيباً وطبيبة في مساء رمضاني بهي تكسوه الطمأنينة
                        والهدوء ، احتفل العالم في يومه ٣٠ من شهر مارس بيوم الطبيب العالمي وأيضا باليوم
                        العالمي لثنائي القطب ، وبحضور أكثر من أربعين طبيباً وطبيبة من إستشاريي وإختصاصيي
                        الطب النفسي وأطباء الزمالة العربية واليمنية اختصاص الطب النفسي ؛ أقامت الجمعية
                        اليمنية للطب النفسي عصر يوم الخميس ٣٠ مارس ٢٠٢٣م الملتقى العلمي الشهري الثاني
                        ضمن خطتها العلمية لعام 2023 بالعاصمة صنعاء وبالتنسيق مع المجلس الطبي اليمني
                        واعتماده كساعات تعليم طبي مستمر ، حيث بدأ الملتقى العلمي بمحاضرة قيمة للأستاذ
                        الدكتور محمد المقرمي إستشاري الطب النفسي حيث تحدث بإستفاضة وشرح وافٍ عن دلالات
                        ومصطلحات في الطب النفسي ( Ontology , epistemology and axiology in psychiatry
                        )ومدى أهميتها وواقعيتها مع الرد على استفسارات الحاضرين وجوديا وافتراضياً بالبث
                        المباشر على الانترنت . و تتوجه الهيئة الإدارية للجمعية للأستاذ الدكتور محمد
                        المقرمي إستشاري الطب النفسي بجزيل الشكر وفائق الامتنان على عطائه اللامحدود
                        وإثرائه للموضوع . ومع أذان المغرب توجه الحاضرون إلى مائدة الإفطار داعين الله
                        تعالى أن يتقبل منهم صومهم ويجعلهم من المقبولين وبعدها إلى صلاة المغرب ووجبة
                        العشاء والبرنامج المفتوح . يشار أن هذا الملتق العلمي الدوري الرمضاني كان برعاية
                        شركة الرحمة للتجارة والأدوية للمرة الثانية على التوالي ؛ بفرعيها شركة صن فارما و
                        الرحمة فارما ، وتنسيق الهيئة الإدارية بالجمعية .

                    </p>

                </div>
            </div>
        </div>
        <div class="ourteam">      
                
       <h1>Our Team</h1>
       <h2>الهيئة الإدارية</h2>
        <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5">د. إبراهيم أحمد الشرفي</h1>
            <h1 class="fs-6">رئيساَ</h1>
          </div>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5">د. رائد محفوظ بالليل</h1>
            <h1 class="fs-6">الأمين العام</h1>
          </div>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5"> د. عمرو أحمد الخرساني</h1>
            <h1 class="fs-6">المسؤول المالي</h1>
          </div>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5"> د. أمل أحمد الرياشي</h1>
            <h1 class="fs-6">المسؤول العلمي</h1>
          </div>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5">د. رضوى القباطي</h1>
            <h1 class="fs-6">مسؤولة الإعلام والعلاقات</h1>
          </div>
          
          

          <h2>لجنة الرقابة والتفتيش</h2>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5">د. عبداللّه عبد الوهاب الشرعبي</h1>
            <h1 class="fs-6">رئيساً</h1>
          </div>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5">د. فكري النائب</h1>
            <h1 class="fs-6">نائباً</h1>
          </div>
          <div class="member">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h1 class="fs-5">د. عابد علي شنان</h1>
            <h1 class="fs-6">مقرراً</h1>
          </div>
         
          

        </div>

        <footer>

            <div class="footer_container">
                <div class="row">
                    <div class="col-4 " id="links">

                        <div class="contact-div">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                fill="currentColor"
                                class="bi bi-geo-alt"
                                viewbox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <h2 class="location fs-5">Zubairi.St, Sana'a, Yemen</h2>
                        </div>
                        <div class="contact-div">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                fill="currentColor"
                                class="bi bi-telephone-fill"
                                viewbox="0 0 16 16">
                                <path
                                    fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>

                            <a class="phone text-decoration-none" href="tel:00967772379364">00967772379364</a>
                        </div>

                        <div class="contact-div">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                fill="currentColor"
                                class="bi bi-envelope"
                                viewbox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                            </svg>
                            <p class="email">
                                <a class="text-decoration-none" href="mailto:yemenipsychiatric@gmail.com">yemenipsychiatric@gmail.com</a>
                            </p>

                        </div>
                    </div>

                    <div class="col-4">
                        <h1 class="fs-4 text-start">OVERVIEW</h1>
                        <div class="footer_links">

                            <ul>

                                <li >
                                    <a class="list-group-item text-start" href="index.php">Home</a>
                                </li>
                                <li >
                                    <a class="list-group-item text-start" href="About.php">About</a>
                                </li>
                                <li >
                                    <a class="list-group-item text-start" href="News.php">News</a>
                                </li>
                                <li>
                                    <a class="list-group-item text-start" href="Contact-Us.php">Contact Us</a>
                                </li>

                            </ul>
                        </div>

                    </div>

                    
                    <div class="col-4">
                        <h1 class="fs-4 text-start">MY ACCOUNT</h1>
                        <ul>
                            <li>
                                <a class="list-group-item text-start">My Account</a>
                            </li>
                            <li>
                                <a href="Login-Signup.php" class="list-group-item text-start">Login/Register</a>
                            </li>
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