<?php 
session_start();
if(empty($_SESSION['number'])){
  $_SESSION['number'] = rand(0, 100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>The Great Number Game!</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">-->

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <h1>Welcome to the Great Number Game!</h1>
      <p>I am thinking of a number between 1 and 100<br/>Take a guess!</p>
    </div>
    
    <?php 
    if(!empty($_POST['guess'])){ ?>
      <div class="game wrong <?php if(intval($_POST["guess"]) >= $_SESSION['number']){ echo "none"; }?>" id="too-low">Too Low!</div>
    <?php 
    } ?> 

    <?php 
    if(empty($_POST['guess']) || (intval($_POST["guess"]) != $_SESSION['number'])){ ?>
      <form method="post" action="index.php">
        <input type="text" name="guess">
        <input type="submit" value="Submit">
      </form> 
    <?php 
    } else { ?> 
      <div class="game right" id="right">
        <?=$_POST['guess']?> was the number!
        <form method="post" action="process.php">
          <input type="submit" value="Play Again">
        </form>
      </div>
    <?php 
    }?>

    <?php 
    if(!empty($_POST['guess'])){ ?>
      <div class="game wrong <?php if (intval($_POST["guess"]) <= $_SESSION['number']){ echo "none"; }?>" id="too-high">Too High!</div>
    <?php 
    } ?> 

  </div>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="scripts/script.js"></script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
