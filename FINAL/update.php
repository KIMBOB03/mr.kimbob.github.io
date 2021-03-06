<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account | Mr. Kimbob</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="manageacc.css">
  <link rel="stylesheet" type="text/css" href="homeadminstyle.css">
</head>
<body>
<?php 
   session_start(); 
   if(!isset($_SESSION['status'])){
	   header("Location: index.php");
	   exit();
   }
?>

<div class="sidebar">
    <div class="logo-details">
    <img src="dpkimbob.jpg" alt="logo"style = "margin-top:50px;"/>
    </div>
    <br><br><br><br><br>
    <div>
    <br><br><h1>Welcome,</h1></br>
<?php
echo"<h1 style ='font-size:30px; color: white; '><b>".$_SESSION['username']."</b></h1>";     
?>	  
    </div>
    <br>
      <ul class="nav-links">
        <li>
          <a href="homeadmin.php">
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Dashboard</span></a>
        </li>
        <li>
          <a href="transactions.php">
            <i class='bx bxs-low-vision'></i>
            <span class="links_name">View Transaction</span></a>
        </li>
        <li>
          <a href="#" class="active">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Manage Accounts</span></a>
        </li>
        <li>
          <a href="#">
            <i class='bx bxs-edit' ></i>
            <span class="links_name">Edit Menu</span></a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out-circle' ></i>
            <span class="links_name">Log out</span></a>
        </li>
      </ul>
  </div>
		<div class="home-section">
			<?php
include 'db_connection.php';
$sql = "SELECT * FROM tbl_acc";
if ($result=mysqli_query($conn,$sql)) {
    $rowcount=mysqli_num_rows($result);
    echo "&nbsp<div><p style = 'text-align: center;'>The number of registered user accounts is:<b>  ".$rowcount."</b><i> accounts</i></p></div>"; 
}
?> 

    <br>
	<div style ="overflow:hidden;
    overflow-y: scroll;
    height: 300px; width: auto; padding-bottom: auto; border-style: solid;border-width: 2.5px;border-color: black;">
	<table class="table" cellspacing="0"
  width="100%" bgcolor = "white" >
        <thead class="thead-dark">
            <tr>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Full Name</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Username</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Age</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Gender</th>
				<th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Status</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Date Created</th>
				<th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Actions</th>
            </tr>
        </thead>
        <tbody>
		
            <?php 
              include 'db_connection.php';
			   $id = $_GET['id'];
			    if (!isset($id)) {
        header('location: update.php');
    }
	 $sql = "SELECT * FROM songs WHERE id = '$id'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['fullname'] . "</td>";
                      echo "<td>" . $row['username'] . "</td>";
                      echo "<td>" . $row['age'] . "</td>";
                      echo "<td>" . $row['gender'] . "</td>";
					  echo "<td>" . $row['status'] . "</td>";
                      echo "<td>" . $row['created_at'] . "</td>";
					  echo "<td><form method='POST'>
					   <input type=hidden name=id value=".$row["id"]."><input type=submit value='delete' name='delete' onclick='window.location.reload()'>
					  </form></td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='7'>No results found!</td></tr>";
              }
            ?>	
        </tbody>
    </table>
	</div>
	<br>
	<hr>
	<div class = "create " id="creatediv">
<h2 style = "text-align:center;">UPDATE AN ACCOUNT</h2>
    <legend><b><i>Account Information</i></b></legend>
	<br>
<form method = "POST" action = "update.php">  

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Full Name:</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="fullname" placeholder="Enter employee's full name..." required tabIndex="1" autofocus >
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Username:</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username" placeholder="Enter a username..."required tabIndex="2">
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Password:</span>
  </div>
  <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="password" placeholder="Enter a password..." required tabIndex="3">
</div>

<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Age:</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="age" placeholder="Enter the age..." required tabIndex="4">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-sm">Gender:</label>
  </div>
  <select name="gender" class="custom-select" id="inputGroupSelect01">
    <option value="male" selected>male</option>
    <option value="female">female</option>
  </select>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-sm">Status:</label>
  </div>
  <select name="status" class="custom-select" id="inputGroupSelect01">
	<option value="employee" selected>employee</option>
    <option value="admin">admin</option>
  </select>
</div>
<br>
<p align="center"><input type="submit" class="button btn btn-success" id = "submit" value ="Sign Up" name = "submit" onclick="window.location.reload()" required tabIndex="7" ata-toggle="tooltip" data-placement="top" title="Click to sign up and save the information"></p>  
</div><br>
</form>
</div>
</fieldset>
<script type="text/javascript">
$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
       $next = $('[tabIndex=1]');        }
        $next.focus() .click();
    }
});
</script>
	  
	  <script type ="text/javascript">
    const targetDiv1 = document.getElementById("creatediv");
    const btn1 = document.getElementById("createbtn");
    btn1.onclick = function () {
      if (targetDiv1.style.display !== "none") {
        targetDiv1.style.display = "none";
      } else {
        targetDiv1.style.display = "block";
      }
    };
  </script>
</body>
</html>
<?php
include_once 'db_connection.php';
if(isset($_POST['submit']))
{
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	
	if($fullname == ""||$username == ""||$password == ""||$age == ""||$gender == ""||$status == "")
	{
		echo '<script>alert("Please fill out all fields")</script>';
	}
	else
	{
	$sql = "INSERT INTO tbl_acc (fullname, username, password, age, gender, status) VALUES ('$fullname', '$username', '$password', '$age', '$gender', '$status')";
	mysqli_query($conn, $sql);
	}
}
mysqli_close($conn);
?>
<?php
include('db_connection.php');
if(isset($_POST['delete']))
{
$id = $_POST['id'];
$sql = "DELETE FROM tbl_acc WHERE id='$id'";
mysqli_query($conn, $sql);

}
mysqli_close($conn);
?>
<script <script type="text/javascript">
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
</script>
