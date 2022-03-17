<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML one.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Deal or No Deal</title>
  <link rel="stylesheet" href="/~bkrokoff1/Project2/test.css" type="text/css">
</head>
<body>
<?php 

    include 'common.php';
    print_r($str_arr2);
    echo $_POST['23'];

?>
<h2>Select Six</h2>
<p> 
    <?php
        if(strcmp($_POST['20'], "on") != 0) {
            echo "<input name='20' type='checkbox'> 21";
        } else {
           $str_arr3[] = $str_arr2[20]; 
        }

        if(strcmp($_POST['21'], "on") != 0) {
            echo "<input name='21' type='checkbox'> 22";
        } else {
            $str_arr3[] = $str_arr2[21]; 
        }

        if(strcmp($_POST['22'], "on") != 0) {
            echo "<input name='22' type='checkbox'> 23";
        } else {
            $str_arr3[] = $str_arr2[22]; 
        }

        if(strcmp($_POST['23'], "on") != 0) {
            echo "<input name='23' type='checkbox'> 24";
        } else {
            $str_arr3[] = $str_arr2[23]; 
        }

        if(strcmp($_POST['24'], "on") != 0) {
            echo "<input name='24' type='checkbox'> 25";
        } else {
            $str_arr3[] = $str_arr2[24]; 
        }

        if(strcmp($_POST['25'], "on") != 0) {
            echo "<input name='25' type='checkbox'> 26";
        } else {
            $str_arr3[] = $str_arr2[25]; 
        }
    ?>
<p>
    <?php
        if(strcmp($_POST['12'], "on") != 0) {
            echo "<input name='12' type='checkbox'> 13";
        } else {
            $str_arr3[] = $str_arr2[12]; 
        }

        if(strcmp($_POST['13'], "on") != 0) {
            echo "<input name='13' type='checkbox'> 14";
        } else {
            $str_arr3[] = $str_arr2[13]; 
        }

        if(strcmp($_POST['14'], "on") != 0) {
            echo "<input name='14' type='checkbox'> 15";
        } else {
            $str_arr3[] = $str_arr2[14]; 
        }

        if(strcmp($_POST['15'], "on") != 0) {
            echo "<input name='15' type='checkbox'> 16";
        } else {
            $str_arr3[] = $str_arr2[15]; 
        }

        if(strcmp($_POST['16'], "on") != 0) {
            echo "<input name='16' type='checkbox'> 17";
        } else {
            $str_arr3[] = $str_arr2[16]; 
        }

        if(strcmp($_POST['17'], "on") != 0) {
            echo "<input name='17' type='checkbox'> 18";
        } else {
            $str_arr3[] = $str_arr2[17]; 
        }

        if(strcmp($_POST['18'], "on") != 0) {
            echo "<input name='18' type='checkbox'> 19";
        } else {
            $str_arr3[] = $str_arr2[18]; 
        }

        if(strcmp($_POST['19'], "on") != 0) {
            echo "<input name='19' type='checkbox'> 20";
        } else {
            $str_arr3[] = $str_arr2[19]; 
        }
    ?>
<p>
   <?php 
        if(strcmp($_POST['6'], "on") != 0) {
            echo "<input name='6' type='checkbox'> 7";
        } else {
            $str_arr3[] = $str_arr2[6]; 
        }

        if(strcmp($_POST['7'], "on") != 0) {
            echo "<input name='7' type='checkbox'> 8";
        } else {
            $str_arr3[] = $str_arr2[7]; 
        }

        if(strcmp($_POST['8'], "on") != 0) {
            echo "<input name='8' type='checkbox'> 9";
        } else {
            $str_arr3[] = $str_arr2[8]; 
        }

        if(strcmp($_POST['9'], "on") != 0) {
            echo "<input name='9' type='checkbox'> 10";
        } else {
            $str_arr3[] = $str_arr2[9]; 
        }

        if(strcmp($_POST['10'], "on") != 0) {
            echo "<input name='10' type='checkbox'> 11";
        } else {
            $str_arr3[] = $str_arr2[10]; 
        }

        if(strcmp($_POST['11'], "on") != 0) {
            echo "<input name='11' type='checkbox'> 12";
        } else {
            $str_arr3[] = $str_arr2[11]; 
        }
   ?>
<p>
    <?php 
        if(strcmp($_POST['0'], "on") != 0) {
            echo "<input name='0' type='checkbox'> 1";
        } else {
            $str_arr3[] = $str_arr2[0]; 
        }

        if(strcmp($_POST['1'], "on") != 0) {
            echo "<input name='1' type='checkbox'> 2";
        } else {
            $str_arr3[] = $str_arr2[1]; 
        }

        if(strcmp($_POST['2'], "on") != 0) {
            echo "<input name='2' type='checkbox'> 3";
        } else {
            $str_arr3[] = $str_arr2[2]; 
        }

        if(strcmp($_POST['3'], "on") != 0) {
            echo "<input name='3' type='checkbox'> 4";
        } else {
            $str_arr3[] = $str_arr2[3]; 
        }

        if(strcmp($_POST['4'], "on") != 0) {
            echo "<input name='4' type='checkbox'> 5";
        } else {
            $str_arr3[] = $str_arr2[4]; 
        }

        if(strcmp($_POST['5'], "on") != 0) {
            echo "<input name='5' type='checkbox'> 6";
        } else {
            $str_arr3[] = $str_arr2[5]; 
        }
   ?>
<h2>Values Selected</h2>
<h2>
<?php
    foreach($str_arr3 as $value){
        echo "<h2> $value <br> </h2>";
    }
?>
</h2>
</body>
</html>