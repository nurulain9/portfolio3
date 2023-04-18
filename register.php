<?php
//if the form has been submitted
if (isset($_POST['submitted'])){
 #prepare the form input

  // connect to the database
  require_once('userinfo.php');
	
  $username=isset($_POST['username'])?$_POST['username']:false;
  $password=isset($_POST['password'])?password_hash($_POST['password'],PASSWORD_DEFAULT):false;
  
  if (!($username)){
	echo "Username wrong!";
    exit;
	}
  if (!($password)){
	exit("password wrong!");
	}
 try{
	
	#register user by inserting the user info 
	$stat=$db->prepare("insert into user values(default,?,?)");
	$stat->execute(array($username, $password));
	
	$id=$db->lastInsertId();
	echo "Congratulations! You are now registered. Your ID is: $id  ";  	
	
 }
 catch (PDOexception $ex){
	echo "Sorry, a database error occurred! <br>";
	echo "Error details: <em>". $ex->getMessage()."</em>";
 }

 
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<head>
   <title>AProject - Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
  <h2>Register</h2>
</heder>
  <form method = "post" action="register.php">
	Username: <input type="text" name="username" /><br>
	Password: <input type="password" name="password" /><br><br>

	<input type="submit" value="Register" /> 
	<input type="reset" value="clear"/>
	<input type="hidden" name="submitted" value="true"/>
  </form>  
  <p> Already a user? <a href="index.php">Log in</a>  </p>

</body>
</html>
