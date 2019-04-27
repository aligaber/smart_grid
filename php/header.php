<!DOCTYPE html>

<?php
    if (array_key_exists('id', $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists('id', $_SESSION)) {
        
       echo "
		       <html lang='en'>

				  <head>
				    <!-- Required meta tags -->
				    <meta charset='utf-8'>
				    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

				    <!-- Bootstrap CSS -->
				    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
				    <link rel='stylesheet' href='../css/style.css'>
				    <title>SmartGrid</title>
				  </head>

				  <body>

					<div class='container'>

						<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>

							  <a class='navbar-brand' href='https://en.wikipedia.org/wiki/Smart_grid'>SmartGrid</a>

							  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>

								<span class='navbar-toggler-icon'></span>

							  </button>

							<div class='collapse navbar-collapse' id='navbarSupportedContent'>
								<ul class='navbar-nav mr-auto'>
								  <li id='hom' class='nav-item '>
									<a class='nav-link' href='home.php'>Home</a>
								  </li>
								  <li id='con' class='nav-item'>
									<a class='nav-link' href='Consumption.php'>Consumption</a>
								  </li>
								   <li id='com' class='nav-item'>
									<a class='nav-link' href='Complains.php'>Complains</a>
								  </li>
								   <li id='sug' class='nav-item'>
									<a class='nav-link' href='Suggestions.php'>Suggestions</a>
								  </li>
								   <li id='api' class='nav-item'>
									<a class='nav-link' href='../API/CMySQL.php'>API</a>
								  </li>
								</ul>
								
								<div class='dropdown' id='logout'>
								  <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>
								  </button>
								
								  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
									<a class='dropdown-item' href='../index.php?logout=1'>log out</a>
								  </div>
								</div>
							</div>
						</nav>
					</div>";
		        
    } else {
        
        header('Location: ../index.php');
        
    }
?>
