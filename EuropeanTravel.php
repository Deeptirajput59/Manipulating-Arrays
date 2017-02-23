<!--Name: Deepti Rajput
   UID: drajp2@uis.edu
   UIN: 660136229
   Chapter 6 Assighnment-->
   
   
<!DOCTYPE>
<html>
<head> <title>European Travel </title>
</head>
<body>
<?php
$Distances = array(
		 "Berlin" => array(
						 "Berlin" => 0,
						 "Moscow" => 1607.99,
						 "Paris" => 876.96,
						 "Prague" => 280.34,
						 "Rome" => 1181.67
						),
		 "Moscow" => array(
						 "Berlin" => 1607.99,
						 "Moscow" => 0,
						 "Paris" => 2484.92,
						 "Prague" => 1664.04,
						 "Rome" => 2374.26
						),
		 "Paris" => array(
						 "Berlin" => 876.96,
						 "Moscow" => 641.31,
						 "Paris" => 0,
						 "Prague" => 885.38,
						 "Rome" => 1105.76
						 ),
		 "Prague" => array(
						 "Berlin" => 280.34,
						 "Moscow" => 1664.04,
						 "Paris" => 885.38,
						 "Prague" => 0,
						 "Rome" => 922
						 ),
		 "Rome" => array(
						 "Berlin" => 1181.67,
						 "Moscow" => 2374.26,
						 "Paris" => 1105.76,
						 "Prague" => 922,
						 "Rome" => 0
						 )
	);
	
	
	
$KMtoMiles = 0.62;

if (isset($_POST['submit'])) {
		$StartIndex = stripslashes($_POST['Start']);
		$EndIndex = stripslashes($_POST['End']);
		if (isset($Distances[$StartIndex][$EndIndex]))
			echo "<p><i><b><font color='red'>The distance from $StartIndex to $EndIndex is " .$Distances[$StartIndex][$EndIndex] . " kilometers, or " . round(($KMtoMiles *$Distances[$StartIndex][$EndIndex]),2) . " miles.</font></i></b></p>\n";
		else
			echo "<p><i><b><font color='red'>The distance from $StartIndex to $EndIndex is not in the array.</font></i></b> </p>\n";
	}


?>

<form action="EuropeanTravel.php" method="post">
	<p><i><b><font color='blue'>Starting City:</font></i></b><select name="Start"> 
	<?php
	 foreach ($Distances as
	 $City => $OtherCities) {
	 echo "<option value='$City'";
	 if (strcmp($StartIndex,$City)==0)
	 echo " selected";
	 echo ">$City</option>\n";
	 }
	?>
	
	</select></p>
	<p><i><b><font color='blue'>Ending City:</font></i></b><select name="End">
	
	<?php
	 foreach ($Distances as
	 $City => $OtherCities) {
	 echo "<option value='$City'";
	 if (strcmp($EndIndex,$City)==0)
	 echo " selected";
	 echo ">$City</option>\n";
	 }
	?>
	

	</select></p>
	<p><i><b><font color='blue'><input type="submit" name="submit" value="Calculate Distance" /></font></i></b></p>
</form>

</body>

</html>