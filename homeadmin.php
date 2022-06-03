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
if(!isset($_SESSION['status']))
{
	header("Location: index.php");
	exit();
}
?>
<div class="sidebar">
	<div class="logo-details">
		<img src="dpkimbob.jpg" alt="logo"style = "margin-top:50px;"/>
    </div><br><br><br><br><br>
    <div><br><br>
		<h1>Welcome,</h1><br>
	<?php
	echo"<h1 style ='font-size:30px; color: white; '><b>".$_SESSION['username']."</b></h1>";     
	?>	  
    </div><br>
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
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out-circle' ></i>
            <span class="links_name">Log out</span></a>
        </li>
    </ul>
</div>
<section class="home-section">
<nav style ="padding-left: 950px; background-color: black;">
      <div class="profile-details" style="background-color: white;">
        <!--<img src="dpkimbob.jpg" alt="">-->
        <img src="dpkimbob.jpg" alt="Kimbob">
        <span class="admin_name">Mr. Kimbob's Food Ordering System</span>
      </div>
    </nav>

<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <div class="home-content">
        <div class="overview-boxes">
			<div class="box">
				<div class="right-side">
					<div class="box-topic">Total Items Sold:</div>
					<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<div class = 'number'><b><i>".number_format($row["qty"])." Items</i></b></div>"; 
						}
					}
					?>  
						<div class="indicator">
							<i class='bx bx-up-arrow-alt'></i>
							<?php
							$dt2 = date('M d, Y');
							$dt1 = date('M d, Y', strtotime('-30 days'));
							echo "<span class='text'>From ".$dt1." to ".$dt2."</span>"; 
					
					?>  
						</div>
				</div>
						<i class="iconify" data-icon="ep:food" data-width="30"></i>
			</div>
			<div class="box">
				<div class="right-side">
					<div class="box-topic">Total Profit:</div>
					<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(total) AS total FROM tbl_sales WHERE dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<div class = 'number'><b><i>₱".number_format($row["total"]).".00</i></b></div>"; 
						}
					}
					?>  
					<div class="indicator">
						<i class='bx bx-up-arrow-alt'></i>
							<?php
							$dt2 = date('M d, Y');
							$dt1 = date('M d, Y', strtotime('-30 days'));
							echo "<span class='text'>From ".$dt1." to ".$dt2."</span>"; 
					
					?>  
					</div>
				</div>
				<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
				<i class="iconify" data-icon="emojione-monotone:money-bag" data-width="30" ></i>
			</div>
			
			<div class="box">
				<div class="right-side">
					<div class="box-topic">Total Sales:</div>
					<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT CAST(qty AS INT) FROM tbl_sales WHERE dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
                    $result = mysqli_query($conn, $sql);
					if ($result)
					{
						// it return number of rows in the table.
						$row = mysqli_num_rows($result);
						if ($row)
						{
							echo "<div class = 'number'><b><i>".number_format($row)." sales</i></b></div>";
						}
						// close the result.
						mysqli_free_result($result);
					}
					// Connection close 
					mysqli_close($conn);
					?>  
					<div class="indicator">
						<i class='bx bx-up-arrow-alt'></i>
							<?php
							$dt2 = date('M d, Y');
							$dt1 = date('M d, Y', strtotime('-30 days'));
							echo "<span class='text'>From ".$dt1." to ".$dt2."</span>"; 
					
					?>  
					</div>
				</div>
				<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
				<i class="iconify" data-icon="ep:sold-out" data-width="30"></i>
			</div>
			
			<div class="box">
				<div class="right-side">
					<div class="box-topic">Top Selling:</div>
					<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT * FROM tbl_sales WHERE qty <= '10000' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."' ORDER BY qty DESC LIMIT 1";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<div class = 'number'><b><i>".$row["description"]."</i></b></div>"; 
						}
					}
					?>  
					<div class="indicator">
						<i class='bx bx-up-arrow-alt'></i>
							<?php
							$dt2 = date('M d, Y');
							$dt1 = date('M d, Y', strtotime('-30 days'));
							echo "<span class='text'>From ".$dt1." to ".$dt2."</span>"; 
					
					?>  
					</div>
				</div>
				<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
				<i class="iconify" data-icon="noto-v1:top-arrow" data-width="30"></i>
			</div>
			
			<div class="top-sales-box">
							<?php
							$dt2 = date('M d, Y');
							$dt1 = date('M d, Y', strtotime('-30 days'));
							echo"<div class='title'><i><center><br><h3 style = 'background: black; padding: 0px 360px 0px 360px; color: white;'>Number of Purchases from <b>".$dt1."</b> to <b>".$dt2."</b></h3></center></i></div>";
					?> 
				<ul class="top-sales-details">
				<li>
							<!--<img src="images/Bbq Samgyupsal.jpg" alt="">-->
							<span class="price" style = "color: black; padding-left: 120px;"><b>DESCRIPTION</b></span>
							<span class="price" style = "color: black;"><b>PRICE</b></span>
							<span class="price" style = "color: black;"><b>QTY</b></span>
					</li>	
					<hr style ="  border-top: 1px solid black;">
					<li>
						<a href="#">
							<!--<img src="images/Bbq Samgyupsal.jpg" alt="">-->
							<img src="Bbq Samgyupsal.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Bbq Samgyupsal</b></span>
						</a>
						<span class='price' style = 'color: black; padding-left: 30px;'>₱165</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'BBQ Samgyupsal' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>  
					</li>	
					<li>
						<a href="#">
							<!--<img src="images/Bbq Samgyupsal.jpg" alt="">-->
							<img src="fried rice.png" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Classic Kimchi</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 40px;">₱119</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Classic Kimchi' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!--<img src="images/Meat Lover's.jpg" alt="">-->
							<img src="Meat Lover_s.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Meat Lover's</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 65px;">₱199</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Meat Lovers' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">								
							<!--<img src="images/Spicy Samgyupsal.jpg" alt="">-->
							<img src="Spicy Samgyupsal.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Spicy Samgyupsal</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 15px;">₱165</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Spicy Samgyupsal' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!--<img src="images/Donkatsu.jpg" alt="">-->
							<img src="donkatsu_with_salad.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Donkatsu</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 100px;">₱135</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Donkatsu' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!--<img src="images/Spicy Korean Rice Cake.jpg" alt="">-->
							<img src="spicy-rice-cakes.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Spicy Rice Cake</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 40px;">₱129</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Spicy Korean Rice Cake' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!--<img src="images/Ramen Mild Spicy.jpg" alt="">-->
							<img src="Ramen Mild Spicy.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Ramen Mild Spicy</b></span>
						</a>
							<span class="price" style = "color: black;padding-left: 30px;">₱99</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Ramen Mild Spicy' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!--<img src="images/Jachae With Beef.jpg" alt="">-->
							<img src="Jachae With Beef.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Jachae With Beef</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 30px;">₱109</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Japchae With Beef' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!--<img src="images/Jachae With Beef.jpg" alt="">-->
							<img src="dubbob.png" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Dubbob Beef</b></span>
						</a>
							<span class="price" style = "color: black;padding-left: 90px;">₱50</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Dubbob Beef' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
					<li>
						<a href="#">
							<!-- <img src="images/Kimchi and Beef.jpg" alt="">-->
							<img src="Kimchi and Beef.jpg" alt="Kimbob">
							<span class="product" style = "background: red; padding: 0px 5px 0px 5px;"><b>Kimchi and Beef</b></span>
						</a>
							<span class="price" style = "color: black; padding-left: 30px;">₱99</span>
							<?php
					include 'db_connection.php';
					$dt2 = date('m/d/Y');
					$dt1 = date('m/d/Y', strtotime('-30 days'));
					$sql = "SELECT SUM(qty) AS qty FROM tbl_sales WHERE description = 'Kimbob Kimchi and Beef' AND dt_sold BETWEEN '".$dt1."' and '".$dt2."'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							echo "<span class='price' style = 'color: black; padding-left: 30px;'><b>".$row["qty"]."</b></span>"; 
						}
					}
					?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>		
</body>	
</html>
<script type="text/javascript">
function do_search()
{
	var search_box =$("#search_box").val();
	$.ajax(
	{
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
<script type="text/javascript">
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() 
{
	sidebar.classList.toggle("active");
	if(sidebar.classList.contains("active"))
	{
		sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
	}
	else
	{
		sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
	}
</script>
<script type="text/javascript">
function do_search()
{
	var search_box =$("#search_box").val();
	$.ajax(
	{
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