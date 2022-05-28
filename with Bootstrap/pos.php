<!DOCTYPE html>
<html lang="en">
<body>
<head>
<?php 
   session_start(); 
   if(!isset($_SESSION['status'])){
	   header("Location: index.php");
	   exit();
   }
?>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="pos.css"> 
	  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" rel="stylesheet" href="search.css"/>
 <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<title> POS | Mr. Kimbob </title>
<script>
function receipt() {
  var x = document.getElementById("receipt");
  var y = document.getElementById("menu");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else { 
    x.style.display = "none";
    y.style.display = "block";
  }
}
</script>
<script>
function confirm() {
var content = document.getElementById("answer").value;
var b = ".00. Please pay at the counter and wait for 5-10 minutes to receive your order. Enjoy your meal!";
alert("Thank you for your purchase. Your final bill is Php "+ (content) + b);
}
</script>
<script>
function check() {
var content = document.getElementById("answer").value;
var b = ".00.";
alert("The current total for the selected item/s is Php "+ (content) + b);
}
</script>
<script> 
function add() 
{ 
var num1, num2, num3, num4, num5, num6, num7, num8, num9, num10, sum; 
num1 = parseInt(document.getElementById("total11").value); 
num2 = parseInt(document.getElementById("total1").value); 
num3 = parseInt(document.getElementById("total2").value);  
num4 = parseInt(document.getElementById("total3").value); 
num5 = parseInt(document.getElementById("total4").value);
num6 = parseInt(document.getElementById("total5").value);
num7 = parseInt(document.getElementById("total6").value);
num8 = parseInt(document.getElementById("total7").value);
num9 = parseInt(document.getElementById("total8").value);
num10 = parseInt(document.getElementById("total9").value);
sum = num1 + num2 + num3 + num4 + num5 + num6 + num7 + num8 + num9 + num10; 
document.getElementById("answer").value = sum;
}
</script>
<script> 
function multiply11() 
{ 
p1 = parseInt(document.getElementById("m1").value); 
p2 = parseInt(document.getElementById("m2").value); 
multiply = p1 * p2; 
document.getElementById("total11").value = multiply;
}
</script>
<script> 
function multiply1() 
{ 
p1 = parseInt(document.getElementById("m3").value); 
p2 = parseInt(document.getElementById("m4").value); 
multiply = p1 * p2; 
document.getElementById("total1").value = multiply;
}
</script>
<script> 
function multiply2() 
{ 
p1 = parseInt(document.getElementById("m5").value); 
p2 = parseInt(document.getElementById("m6").value); 
multiply = p1 * p2; 
document.getElementById("total2").value = multiply;
}
</script>
<script> 
function multiply3() 
{ 
p1 = parseInt(document.getElementById("m7").value); 
p2 = parseInt(document.getElementById("m8").value); 
multiply = p1 * p2; 
document.getElementById("total3").value = multiply;
}
</script>
<script> 
function multiply4() 
{ 
p1 = parseInt(document.getElementById("m9").value); 
p2 = parseInt(document.getElementById("m10").value); 
multiply = p1 * p2; 
document.getElementById("total4").value = multiply;
}
</script>
<script> 
function multiply5() 
{ 
p1 = parseInt(document.getElementById("m11").value); 
p2 = parseInt(document.getElementById("m12").value); 
multiply = p1 * p2; 
document.getElementById("total5").value = multiply;
}
</script>
<script> 
function multiply6() 
{ 
p1 = parseInt(document.getElementById("m13").value); 
p2 = parseInt(document.getElementById("m14").value); 
multiply = p1 * p2; 
document.getElementById("total6").value = multiply;
}
</script>
<script> 
function multiply7() 
{ 
p1 = parseInt(document.getElementById("m15").value); 
p2 = parseInt(document.getElementById("m16").value); 
multiply = p1 * p2; 
document.getElementById("total7").value = multiply;
}
</script>
<script> 
function multiply8() 
{ 
p1 = parseInt(document.getElementById("m17").value); 
p2 = parseInt(document.getElementById("m18").value); 
multiply = p1 * p2; 
document.getElementById("total8").value = multiply;
}
</script>
<script> 
function multiply9() 
{ 
p1 = parseInt(document.getElementById("m19").value); 
p2 = parseInt(document.getElementById("m20").value); 
multiply = p1 * p2; 
document.getElementById("total9").value = multiply;
}
</script>
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
    <img src="dpkimbob.jpg" alt="logo" style = "margin-top:50px;"/>
    </div>
    <br><br><br><br><br><br>
    <div>
     <br><h1>Welcome,</h1><br>
<?php
echo"<h1 style ='font-size:30px; color: white; '><b>".$_SESSION['username']."</b></h1>";     
?>	  
    </div>

    <br>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Point-of-Sales</span></a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out-circle' ></i>
            <span class="links_name">Log out</span></a>
        </li>
      </ul>
  </div>

<center class = "home-section">

<img src="kimbobb.png" alt=”Mr.Kimbob” width="590" height="120" align = "center"/><br>

<table align="center" width="20%" id="menu"> 
<tr>
<td><img src="bbq.png" alt="" height=110 width=180><br><b>&nbsp;&nbsp;<center>Bbq Samgyupsal <center> ₱ 165.00
<input type="hidden" value="165" name ="m1" id="m1" style="text-align: center"></td> 
<td><img src="fried rice.png" alt="" height=150 width=180><br><b>&nbsp;&nbsp;<center>Classic Kimchi <center> ₱ 119.00
<input type="hidden" value="119" name ="m3" id="m3" style="text-align: center"></td>
<td><img src="meat.png" alt="" height=120 width=167><br><b>&nbsp;&nbsp;<center>Meat Lover's <center> ₱ 119.00
<input type="hidden" value="119" name ="m5" id="m5" style="text-align: center"></td>
<td><img src="spicy.png" alt="" height=160 width=180><br><b>&nbsp;&nbsp;<center>Spicy Samgyupsal <center> ₱ 165.00
<input type="hidden" value="165" name ="m7" id="m7" style="text-align: center"></td>
<td><img src="donkatsu.png" alt="" height=120 width=167><br><b>&nbsp;&nbsp;<center>Donkatsu <center> ₱ 135.00
<input type="hidden" value="135" name ="m9" id="m9" style="text-align: center"></td>
</tr> 
<tr>
<td><input type="number" id="m2" type="hidden" value="0" style="text-align: center" onchange="multiply11()"></td>
<td><input type="number" id="m4" type="hidden" value="0" style="text-align: center" onchange="multiply1()"></td>
<td><input type="number" id="m6" type="hidden" value="0" style="text-align: center" onchange="multiply2()"></td>
<td><input type="number" id="m8" type="hidden" value="0" style="text-align: center" onchange="multiply3()"></td>
<td><input type="number" id="m10" type="hidden" value="0" style="text-align: center" onchange="multiply4()"></td>
</tr>
<td><img src="korean rice.png" alt="" height=145 width=170><br><b>&nbsp;&nbsp;<center>Spicy Korean Rice Cake <center> ₱ 129.00
<input type="hidden" value="129" name ="m11" id="m11" style="text-align: center"></td>
<td><img src="ramen.png" alt="" height=110 width=155><br><b>&nbsp;&nbsp;<center>Ramen Mild Spicy <center> ₱ 99.00
<input type="hidden" value="99" name ="m13" id="m13" style="text-align: center"></td>
<td><img src="japchae.png" alt="" height=140 width=167><br><b>&nbsp;&nbsp;<center>Japchae With Beef <center> ₱ 109.00
<input type="hidden" value="109" name ="m15" id="m15" style="text-align: center"></td>
<td><img src="dubbob.png" alt="" height=105 width=165><br><b>&nbsp;&nbsp;<center>Dubbob Beef <center> ₱ 50.00
<input type="hidden" value="50" name ="m17" id="m17" style="text-align: center"></td>
<td><img src="kimbob.png" alt="" height=120 width=167><br><b>&nbsp;&nbsp;<center>Kimbob Kimchi and Beef <center> ₱ 99.00
<input type="hidden" value="99" name ="m19" id="m19" style="text-align: center"></td>
</tr>
<tr>
<td><input type="number" id="m12" value="0" style="text-align: center" onchange="multiply5()"></td>
<td><input type="number" id="m14" value="0" style="text-align: center" onchange="multiply6()"></td>
<td><input type="number" id="m16" value="0" style="text-align: center" onchange="multiply7()"></td>
<td><input type="number" id="m18" value="0" style="text-align: center" onchange="multiply8()"></td>
<td><input type="number" id="m20" value="0" style="text-align: center" onchange="multiply9()"></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td></td>
<td><center><button onclick="add();check()">Confirm Total</button></td>
<td><center></td>
<td><center><button onclick="add();receipt()">Check Receipt</button></td>
<td></td>
</tr>
</table>
<form method = "POST" action = "pos.php">  
<table width=30% id="receipt" style="display: none;">
<tr style="background: #EEE">
<td><center><b>Item</td>
<td><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><center><b>Sub-total</td>
</tr>
<tr>
<td>Bbq Samgyupsal</td>
<td><center></td>
<td><center><input name ="mbbq" id="total11" value="0" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Classic Kimchi</td>
<td><center></td>
<td><input name ="kimchi" id="total1" style="text-align: center" value="0" readonly><center></td>
</tr>
<tr>
<td>Meat Lover's</td>
<td><center></td>
<td><center><input name ="meat" id="total2" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Spicy Samgyupsal</td>
<td><center></td>
<td><center><input type = "text" name ="spicy" id="total3" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Donkatsu</td>
<td><center></td>
<td><center><input name = "donkatsu" id="total4" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Spicy Korean Rice Cake</td>
<td><center></td>
<td><center><input name ="koreanrice" id="total5" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Ramen Mild Spicy</td>
<td><center></td>
<td><center><input name ="ramen" id="total6" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Japchae With Beef</td>
<td><center></td>
<td><center><input name ="japchae" id="total7" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Dubbob Beef</td>
<td><center></td>
<td><center><input name ="dubbob" id="total8" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>Kimbob Kimchi and Beef</td>
<td><center></td>
<td><center><input name ="kimbobkimchi" id="total9" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>
</td>
<td><center><b>Total</td>
<td><center><input id="answer" style="text-align: center" value="0" readonly></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td></td>
<td><center><button onClick="window.location.reload()">Go Back</button></td>
<td><center><input type ="submit" class="button" id = "submit" name="submit" onclick="confirm();window.location.reload()"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
include_once 'db_connection.php';
if(isset($_POST['submit']))
{
	$bbqtotal = $_POST['mbbq'];
	$friedricetotal = $_POST['kimchi'];
	$meattotal = $_POST['meat'];
	$spicytotal = $_POST['spicy'];
	$donkatsutotal = $_POST['donkatsu'];
	$koreanricetotal = $_POST['koreanrice'];
	$ramentotal = $_POST['ramen'];
	$japchaetotal = $_POST['japchae'];
	$dubbobtotal = $_POST['dubbob'];
	$kimbobtotal = $_POST['kimbobkimchi'];
	
	if($bbqtotal != "0"){
		$description = "BBQ Samgyupsal";
		$price = "165";
		$qty = $bbqtotal/165; 
		$total = $bbqtotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($friedricetotal != "0"){
		$description = "Classic Kimchi";
		$price = "119";
		$qty = $friedricetotal/119 ;
		$total = $friedricetotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($meattotal != "0"){
		$description = "Meat Lovers";
		$price = "119";
		$qty = $meattotal/119 ;
		$total = $meattotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($spicytotal != "0"){
		$description = "Spicy Samgyupsal";
		$price = "165";
		$qty = $spicytotal/165;
		$total = $spicytotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($donkatsutotal != "0"){
		$description = "Donkatsu";
		$price = "135";
		$qty = $donkatsutotal/135 ;
		$total = $donkatsutotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($koreanricetotal != "0"){
		$description = "Spicy Korean Rice Cake";
		$price = "129";
		$qty = $koreanricetotal/129 ;
		$total = $koreanricetotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($ramentotal != "0"){
		$description = "Ramen Mild Spicy";
		$price = "99";
		$qty = $ramentotal/99 ;
		$total = $ramentotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($japchaetotal != "0"){
		$description = "Japchae with Beef";
		$price = "109";
		$qty = $japchaetotal/109 ;
		$total = $japchaetotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($dubbobtotal != "0"){
		$description = "Dubbob Beef";
		$price = "129";
		$qty = $dubbobtotal/129 ;
		$total = $dubbobtotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else if($kimbobtotal != "0"){
		$description = "Kimbob Kimchi and Beef";
		$price = "129";
		$qty = $kimbobtotal/129 ;
		$total = $kimbobtotal;
		$sql = "INSERT INTO tbl_sales (description, price, qty, total) VALUES ('$description', '$price', '$qty', '$total')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	}
	else
	{
		echo '<script>alert("Please select on the menu. Thank you!")</script>';
	}
}
?>
