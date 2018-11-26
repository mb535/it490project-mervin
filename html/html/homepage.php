<?php

//require('/home/mervin/git/rabbitmqphp_example/errorLogging.php');

session_start();
echo $_SESSION["user"];
if(!isset($_SESSION["user"])){
  //header("Location: index.html");
}

?>

<html>
	<style>
	.countrybutton{
		width:100px; 
		height:75px;
		object-fit: cover;
 
		background-color: Transparent;
		background-repeat:   no-repeat;
    		background-size:     cover;
    		border: none;
    		cursor: pointer;
   		
    		outline: none;
		}


	</style>
  	<head>
	
   	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>Recipe Finder - </title>

    	<!-- Bootstrap core CSS -->
    	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    	<!-- Custom styles for this template -->
    	<link href="css/thumbnail-gallery.css" rel="stylesheet">

	</head>	

<div class="container">
	<title>Home Page</title>
	<h1>Home Page </h1>
	<h2>Welcome, <?php echo $_SESSION["user"];?></h2>
	<form action="api2.php" method='POST'>
      	<input type="text" name = "food" id = "searchBar" placeholder="Search.." maxlength= "15" autocomplete="on" value="" /><br>
	Recipe <input type =radio name ="type" value="Recipe"><br>
	Cuisine <input type =radio name ="type" value="Country"><br>
     	Ingredients <input type =radio name ="type" value="Ingredients"><br>
	Category <input type =radio name ="type" value="Category"><br>

	<button type="submit">Submit </button>
	 
    	</form>
	<a href= 'logout.php'>Logout</a>
</div>
<div class="container">
<form action="api2.php" method=POST>
      <h1 class="my-4 text-center text-lg-left">Browse By Country</h1>
      <div class="row text-center text-lg-left">

        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#british" class="d-block mb-0 h-0">
	    <button class="countrybutton" type="submit" name="cuisine" value="british"><img src="images/british.png" class="img-fluid img-thumbnail" alt="" > </button>
            

	   
	    
	  </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#american" class="d-block mb-0 h-0">
	    <button class="countrybutton" type="submit" name="cuisine" value="american"><img src="images/american.png" class="img-fluid img-thumbnail" alt="" ></button>
	    
	    
	  </a>

        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#french" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="french"><img src="images/french.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#italian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="italian"><img src="images/italian.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#chinese" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="chinese"><img src="images/chinese.jpg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#jamaican" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="jamaican"><img src="images/jamaican.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#indian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="indian"><img src="images/indian.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#japanese" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="japanese"><img src="images/japanese.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#spanish" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="spanish"><img src="images/spanish.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#canadian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="canadian"><img src="images/canadian.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#dutch" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="dutch"><img src="images/dutch.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#egyptian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="egyptian"><img src="images/egyptian.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
	<div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#greek" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="greek"><img src="images/greek.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#irish" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="irish"><img src="images/irish.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#malaysian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="malaysian"><img src="images/malaysian.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#mexican" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="mexican"><img src="images/mexican.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#moroccan" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="moroccan"><img src="images/moroccan.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
	<div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#croatian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="croatian"><img src="images/croatian.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#norwegian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="norwegian"><img src="images/norwegian.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#portuguese" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="portuguese"><img src="images/portuguese.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#russian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="russian"><img src="images/russian.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#argentinian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="argentinian"><img src="images/argentinian.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
	<div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#slovakian" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="slovakian"><img src="images/slovakian.png" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#thai" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="thai"><img src="images/thai.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#arabic" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="arabic"><img src="images/arabic.svg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>
        <div class="col-lg-0 col-md-0 col-xs-0">
          <a href="#vietnamese" class="d-block mb-0 h-0">
            <button class="countrybutton" type="submit" name="cuisine" value="vietnamese"><img src="images/vietnamese.jpeg" class="img-fluid img-thumbnail" alt="" ></button>
          </a>
        </div>



</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
