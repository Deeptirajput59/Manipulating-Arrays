<!--Name: Deepti Rajput
   UID: drajp2@uis.edu
   UIN: 660136229
   Chapter 6 Assighnment-->
   
<!DOCTYPE>
<html>
<head>
<title>Guest Book</title>
</head>
<body>
<h1><i><font color='blue'>Guest Book</font></i></h1>
<?php
if ((file_exists("GuestBook.txt")) &&
          (filesize("GuestBook.txt") != 0)) {
     $GuestBookArray = file("GuestBook.txt");
}
else {
     $GuestBookArray = array();
}
if (isset($_POST['submit'])) {
     if (strlen($_POST['name'])==0) {
          echo "You need to enter your name\n";
     }
     else {
          if (!in_array($_POST['name'],$GuestBookArray)) {
               $GuestBookArray[] = $_POST['name'] . "\n"; 
               $GuestBookChanged = TRUE;
          }
     }
}
else if (isset($_GET['action'])) {
     switch ($_GET['action']) {
          case 'Delete Duplicates':
               $GuestBookArray = array_unique(
                    $GuestBookArray);
               $GuestBookArray = array_values(
                    $GuestBookArray);
               $GuestBookChanged = TRUE;
               break;
          case 'Sort':
               sort($GuestBookArray);
               $GuestBookChanged = TRUE;
               break;
     } 
}
if ($GuestBookChanged) {
     if (count($GuestBookArray)>0) {
          $NewMessages = implode($GuestBookArray);
          $MessageStore = fopen("GuestBook.txt","wb");
          if ($MessageStore === false)
               echo "There was an error updating the message file\n";
          else {
               fwrite($MessageStore,$NewMessages);
               fclose($MessageStore);
          }
     }
     else
          unlink("GuestBook.txt");
}

if ((!file_exists("GuestBook.txt")) || (filesize("GuestBook.txt") == 0))
     echo "<p>There are no entries in the guest book.</p>\n";
else {
     $GuestBookArray = file("GuestBook.txt");
     echo "<table style=\"background-color:pink\" border=\"1\" width=\"100%\">\n";
     $count = count($GuestBookArray);
     foreach ($GuestBookArray as $Signer) {
          echo "<tr>\n";
          echo "<td>" . htmlentities($Signer) . "</td>\n";
          echo "</tr>\n";
     }
     echo "</table>\n";
}
?>
<p>
<a href=
     "Guest.php?action=Sort">
     Sort Names</a><br />
<a href=
     "Guest.php?action=Delete%20Duplicates">
     Delete Duplicate Entries</a><br />
<form action="Guest.php" method="POST">
<strong><i><font color='red'>Sign the Guest Book:</font></i></strong><br />
<p>Your Name: <input type="text" name="name" /></p>
<p>
   <input type="reset" name="reset" value="Clear Form" />
   <input type="submit" name="submit" value="Sign the Guest Book" />
</p>
</form>
</p>
</body>
</html>