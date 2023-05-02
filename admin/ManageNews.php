<?php session_start(); 
if(!isset($_SESSION['email'])){
  header("location:../Login-Signup.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
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
            <link rel="icon" type="image/x-icon" href="../images/logo.ico">

        <title>Login</title>
	</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand"><img class="logo" src="../images/logo.png" height="80px" width="80px" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      
    <ul class="navbar-nav mx-auto">
    
        <li class="nav-item"><a class="nav-link fs-5" href="../index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="../About.php">About</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="../News.php">News</a></li>
        <li class="nav-item"><a class="nav-link fs-5" href="../Contact-Us.php">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link fs-5" id="login" href="../Login-Signup.php">Login</a></li>

        <?php
        if(!empty($_SESSION['firstname'])){
            if($_SESSION['type']==1){
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
           

       <?php
        }
         ?>
       
    </ul>

    <div class="account">
    <h1 class="username fs-6 text-end "><?php
        if(empty($_SESSION['firstname']))
        {
          
        }
        else{
          $FN= $_SESSION['firstname']; $LN=$_SESSION['lastname']; echo $FN." ".$LN;         
         
        }
         
         ?></h1>
<?php
         if(empty($_SESSION))
         {

         }
         else{
          ?>
          <a class="logout" onclick="myFunction()">Log out</a>
          <script>
function myFunction() {
  var logout = confirm("Are you sure you want to LOG OUT ?");

if(logout){
     location.href = "Logout.php";
}
}
</script>
          <?php
         }
         
?>
    </div>
  </div>
</nav>
	


<?php
include_once('../DB.php');
$table = 'users';
    
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
        $total_records_per_page = 20;
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";


    $result_count = mysqli_query(
    $connect,
    "SELECT COUNT(*) As total_records FROM `users`"
    );
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1



    $result = mysqli_query(
        $connect,
        "SELECT * FROM `users` LIMIT $offset, $total_records_per_page"
        );
        ?>










<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination justify-content-center">
<?php if($page_no > 1){
echo "<li><a class='page-link' href='?page_no=1'>First Page</a></li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a class="page-link" <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>
    

<?php
if ($total_no_of_pages <= 10){  	 
	for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
	if ($counter == $page_no) {
	echo "<li class='active'><a class='page-link'>$counter</a></li>";	
	        }else{
        echo "<li><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
        }
}
elseif ($total_no_of_pages > 10){
    if($page_no <= 4) {			
        for ($counter = 1; $counter < 8; $counter++){		 
           if ($counter == $page_no) {
              echo "<li class='active'><a>$counter</a></li>";	
               }else{
                  echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                       }
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
       }
    }
    elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for (
             $counter = $page_no - $adjacents;
             $counter <= $page_no + $adjacents;
             $counter++
             ) {		
             if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
            }else{
                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }                  
               }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }
        else {
            echo "<li><a href='?page_no=1'>1</a></li>";
            echo "<li><a href='?page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";
            for (
                 $counter = $total_no_of_pages - 6;
                 $counter <= $total_no_of_pages;
                 $counter++
                 ) {
                 if ($counter == $page_no) {
                echo "<li class='active'><a>$counter</a></li>";	
                }else{
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                 }
            }   

?>

<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a class="page-link" <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>


<?php if($page_no < $total_no_of_pages){
echo "<li><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>



<div class="table-responsive-sm">
<button type="button" class="btn btn-primary addnews" data-bs-toggle="modal" data-bs-target="#form_modal" data-bs-whatever="@mdo">Add News</button>

<table class='ManageNews' id='mytable'>
<thead>
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Title</th>
        <th>Date</th>
        <th>Paragraph</th>
        <th>Link</th>
        <th>Action</th>

    </tr>
</thead>
<tbody>
<?php
        $i=1;
					require '../DB.php';
					$query = mysqli_query($connect, "SELECT * FROM `news`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
<tr>
				
				
          <td><?php echo $i++ ?></td>
					<td><img src="<?php echo $fetch['IMAGE']?>" height="80" width="100"/></td>
					<td><?php echo $fetch['TITLE']?></td>
					<td><?php echo $fetch['DATE']?></td>
          <td class="pp"><?php echo substr($fetch['PARAGRAPH'],0,1000) ?></td>	
          <td class="ll"><?php echo $fetch['LINK']?></td>	
          <td><button type="button" class="btn btn-warning actionnews" data-bs-toggle="modal" data-bs-target="#edit<?php echo $fetch['ID']?>" data-bs-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span>Update</button>
          <button type="button" class="btn btn-danger actionnews" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fetch['ID']?>" data-bs-whatever="@mdo"><span class="glyphicon glyphicon-edit"></span>Delete</button></td>

          <div class="modal fade" id="delete<?php echo $fetch['ID']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="updatenews" enctype="multipart/form-data" action="delete.php">
				<div class="modal-header">
					<h3 class="modal-title">Delete News</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8 updatenews">
						<div class="form-group">
							<h3>Current Photo</h3>
							<img src="<?php echo $fetch['IMAGE']?>" id="updatelogo" height="120" width="150" />
							<input type="hidden" name="previous" value="<?php echo $fetch['IMAGE']?>"/>
							<label>New Photo</label>
							<input type="file" class="form-control managenewsupdate" name="photodelete" value="<?php echo $fetch['IMAGE']?>" />
						</div>
						<div class="form-group">
							<label>title</label>
							<input type="hidden" value="<?php echo $fetch['ID']?>" name="user_id"/>
							<input type="text" class="form-control managenewsupdate" value="<?php echo $fetch['TITLE']?>" name="title" required="required"/>
						</div>
						<div class="form-group">
							<label>date</label>
							<input type="date" class="form-control managenewsupdate" value="<?php echo $fetch['DATE']?>" name="date" required="required"/>
						</div>
            <div class="form-group">
							<label>paragraph</label>
							<textarea class="form-control managenewsupdate" name="paragraph" required="required" rows="10" col="30" ><?php echo $fetch['PARAGRAPH']?> </textarea>
						</div>
            <div class="form-group">
							<label>Link</label>
              <input type="url" value="<?php echo $fetch['LINK']?>" name="link" class="form-control managenewsadd">
            </div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-save"></span> Delete</button>
      </div>
			</form>
		</div>
	</div>
</div>	


<div class="modal fade" id="edit<?php echo $fetch['ID']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="updatenews" enctype="multipart/form-data" action="edit.php">
				<div class="modal-header">
					<h3 class="modal-title">Edit News</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8 updatenews">
						<div class="form-group">
							<h3>Current Photo</h3>
							<img src="<?php echo $fetch['IMAGE']?>" id="updatelogo" height="120" width="150" />
							<input type="hidden" name="previous" value="<?php echo $fetch['IMAGE']?>"/>
							<label>New Photo</label>
							<input type="file" class="form-control managenewsupdate" name="photoupdate" value="<?php echo $fetch['IMAGE']?>"/>
						</div>
						<div class="form-group">
							<label>title</label>
							<input type="hidden" value="<?php echo $fetch['ID']?>" name="user_id"/>
							<input type="text" class="form-control managenewsupdate" value="<?php echo $fetch['TITLE']?>" name="title" required="required"/>
						</div>
						<div class="form-group">
							<label>date</label>
							<input type="date" class="form-control managenewsupdate" value="<?php echo $fetch['DATE']?>" name="date" required="required"/>
            
						</div>
            <div class="form-group">
							<label>paragraph</label>
							<textarea class="form-control managenewsupdate" name="paragraph" rows="10" col="30" required="required" ><?php echo $fetch['PARAGRAPH']?> </textarea>
						</div>
            <div class="form-group">
							<label>Link</label>
              <input type="url" name="link" VALUE="<?php echo $fetch['LINK']?>" class="form-control managenewsadd">
            </div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
      </div>
			</form>
		</div>
	</div>
</div>	


          </tr>
          <?php
					}
				?>
			</tbody> 
        </table>
        <div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" id="addnews" action="save.php" enctype="multipart/form-data">
				<div class="modal-header">
					<h3 class="modal-title">Add News</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-8 addnews">
						<div class="form-group">
							<label>Photo</label>
							<input type="file"  class="form-control managenewsadd" name="photo" required="required"/>
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control managenewsadd" name="title" required="required"/>
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date" class="form-control managenewsadd" name="date" required="required"/>
						</div>
            <div class="form-group">
							<label>Paragraph</label>
              <textarea class="form-control managenewsupdate" rows="10" col="30"  name="paragraph" required="required"></textarea>						
            </div>
            <div class="form-group">
							<label>Link</label>
              <input type="url" name="link" class="form-control managenewsadd">
            </div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success" name="save"><span class="glyphicon glyphicon-save"></span> Add</button>
      </div>
			</form>
		</div>
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
            
             <li ><a class="list-group-item text-start" href="../index.php">Home</a> </li>
             <li ><a class="list-group-item text-start" href="../About.php">About</a> </li>
             <li ><a class="list-group-item text-start" href="../News.php">News</a> </li>
                <li><a class="list-group-item text-start" href="../Contact-Us.php">Contact Us</a> </li>
                
             </ul>
        </div>
        
      </div>
      
        <div class="col-4">
        <h1 class="fs-4 text-start">MY ACCOUNT</h1>
        <ul>
          <li><a class="list-group-item text-start" href="">My Account</a></li>
          <li><a href="../Login-Signup.php" class="list-group-item text-start">Login/Register</a></li>
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