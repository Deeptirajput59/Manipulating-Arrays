<!--Name: Deepti Rajput
   UID: drajp2@uis.edu
   UIN: 660136229
   Chapter 6 Assighnment-->

<!DOCTYPE>
<html>
<head> <title> Box Array </title> </head>
<body>
<?php

$box = array(
		array("Small box",12,10,2.5),
		array("Large Box",30,20,4),
		array("Large Box",60,40,11.5)
		
		);
		
echo "<p><b><font color='red'><i>The Dimensions of ".$box[0][0]." is ".$box[0][1]." * ".$box[0][2]." * ".$box[0][3]." </i></font></b></p> ";
echo "<p><b><font color='blue'><i>The Dimensions of ".$box[1][0]." is ".$box[1][1]." * ".$box[1][2]." * ".$box[1][3]." </i></font></b></p> ";
echo "<p><b><font color='green'><i>The Dimensions of ".$box[2][0]." is ".$box[2][1]." * ".$box[2][2]." * ".$box[2][3]." </i></font></b></p> ";

$volume1 = $box[0][1]*$box[0][2]*$box[0][3];
$volume2 = $box[1][1]*$box[1][2]*$box[1][3];
$volume3 = $box[2][1]*$box[2][2]*$box[2][3];

echo "<hr/>";
echo "<p><i><b><font color='red'> The Volume of the ".$box[0][0]." is ".$volume1."</font></i></b></p>";
echo "<p><i><b><font color='blue'> The Volume of the ".$box[1][0]." is ".$volume2."</font></i></b></p>";
echo "<p> <i><b><font color='green'>The Volume of the ".$box[2][0]." is ".$volume3." </font></i></b></p>";

?>
</body>
</html>