<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Page | Mr. Kimbob</title>
	<link rel="stylesheet" type="text/css" href="transactions.css"> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="transacstyle.css">
  <link rel="stylesheet" type="text/css" rel="stylesheet" href="search.css"/>
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
          <a href="#" class="active">
            <i class='bx bxs-low-vision'></i>
            <span class="links_name">View Transaction</span></a>
        </li>
        <li>
          <a href="manageacc.php">
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
		<br>
		<?php
include 'db_connection.php';
$sql = "SELECT SUM(qty) AS qty FROM tbl_sales";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<div><p>The total number of today's sales is: <b><i>".$row["qty"]." items</i></b> </p></div>";
	 }
}
?>  
	<?php
include 'db_connection.php';
$sql = "SELECT SUM(total) AS total FROM tbl_sales";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<div><p>The total amount of today's sales is: <b><i>".$row["total"].".00php</i></b></p></div>";
	 }
}
?> 
    <br>
	<div style ="overflow:hidden;
    overflow-y: scroll;
    height: 300px; width: auto; padding-bottom: auto; border-style: solid;border-width: 2.5px;border-color: black;">
    <table class="table" cellspacing="0"
  width="100%" bgcolor = "white">
        <thead class="thead-dark">
            <tr>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">ID</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Desc</th>
				<th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Price</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Qty</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Total</th>
                <th scope ="col" style="top: 0;z-index: 2;position: sticky;background-color: black; color:white;">Datetime</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              include 'db_connection.php';

              $sql = "SELECT * from tbl_sales";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['sales_id'] . "</td>";
                      echo "<td>" . $row['description'] . "</td>";
                      echo "<td>" . $row['price'] . "</td>";
                      echo "<td>" . $row['qty'] . "</td>";
                      echo "<td>" . $row['total'] . "</td>";
					  echo "<td>" . $row['dtcreated'] . "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='6'>No results found!</td></tr>";
              }
            ?>	
        </tbody>
    </table>
	</div>
	<br>
	<hr>
</body>
</html>
<script <script type="text/javascript">
function do_search()
{
 var search_box =$("#search_box").val();
 $.ajax
 ({
  type:'post',
  url:'get_results.php',
  data:{
   search:"search",
   search_box:search_box
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
  }
 });
 
 return false;
}
</script>
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
<script type="text/javascript">
function do_search()
{
 var search_box =$("#search_box").val();
 $.ajax
 ({
  type:'post',
  url:'get_results.php',
  data:{
   search:"search",
   search_box:search_box
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
  }
 });
 
 return false;
}
</script>