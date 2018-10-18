<?php
session_start();
echo $_SESSION["user"];
if(!isset($_SESSION["user"])){
  header("Location: index.html");
}

?>

<html>
	<title>Home Page</title>
	<h1>Home Page Under Construction</h1>
	<form action="api2.php" method='POST'>
      	<input type="text" name = "food" id = "searchBar" placeholder="Search.." maxlength= "15" autocomplete="off" value="search" /><br>
	Recipe <input type =radio name ="type" value="Recipe"><br>
	Cuisine <input type =radio name ="type" value="Country"><br>
     	Ingredients <input type =radio name ="type" value="Ingredients"><br>
	Category <input type =radio name ="type" value="Category"><br>

	<button type="submit">Submit </button>
	 
    	</form>
	<a href= 'logout.php'>Logout</a>
</html>
