<?php

	//if the form has been submitted
	if (isset($_POST['submitted'])){
		if ( !isset($_POST['username'], $_POST['password']) ) {
		// Could not get the data that should have been sent.
		 exit('Please fill both the username and password fields!');
	    }
		// connect DB
		require_once ("userinfo.php");
		try {
		//Query DB to find the matching username/password
		//using prepare/bindparameter to prevent SQL injection.
			$stat = $db->prepare('SELECT password FROM user WHERE username = ?');
			$stat->execute(array($_POST['username']));
		    
			// fetch the result row and check 
			if ($stat->rowCount()>0){  // matching username
				$row=$stat->fetch();

				if (password_verify($_POST['password'], $row['password'])){ //matching password
					
					//??recording the user session variable and go to loggedin page?? 
				  session_start();
					$_SESSION["username"]=$_POST['username'];
					header("Location:index.php");
					exit();
				
				} else {
				 echo "<p style='color:red'>Error logging in, password does not match </p>";
 			    }
		    } else {
			 //else display an error
			  echo "<p style='color:red'>Error logging in, Username not found </p>";
		    }
		}
		catch(PDOException $ex) {
			echo("Failed to connect to the database.<br>");
			echo($ex->getMessage());
			exit;
		}

  }
?>
<!-- a HTML part -->
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<head>
    <title>AProject - Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<header> 
	<h2>Login</h2>
</header>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Aproject</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            
          </ul>
          
        </div>
      </div>
    </nav>
	<header>
  <h2>Login</h2>
</heder>
<!-- a HTML form that allows the user to enter their username and password for log in.-->
<form action="index.php" method="post">

	<label>User Name</label>
	<input type="text" name="username" size="15" maxlength="25" />
    <label>Password:</label>
	<input type="password" name="password" size="15" maxlength="25" />
	
	<input type="submit" value="Login" />
	<input type="reset" value="clear"/>
    <input type="hidden" name="submitted" value="TRUE" />
	<p>
		Not registered yet? <a href="register.php">Register</a>
	</p>

</form>
</body>
</html>
