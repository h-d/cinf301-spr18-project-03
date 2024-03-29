<?php


//Acts as main page- where data is displayed from backend PHP
//Hudson DeVoe

require_once 'TableHandler.php';

session_start();

$table_handler = new TableHandler();



    //Check is cookies are set- if they are, PHP functions are run with the given variables

    if(isset($_COOKIE['Randomize']))
    {
            $table_handler->randomize();
            setcookie('Randomize', null, -1);
    }

    if(isset($_COOKIE['Index']))
    {
        $index = $_COOKIE['Index'];
        $table_handler->swap($index);
    }


    //If the table session variable is not set, create it with given vals
    if (!(isset($_SESSION['table'])))
    {
        $table = array('1', '2', '3', '8', '', '4', '7', '6', '5');
        $_SESSION['table'] = $table;
    }




?>



<!-- HTML-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Tile Puzzle</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
<div class="wrap">
    <h1>Tile Puzzle</h1>
    <table id="tableID">
        <tr>
            <td><?php echo $_SESSION['table'][0]?></td>
            <td><?php echo $_SESSION['table'][1]?></td>
            <td><?php echo $_SESSION['table'][2]?></td>
        </tr>
        <tr>
            <td><?php echo $_SESSION['table'][3]?></td>
            <td><?php echo $_SESSION['table'][4]?></td>
            <td><?php echo $_SESSION['table'][5]?></td>
        </tr>
        <tr>
            <td><?php echo $_SESSION['table'][6]?></td>
            <td><?php echo $_SESSION['table'][7]?></td>
            <td><?php echo $_SESSION['table'][8]?></td>
        </tr>
    </table>
    <button>Randomize</button>
    <p class="status"> <?php if (isset($_SESSION['status'])) echo $_SESSION['status']?></p>
</div>

<script src="scripts/script_table.js"></script>

</body>
</html>
