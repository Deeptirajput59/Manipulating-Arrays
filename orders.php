<!--Name: Deepti Rajput
   UID: drajp2@uis.edu
   UIN: 660136229
   Chapter 6 Assighnment-->

<?php 
error_reporting(E_ALL);
ini_set('display_errors','off');

?>

<!DOCTYPE>
<html>
<head>
<title> Order Products online</title>

</head>
<body>

<?php
if (isset($_POST['submit'])) {
	
	
	if (empty($_POST['Jacket']) || empty($_POST['Watch']) || empty($_POST['Jewelry']) || empty($_POST['Boots']) || empty($_POST['Bag']) ) {
		echo "<P> Please Enter all the Feilds <p/>";}
		
		else {
			$Jacket = stripslashes($_POST['Jacket']);
			$Watch = stripslashes($_POST['Watch']);
			$Jewelry = stripslashes($_POST['Jewelry']);
			$Boots = stripslashes($_POST['Boots']);
			$Bag = stripslashes($_POST['Bag']);
			
			$total=(10*$Jacket+20*$Watch+30*$Jewelry+300*$Boots+250*$Bag);
			echo"<P><h4>Your Total Amount for all the orders is <font color='red'>$total</font> </h4></p>";
			
			
			$MessageFile = fopen('OnlineOrders/order'.date('m-d-Y_hia').'.txt',"ab");
			$MessageRecord = "No of Jacket = $Jacket \n No of Watch = $Watch\nNo.of Jewelry = $Jewelry \nNo.of Boots = $Boots \nNo.of Bag = $Bag\nTOTAL amount is = $total\n";
				if ($MessageFile === FALSE){
					echo "error in submitting\n";
				}
				else {
					fwrite($MessageFile, $MessageRecord);
					fclose($MessageFile);
					echo "<font color='green'>\n\nYour order has been placed successfully ! Happy shoping !!\n</font>";
				
				
				}



			
		}
}

if (isset($_POST['total'])) {
	
	
	if (empty($_POST['Jacket']) || empty($_POST['Watch']) || empty($_POST['Jewelry']) || empty($_POST['Boots']) || empty($_POST['Bag']) ) {
		echo "<P><font color='blue'> Please Enter all the Feilds </font><p/>";}
		
		else {
			$Jacket = stripslashes($_POST['Jacket']);
			$Watch = stripslashes($_POST['Watch']);
			$Jewelry= stripslashes($_POST['Jewelry']);
			$Boots = stripslashes($_POST['Boots']);
			$Bag= stripslashes($_POST['Bag']);
			
			$total=(10*$Jacket+20*$Watch+30*$Jewelry+300*$Boots+250*$Bag);
			echo"<P><h4>Your Total Amount for all the orders is \$$total </h4></p>";
			
			
			



			
		}
}



?>

<h1> <font color='purple'><i>Women Shopping Zone </i></font></h1> <hr/><hr/><br/>
<form  method="post">
<h3><font color='red'>1. Jacket</font></h3>

<p>PRICE: <b> 250 $ </b></p>
Enter the Quantity : <input type="text" name="Jacket">
<p> <font color='orange'>Take over in this military anorak jacket featuring a drawstring waist and front pockets. It is a must have for a fashion forward outfit! Pair it with our favorite basic t-shirt and legging pants for casual trendy look. </font></p>
<hr/>


<h3><font color='red'>2. Watch</font> </h3>

<p>PRICE: <b> 120 $ </b></p>
Enter the Quantity : <input type="text" name="Watch">
<p> <font color='orange'>This beautiful Michael Kors MK5865 womens analog quartz watch features a rose dial, glitz bezel, and a rose gold stainless steel case and band.

With a striking, oversized logo, this Michael Kors Parker timepiece shines in rose gold-tone stainless steel. The classic round case shape is made perfectly feminine with a glitz topring and matching dial.
</font></p>
<hr/>


<h3><font color='red'>3. Jewelry</font></h3>

<p>PRICE: <b> 300 $ </b></p>
Enter the Quantity : <input type="text" name="Jewelry">
<p><font color='orange'>Qianse is one of the larger Swarovski Authorized jewelry manufacturers and all products carry SGS Product Quality Testing and Certification;</font></p><hr/>


<h3><font color='red'>4. Boots</font></h3>

<p>PRICE: <b> 100 $ </b></p>
Enter the Quantity : <input type="text" name="Boots">
<p> <font color='orange'>
Spice up your cold weather look in these fashionable riding knee high boots. Featured round toe front, dual buckles decor on shaft, slightly slouchy shaft, and low heel. Finished with cushioned insole and smooth interior lining. Full side zipper closure for easy on/off.</font></p>
<hr/>


<h3><font color='red'>5. Bag </font> </h3>

<p>PRICE: <b> 250 $ </b></p>
Enter the Quantity : <input type="text" name="Bag">
<p><font color='orange'>Dual shoulder straps. Exterior features cute printed design and brand detail at front. Flat base. Unlined interior flaunts back wall zip pocket. Imported.</font> </p><hr/>


<hr/>
<hr/>
<br/>

<input type="submit" name="submit" value="submit">
<input type="submit" name="total" value="TOTAL">
</form>

</body>


</html>