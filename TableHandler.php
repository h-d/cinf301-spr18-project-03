<?php

//Handles all tile puzzle functionality, taking in cookies set by script_table.js
//Hudson DeVoe

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

        //updates status session var if space not found

        $_SESSION['status'] = "Unable to move square.";
    }


    //Randomizes table values by shuffling the array
    public function randomize()
    {
        $temp_table = $_SESSION['table'];

        shuffle($temp_table);

        $_SESSION['table'] = $temp_table;
    }

    //Checks if table array matches win conditions
    public function check_win()
    {
        $table = array('1', '2', '3', '8', '', '4', '7', '6', '5');

        for($i = 0; $i < 9; $i++)
        {
            if ($_SESSION['table'][$i] != $table[$i])
            {
                $_SESSION['status'] = " ";
                return;
            }
        }

        //Sets status session variable to WIN! if the table matches the win conditions
        $_SESSION['status'] = "WIN!";

    }

}


