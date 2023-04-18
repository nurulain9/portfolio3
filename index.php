<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Aproject</title>
   
  </head>
  <body class="p-3 m-0 border-0 bd-example">
    
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
    <h3 class="m-auto w-50" > Project Info </h3>
     <div class="w-50 m-auto">
         <form action = "projectinfo.php" method = "post">
           <div class = "form-group">
               <label>Project Title</label>
               <input type="text"  name = "title" autocmplete="off" class = "form-control">
            </div>
            <div class = "form-group">
               <label>Start Date</label>
               <input type="text"  name = "startdate" autocmplete="off" class = "form-control">
            </div>
            <div class = "form-group">
               <label>End Date</label>
               <input type="text"  name = "enddate" autocmplete="off" class = "form-control">
            </div>
            <div class = "form-group">
               <label>Phase</label>
               <textarea class = "form-control" name="phase"> </textarea>
            </div>
            <div class = "form-group">
               <label>Short Description</label>
               <textarea class = "form-control" name ="shortdescription"> </textarea>
            </div>
             <!-- <div class = "form-group">
               <label>User Id</label>
               <input type="text"  name = "userid" autocmplete="off" class = "form-control">
            </div>  -->
           
            
            <button class="btn btn-success" type="submit">Submit</button>
         </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
