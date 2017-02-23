<!--Name: Deepti Rajput
   UID: drajp2@uis.edu
   UIN: 660136229
   Chapter 6 Assighnment-->
   
<!DOCTYPE>
<head>
<title>Song Organizer</title>
</head>
<body>
<h1><i><font color='blue'>Song Organizer</font></i></h1>

<?php
if (isset($_GET ['action']))
{
      if ((file_exists("SongOrganizer.txt")) && (filesize("SongOrganizer.txt") > 0))
            {
                  $SongArray = file("SongOrganizer.txt");
                  switch ($_GET['action'])
                  {
                        case 'Remove Duplicates';
                              $SongArray = array_unique(
                                    $SongArray);
                              $SongArray = array_values(
                                    $SongArray);
                              break;
                        case 'Sort Ascending';
                              sort($SongArray);
                              break;
                        case 'Shuffle';
                              shuffle($SongArray);
                              break;
                  }
                  if (count($SongArray)>0)
                  {
                        $NewSongs = implode($SongArray);
                        $SongStore = fopen("SongOrganizer.txt","w+");
                        if ($SongStore === false)
                              echo "There was an error updating the song file. {$_GET['action']}\n";
                        else
                        {
                              fwrite($SongStore, $NewSongs);
                              fclose($SongStore);
                        }
                  }
                 
                       
            }
}
//echo $_POST['submit'];
if (isset($_POST['submit']))
{
      $SongToAdd = stripslashes($_POST['SongName']) . "\n";
			echo "New Song : ".$SongToAdd."<br>";
      $ExistingSongs = array();
      if (file_exists("SongOrganizer.txt") && filesize("SongOrganizer.txt") > 0)
            {
                  $ExistingSongs = file("SongOrganizer.txt");
            }
if (in_array($SongToAdd, $ExistingSongs))
{
      echo "<p>The song you entered already exists!<br />\n";
      echo "Your song was not added to the lists.</p>";
}
else
{
      $SongFile = fopen(
            "SongOrganizer.txt", "a+");
      if ($SongFile === false)
            echo "There was an error saving your message!\n";
      else
      {
            fwrite($SongFile, $SongToAdd);
            fclose($SongFile);
            echo "Your song has been added to the list.\n";
      }
}
}
if ((!file_exists("SongOrganizer.txt"))|| (filesize("SongOrganizer.txt")== 0)){
      echo "<p>There are no songs in the list.</p>\n";
}
// display songs
else {
      $SongArray = file("SongOrganizer.txt");
      echo "<table border=\"1\" width=\"100%\"
            style=\"background-color:pink\">\n";
      foreach ($SongArray as $Song)
      {
            echo "<tr>\n";
            echo "<td>" . htmlentities($Song) .
                  "</td>";
            echo "</tr>\n";
      }
      echo "</table>\n";
	  
}


  

?>

<p>
<a href="SongOrganizer.php?action=Sort%20Ascending">Sort Song List</a><br />
<a href="SongOrganizer.php?action=Remove%20Duplicates">Remove Duplicate Song</a><br />
<a href="SongOrganizer.php?action=Shuffle">Randomize Song List</a><br />
</p>
<form action="SongOrganizer.php" method="post">
<p>Add a New Song</p>
<p>Song Name: <input type="text" name="SongName" /></p>
<p><input type="submit" name="submit" value="Add Song to List" />&nbsp;&nbsp;
<input type="reset" name"reset" value="Reset Song Name" /></p>
</form>
			
</body>
</html>