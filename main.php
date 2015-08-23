<?php

$user = 'root';
$pass = 'root';

$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $fruitname = $_POST['fruitname'];
  $fruitcolor = $_POST['fruitcolor'];
  $stmt = $dbh->prepare('INSERT into brillo (email, username, password) VALUES (:email, :username, :password);');
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->execute();
}

?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Brillo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="jumbotron.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brillo</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="form.php">Sign Up</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sections <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Shirts</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Pants</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Brillo!</h1>
        <p>Welcome to the largest platform for finding the best clothes at the best prices!</p>
        <p><a class="btn btn-primary btn-lg" href="form.php" role="button">Sign Up! &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Shirts</h2>
          <img src="images/shirts_model.jpg" alt="Shirt" class="img-thumbnail">
          <p>Find the biggest collection of shirts right here. From $10 to $35 we hold a large variety of shirts
          that are sure to fit your need. Having a day out? We got that! Shop here now. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Shorts</h2>
          <img src="images/shorts_model.jpg" alt="Shorts" class="img-thumbnail">
          <p>Shorts are a perfect way to spend any blazing day. You will find cute shorts on Brillo from a variety
          of different brands. Start searching for your favorite pair today! </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Shoes</h2>
          <img src="images/shoes_model.jpg" alt="Shoes" class="img-thumbnail">
          <p>Find fabulous shoes at the lowest price. Never go anywhere else to find the best shoes to flaunt
          on a Saturday night. These pairs will make you go from oh to woah in seconds. From heels to casual
        loafers, find it all.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Brillo By B & Y 2015</p>
      </footer>
    </div> <!-- /container -->

    <?php

    $stmt = $dbh->prepare('SELECT id, email, username FROM brillo;');
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
      echo '<table><tr><td>' . $row['id'] . '&nbsp;&nbsp;</td><td>' . $row['email'] . '&nbsp;&nbsp;</td><td>' .
          $row['username'] . '&nbsp;&nbsp;</td><td><a href="deleteuser.php?id=' .
          $row['id'] . '">Delete</a></td></table>';
    }

    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
