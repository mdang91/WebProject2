<?php 
    $file = file('DealorNoDeal.txt');

    foreach($file as $line_num => $line) {
        $str_arr2[] = $line;
    }

    shuffle($str_arr2);
?>