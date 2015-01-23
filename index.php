<?php 
session_start();
if(empty($_SESSION['number'])){
  $_SESSION['number'] = rand(0, 100);
}
$guess = null;
if(isset($_POST['guess'])){
  $guess = intval($_POST['guess']);
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
    
    <div class="game wrong" id="too-low">Too Low!</div>
    
    <form method="post" action="index.php" id="guessing-form">
      <input type="number" name="guess">
      <input type="submit" value="Submit">
    </form>

    <div class="game right" id="right">
      <?=$guess?> was the number!
      <form method="post" action="process.php">
        <input type="submit" value="Play Again">
      </form>
    </div>

    <div class="game wrong" id="too-high">Too High!</div>

  </div>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="scripts/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="scripts/script.js"></script>
  <script>
  (function($){
    var guessingForm = $('#guessing-form');
    var tooLow = $('#too-low');
    var tooHigh = $('#too-high');
    var right = $('#right');

    <?php if($guess){ ?>
      if(<?=$guess?> > <?=$_SESSION['number']?>){
        tooHigh.css('opacity', '1.0');
      }else if(<?=$guess?> < <?=$_SESSION['number']?>){
        tooLow.css('opacity', '1.0');
      }else {
        guessingForm.hide();
        right.css('display', 'inline-block');
      }
    <?php
    } ?>
  })(jQuery);
  </script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
