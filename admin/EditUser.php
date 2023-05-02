<?php @session_start() ?>
<?php
if(@empty($_SESSION))
{
   header('location:../Login-Signup.php');
}
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
        <title>Edit User</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand"><img class="logo" src="../images/logo.png" height="80px" width="80px" alt="logo"></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link fs-5" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="../About.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="../News.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="../Contact-Us.php">Contact Us</a>
                    </li>
                    <?php
        if(@empty($_SESSION))
        {
          ?>
          <li class="nav-item"><a class="nav-link fs-5" id="login" href="../Login-Signup.php">Login</a></li>
<?php
        }
        else{

        }
         ?>
                <?php
           if(@empty($_SESSION))
          {
            
            
    
          }
          else{
            ?>
                    <li class="dropdown-center nav-item">
            <a class=" dropdown-toggle nav-link fs-5" data-bs-toggle="dropdown" aria-expanded="false">
              Manage
            </a>
            <ul class="dropdown-menu">
                <a class="nav-link fs-5" href="ManageNews.php">News</a>
                <a class="nav-link fs-5" href="ManageUsers.php">Users</a>
            </ul>
        </li>
                    <?php
          }
        ?>

                </ul>
                <h1 class="username fs-6 text-end "><?php
        if(@empty($_SESSION['firstname']))
        {
          
        }
        else{
          @$FN= $_SESSION['firstname']; $LN=$_SESSION['lastname']; echo $FN." ".$LN;         
         
        }
         
         ?></h1>
<?php
         if(@empty($_SESSION))
         {

         }
         else{
          ?>
          <a class="logout" onclick="myFunction()">Log out</a>
          <script>
function myFunction() {
  var logout = confirm("Are you sure you want to LOG OUT ?");

if(logout){
     location.href = "../Logout.php";
}
}
</script>
          <?php
         }
         
?>
    </div>
            </div>
        </nav>

        <div id="form3">
        <?php
include '../DB.php';
$table = 'users';
@$query="select * from $table order by id asc";
@$result=mysqli_query($connect,$query);
@$id=$_GET['id'];
$n=1;
if(@isset($_POST['reset']))
{

    @$query = "UPDATE $table SET status=1 WHERE id=$id";
    @$result_update = mysqli_query($connect, $query);
}




if(@isset($_POST['update'])) {
    @$firstname = $_POST['firstname'];
    @$lastname = $_POST['lastname'];
    @$jobplace = $_POST['jobplace'];
    @$experience = $_POST['experience'];
    @$degree = $_POST['degree'];
    @$email = $_POST['email'];
    @$type = $_POST['type'];
    @$query = "UPDATE $table SET FIRSTNAME='$firstname', LASTNAME='$lastname',JOBPLACE='$jobplace',EXPERIENCE='$experience',DEGREE='$degree',EMAIL='$email',TYPE='$type' WHERE id=$id";
    @$result_update = mysqli_query($connect, $query);
    if(@$result)
    {
        @$_SESSION['firstname']=$firstname;
        @$_SESSION['lastname']=$lastname;
        @$_SESSION['type']=$type;
        echo "<script>
        alert('User has been Updated Succesfully')
        window.location.href='ManageUsers.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Error')
        window.location.href='ManageUsers.php';
        </script>";
    }
   
} else {
    @$query = "SELECT * FROM $table WHERE ID=$id";
    @$result = mysqli_query($connect, $query);
}
@$row = mysqli_fetch_assoc($result);

@isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';
?>
            <section>
                <div class="has-form">
                    <h2>Data of Users: Edit</h2>
                    <form method="post" id="edit-form" action="EditUser.php?id=<?php echo $id; ?>">
                        <div class="row mb-3 editUser">
                            <label>First Name</label>
                            <div class="dol-sm-10 editUser">
                                <input
                                    type="text"
                                    name="firstname"
                                    class="form-control"
                                    value="<?php echo @$row['FIRSTNAME']; ?>"
                                    required="required">
                            </div>
                        </div>

                        <div class="row mb-3 editUser">
                            <label>Last Name</label>
                            <div class="dol-sm-10 editUser">
                                <input
                                    type="text"
                                    name="lastname"
                                    class="form-control"
                                    value="<?php echo @$row['LASTNAME']; ?>"
                                    required="required">

                            </div>
                        </div>
                        <div class="row mb-3 editUser">
                            <label>Job Place</label>
                            <div class="dol-sm-10 editUser">
                                <input
                                    type="text"
                                    name="jobplace"
                                    class="form-control"
                                    value="<?php echo @$row['JOBPLACE']; ?>">

                            </div>
                        </div>

                        <div class="row mb-3 editUser">
                            <label>Experience</label>
                            <div class="dol-sm-10 editUser">
                                <input
                                    type="text"
                                    name="experience"
                                    class="form-control"
                                    value="<?php echo @$row['EXPERIENCE'] ?>"></input>

                            </div>
                        </div>

                        <div class="row mb-3 editUser">
                            <label>Degree</label>
                            <div class="dol-sm-10 editUser">
                                <input
                                    type="text"
                                    name="degree"
                                    class="form-control"
                                    value="<?php echo @$row['DEGREE'] ?>"></input>

                            </div>
                        </div>

                        <div class="row mb-3 editUser">
                            <label>Email</label>
                            <div class="dol-sm-10 editUser">
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    value="<?php echo @$row['EMAIL'] ?>"></input>
                            </div>
                        </div>

                        <div class="row mb-3 editUser">
                            <label class="col-sm-2 col-form-label" for="textAreaExample">Type</label>

                            <div class="col-sm-10 editUser" id="radiobtn">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    <?php include '../DB.php'; $table = 'users'; @$id=$_GET['id']; @$query="select TYPE from $table where ID=$id"; @$result=mysqli_query($connect,$query); @$row=mysqli_fetch_array($result); @$type=$row['TYPE']; echo (@$type== '1') ? "checked" : "" ; ?>
                                    name="type"
                                    id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label" for="inlineRadio1">Admin</label>
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="type"
                                    <?php include '../DB.php'; $table = 'users'; @$id=$_GET['id']; @$query="select TYPE from $table where ID=$id"; @$result=mysqli_query($connect,$query); @$row=mysqli_fetch_array($result); @$type=$row['TYPE']; echo (@$type== '2') ? "checked" : "" ; ?>
                                    id="inlineRadio2"
                                    value="2">
                                <label class="form-check-label" for="inlineRadio2">User</label>
                            </div>
                          </div>
                        <input
                            type="submit"
                            name="update"
                            value="Update"
                            id="update-button"
                            class="btn btn-primary">
                        <input type="submit" name="reset" class="btn btn-primary" value="Reset Password" >
                    </form>
                </div>
            </section>

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

                            <a class="phone text-decoration-none" href="tel:772379364">772379364</a>
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

                    <?php
      if(@!empty($_SESSION))
      {
        ?>
        <div class="col-4">
        <h1 class="fs-4 text-start">MY ACCOUNT</h1>
        <ul>
          <li><a class="list-group-item text-start">My Account</a></li>
          <li><a href="../Login-Signup.php" class="list-group-item text-start">Login/Register</a></li>
        </ul>
      </div>
      <?php
      }
      else{

      }
      ?>

                </div>

            </div>

            <div class="copyright">

                <em>YagoTech &copy;<?php echo date("Y") ?> All Rights Reserved</em>
            </div>

        </footer>
    </body>
</html>