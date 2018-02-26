<html>
  <head>
    <title>
    <?php echo isset($_COOKIE['XY']) ? $_COOKIE['XY'] : "EMPTY";?>
    </title>
  </head>
  <body>
    <?php 
    ini_set('display_errors', 'On');
    echo isset($_COOKIE['XY']) ? $_COOKIE['XY'] : "EMPTY";
    ?>
  </body>
</html>