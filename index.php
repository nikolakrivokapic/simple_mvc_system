<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/css/Site.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
 <?php
 require_once('vendor/autoload.php');
 session_start();
 $pages = array('login','register','logout'); // define available pages

 if( isset($_GET['action']) ) {  // check for action and route to controller, this function like custom router
     if($_GET['action']=="login") {
     $controller = new LoginController();
     $controller->index();
     }  else if($_GET['action']=="register"){
     $controller = new RegisterController();
     $controller->index();
     }  else if($_GET['action']=="search"){
     $controller = new SearchController();
     $controller->index();
     }
 }
 ?>

    <!-- Fixed navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Test Project Nikola</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <?php if (isset($_SESSION['logged']) && $_SESSION['logged']==true) { // if logged in ?>
       <li><a>Logged in as <?= $_SESSION['user'] ?></a></li>
      <li class="active"><a href="index.php?page=logout">Logout</a></li>
      <?php } else { // if not logged in ?>
      <li><a href="index.php?page=register">Register</a></li>
      <li><a href="index.php?page=login">Login</a></li>
      <?php } ?>
       <li>
       <form method="post" class="navbar-form" role="search" action="index.php?action=search">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="search" type="text">
      <div class="input-group-btn">
        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
  </li>
    </ul>
  </div>
</nav>

    <div class="container">  <!-- /main container -->

    <?php if(isset($_GET['page']) && in_array($_GET['page'], $pages)) { $page = filter_var( $_GET['page'], FILTER_SANITIZE_STRING ); include_once('/views/' . $page . ".php" ); // if GET variable is given as an URL argument, show coresponding page ?>
        <?php } elseif(isset($_SESSION['results'])) { include_once("/views/searchResults.php");  // in the case of search ?>
        <?php } else { // show homepage ?>
                    <div class="jumbotron">
                     <h1>Test Project</h1>
                      <?php if (isset($_SESSION['logged']) && $_SESSION['logged']==true) : // if logged in, show welcome message ?>
                      <p>Welcome, <?= $_SESSION['user'] ?></p>
                     <?php else : ?>
                     <p>Home Page.</p>
                     <?php endif; ?>
                     </div>
            <?php } ?>

    </div> <!-- /container -->
    <footer class="navbar navbar-fixed-bottom">
      <div class="container">
        <p>Test project by <a href="mailto:nikolakrivokapic84@gmail.com" rel="author">Nikola Krivokapic</a></p>
      </div>
    </footer>
</body>
</html>


