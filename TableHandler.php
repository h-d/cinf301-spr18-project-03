<?php

class TableHandler
{
    public function __construct()
    {

    }

    private function change_pos($index, $index_change)
    {
        $tempval = $_SESSION['table'][$index];

        $_SESSION['table'][$index] = $_SESSION['table'][$index_change];

        $_SESSION['table'][$index_change] = $tempval;

    }

    public function swap($index)
    {
        $dimension = 3;
        $max_dimension = 9;

        $right_check = ($index % $dimension) + 1;


        //if statements to check if empty tile exists adjacent to (i,j)

        if ($right_check < $dimension) {
            if ($_SESSION['table'][$index + 1] == "") {
                $this->change_pos($index, $index + 1);
                $this->check_win();
                return;
            }
        }

        $left_check = ($index % $dimension) - 1;

        if ($left_check >= 0) {
            if ($_SESSION['table'][$index - 1] == "") {
                $this->change_pos($index, $index - 1);
                $this->check_win();
                return;
            }
        }

        $down_check = $index + $dimension;

        if ($down_check < $max_dimension) {
            if ($_SESSION['table'][$index + $dimension] == "") {
                $this->change_pos($index, $index + $dimension);
                $this->check_win();
                return;
            }
        }

        $up_check = $index - $dimension;

        if ($up_check >= 0) {
            if ($_SESSION['table'][$index - $dimension] == "") {
                $this->change_pos($index, $index - $dimension);
                $this->check_win();
                return;
            }
        }

        //updates status HTML element if space not found

        $_SESSION['status'] = "Unable to move square.";
    }



    public function randomize()
    {

    }

    public function check_win()
    {
        $
        $_SESSION['status'] = " ";
    }

}

?>



<!--<html>
  <head>
    <title>
    </?php echo isset($_COOKIE['X']) ? $_COOKIE['X'] : "EMPTY";?>
    </title>
  </head>
  <body>
    </?php echo isset($_COOKIE['Y']) ? $_COOKIE['Y'] : "EMPTY";?>
  </body>
</html>-->