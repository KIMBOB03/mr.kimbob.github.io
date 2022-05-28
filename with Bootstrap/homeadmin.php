<!DOCTYPE html>  
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page | Mr. Kimbob</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href = "homeadmin.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" rel="stylesheet" href="search.css"/>
 <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
          <a href="#" class="active">
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Dashboard</span></a>
        </li>
        <li>
          <a href="transactions.php">
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

 <section class="home-section">
    <nav>
      <div class="sidebar-button col-sm-3">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
    </div>

      <div id= "search_box">
        <form method="post"action="get_results.php" onsubmit="return do_search();">
        <input type="text" id="search_box" name="search_box"placeholder="Search..." onkeyup="do_seach();">
        <input type="submit" name="search" value="search">
        </form>
      </div>
      <div id="result_div"></div>

      <div class="profile-details">
        <img src="dpkimbob.jpg" alt="Kimbob">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
			<?php
include 'db_connection.php';
$sql = "SELECT SUM(qty) AS qty FROM tbl_sales";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class = 'number'><b><i>".$row["qty"]."</i></b> orders</div>";
	 }
}
?>  
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
			
			<?php
include 'db_connection.php';
$sql = "SELECT SUM(total) AS total FROM tbl_sales";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='number'><b><i>₱".$row["total"].".00</i></b></div>";
	 }
}
?> 
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart two' ></i>
        </div>
        <div class="top-sales-box">
          <div class="title">Top Selling Product</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <!--<img src="images/Bbq Samgyupsal.jpg" alt="">-->
               <img src="Bbq Samgyupsal.jpg" alt="Kimbob">
              <span class="product">Bbq Samgyupsal</span>
            </a>
            <span class="price">₱165</span>
          </li>
          <li>
            <a href="#">
               <!--<img src="images/Ramen Mild Spicy.jpg" alt="">-->
               <img src="Ramen Mild Spicy.jpg" alt="Kimbob">
              <span class="product">Ramen Mild Spicy</span>
            </a>
            <span class="price">₱99</span>
          </li>
          <li>
            <a href="#">
             <!-- <img src="images/Kimchi and Beef.jpg" alt="">-->
             <img src="Kimchi and Beef.jpg" alt="Kimbob">
              <span class="product"> Kimchi and Beef</span>
            </a>
            <span class="price">₱99</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/Meat Lover's.jpg" alt="">-->
              <img src="Meat Lover_s.jpg" alt="Kimbob">
              <span class="product">Meat Lover's</span>
            </a>
            <span class="price">₱199</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/Spicy Samgyupsal.jpg" alt="">-->
              <img src="Spicy Samgyupsal.jpg" alt="Kimbob">
              <span class="product">Spicy Samgyupsal</span>
            </a>
            <span class="price">₱165</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/Donkatsu.jpg" alt="">-->
              <img src="donkatsu_with_salad.jpg" alt="Kimbob">
              <span class="product">Donkatsu</span>
            </a>
            <span class="price">₱135</span>
          <li>
            <a href="#">
              <!--<img src="images/Spicy Korean Rice Cake.jpg" alt="">-->
              <img src="spicy-rice-cakes.jpg" alt="Kimbob">
              <span class="product">Spicy Rice Cake</span>
            </a>
            <span class="price">₱129</span>
          </li>
          <li>
            <a href="#">
             <!--<img src="images/Jachae With Beef.jpg" alt="">-->
             <img src="Jachae With Beef.jpg" alt="Kimbob">
              <span class="product">Jachae With Beef</span>
            </a>
            <span class="price">₱109</span>
          </li>
          </ul>
        </div>
      </div>
    </div>
  </section>		
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