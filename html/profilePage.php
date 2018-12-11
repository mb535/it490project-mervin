<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="homepage.php">
                        Recipe Finder
                    </a>
                </li>
                <li>
                    <a href="homepage.php">Search</a>
                </li>
                <li>
                    <a href="dailyrecommendation.php">Daily Recommendation</a>
                </li>
                <li>
                    <a href="profilePage.php">Profile</a>
                </li>

                <li>
                    <a href="ByCountry.php">By Country</a>
                </li>

                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
	
        <div id="page-content-wrapper">
            <div class="container-fluid">
		<div style="width:800px; margin:0 auto;">
			
			<?php
				error_reporting(0); 
				@ini_set('display_errors', 0); 
				include('rabbitmqphp_example/testRabbitMQClient.php');
				session_start();
				if (!isset($_SESSION["user"]))
				{
				 header('Location: index.html');
				}
				//sleep(3);
				$user = $_SESSION["user"];
				echo "<div class='container'>";
				echo "<br><br><h1 class='my-4 text-center text-lg-left'>These are your Favorites:</h1>";

				include('showFavorites.php');

				echo "<br><br><h1 class='my-4 text-center text-lg-left'>These are your Likes:</h1>";

				include('showLikes.php');

				echo "<br><br><h1 class='my-4 text-center text-lg-left'>These are your Dislikes:</h1>";
				
				include('showDislikes.php');
				
				unset($_SESSION['userFavs']);
			?>
			<br>
			<br>
			<br>
			<br>
			<br>
			<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
			<?php echo "</div>"; ?>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?php include "footer.php"; ?>
		</div>
		
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
