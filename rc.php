<!DOCTYPE html>
<?php
    session_start();
    if(array_key_exists("dataset", $_POST))
    { 
        error_reporting(0);
        $_SESSION["rc"]=0; 
        $_SESSION["d"]="";
        function printArray($array,$n)
        {
            $val=" ";
            $_SESSION["d"]=$_SESSION["d"].'<div class="single_slide height-800 bg-img background-overlay" style="background-image: url(img/bg.jpg);">';   
            $_SESSION["d"]=$_SESSION["d"].'<div class="container h-100">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="row h-100 align-items-center">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="col-12">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="welcome_slide_text" style="background-color: white; margin-left:-80px; margin-right: auto; display:block; width: 117%; padding: 20px">';
            $_SESSION["d"]=$_SESSION["d"].'<table style="width: 100%; border:1px solid black;" >';
            $_SESSION["d"]=$_SESSION["d"].'<tr style="border:1px solid black;">';
            for ($j = 0; $j <= $n; $j++)  
            {
                $val=$j;
                if($j==0)
                {
                    $val="Length: ";
                }
                $_SESSION["d"]=$_SESSION["d"]."<td style='border: 1px solid black; color: black; font-weight: bolder; padding: 5px; font-size: 12.5px'>$val </td>";    
            }
            $_SESSION["d"]=$_SESSION["d"].'</tr>';
            $_SESSION["d"]=$_SESSION["d"].'<tr style="border:1px solid black;">';
            for ($i = 0; $i <= $n; $i++)  
            {
                $val=$array[$i];
                if($i==0)
                {
                    $val="Price: ";
                }
                $_SESSION["d"]=$_SESSION["d"]."<td style='border: 1px solid black; color: black; font-weight: bolder; padding: 5px; font-size: 12.5px'>$val </td>";    
            }
            $_SESSION["d"]=$_SESSION["d"].'</tr>';
            $_SESSION["d"]=$_SESSION["d"].'</table>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
        }

        function cutRod( $price, $n) 
        { 
            $val = array(); 
            $i; $j; 

            for($i=1; $i<=$n; $i++)
            { $val[$i] = 0; } 

            for ($i = 1; $i <= $n; $i++) 
            { 
                $max_val = PHP_INT_MIN; 
                for ($j = 0; $j < $i; $j++) 
                {    
                    $max_val = max($max_val, ($price[$j] + $val[$i-$j-1]));
                }
                $val[$i] = $max_val; 
                printArray($val,$n);
            } 
            return $val[$n]; 
        } 
            
        $string = $_POST["dataset"];
        $i = substr($string, -1);
        $n = (int)$i;

        $values=array();
        $weight=array();
        $found=0;
        $index=0;
        $count=1;
        $cols=array();

        $getval=" ";

        $myfile = fopen("Datasetfor_h.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) 
        {    
            $getval=fgets($myfile); 
            if($count==$n)
            {
                $cols = explode(',', $getval);
                break;
            } 
            $count++;
        }
        if($n==0)
        {   
            $cols = explode(',', $getval);
        }

        foreach($cols as $val) {
            $values[$index] =(int)$val;
            $index++;
        }

        $size=count($values);
        $ans=cutRod($values, $size);
        $_SESSION["rc"]=$ans;  
    }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rod Cutting Problem</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <section class="top-discount-area d-md-flex align-items-center">
            <div class="single-discount-area" style="background-color: black">
                <h5>----------------------------------------------------------------</h5>
            </div>
            <div class="single-discount-area" style="background-color: green; color: black">
                <h2 style="color:black; font-size: 22px" >Rod Cutting Problem</h2>
            </div>
            <div class="single-discount-area" style="background-color: black">
                <h5>----------------------------------------------------------------</h5>
            </div>
        </section>
        
        <div style="background-color: black">
            <form method="post" class="inputs">
            <div>
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 71,52, 89, 83, 77, 8, 43, 26, 87, 76, 62, 10, 36, 40, 41, 46, 16, 95, 60, 53</p><br><p class="heading">Rod Length : 40</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go with Dataset 1">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 45,79, 1, 35, 15, 64, 34, 89, 23, 70, 97, 39, 17, 74, 72, 82, 95, 3, 99, 20</p><br><p class="heading">Rod Length : 40</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go with Dataset 2">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 1, 68, 91, 12, 27, 86, 73, 13, 72, 67, 49, 87, 92, 24, 20, 50, 44, 58, 95, 60, 80, 47, 10, 98, 97, 17, 56, 46, 42, 8, 45, 33, 64, 93, 2, 25, 99, 48, 32, 81</p><br><p class="heading">Rod Length : 40</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go with Dataset 3">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 1, 89, 59, 99, 19, 21, 58, 70, 86, 50, 88, 98, 85, 6, 91, 13, 28, 12, 97, 83, 35, 16, 36, 7, 30, 48, 14, 56, 79, 23, 17, 25, 3, 33, 46, 94, 53, 20, 26, 77</p><br><p class="heading">Rod Length : 40</p><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go with Dataset 4">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 10,22, 28, 87, 41, 20, 43, 52, 78, 18, 44, 85, 71, 61, 83, 92, 2, 45, 36, 84, 90, 60, 79, 30, 33, 39, 54, 91, 40, 6, 5, 77, 76, 99, 58, 24, 69, 95, 68, 4, 74, 73, 48, 72, 32, 94, 29, 89, 98, 88</p><br><p class="heading">Rod Length : 40</p><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go with Dataset 5">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 61, 37, 73, 65, 25, 39, 96, 14, 56, 34, 11, 50, 87, 38, 21, 80, 59, 15, 53, 78, 99, 35, 86, 19, 17, 18, 13, 7, 31, 62, 20, 5, 93, 100, 92, 75, 60, 42, 57, 43, 10, 48, 68, 55, 33, 90, 84, 46, 82, 47</p><br><p class="heading">Rod Length : 40</p><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go with Dataset 6">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 86, 1, 30, 61, 17, 36, 58, 32, 27, 34, 43, 12, 63, 37, 74, 82, 18, 51, 87, 77, 72, 62, 24, 69, 76, 22, 78, 47, 81, 83, 95, 75, 8, 91, 85</p><br><p class="heading">Rod Length : 40</p><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go with Dataset 7">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 95, 63, 54, 47, 44, 25, 39, 52, 86, 87, 19, 10, 2, 27, 70, 96, 93, 58, 49, 20, 60, 33, 84, 80, 57, 65, 53, 98, 12, 89, 61, 50, 81, 78, 36</p><br><p class="heading">Rod Length : 40</p><input type="submit" name="dataset" style="width:98%;"  class="btn-2" value="Go with Dataset 8">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 46, 38, 34, 60, 73, 97, 74, 35, 19, 54, 91, 95, 63, 56, 62, 88, 16, 70, 48, 43, 84, 76, 53, 40, 57</p><br><p class="heading">Rod Length : 40</p><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go with Dataset 9">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Price : 48, 65, 37, 90, 5, 9, 11, 78, 8, 33, 23, 45, 80, 31, 3, 81, 21, 16, 71, 51, 35, 72, 40, 47, 12</p><br><p class="heading">Rod Length : 40</p><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go with Dataset 0"><br>
            </div>
            </form>
        </div>

        <section class="welcome_area">
            <div class="welcome_slides owl-carousel">
                <?php
                    $d=$_SESSION["d"];
                    echo $d;
                    $_SESSION["d"]=" ";
                ?>
			</div>
        </section>

        <div style="background-color: black">
            <form method="post" class="inputs">
            <div>
                <?php
                $val=$_SESSION["rc"];
                echo "<label class='seq_head_2' style='margin-left: 40%; margin-top: 10px'>The Answer Is : $val</label><br>";
                $_SESSION["rc"]=" "; 
                ?>
            </div>
            </form>
            <a href="index.php" class="btn" style="width:98%; padding: 10px">Go Back</a>
        </div>
        <div style="background-color: black;">
        <iframe width="60%" height="600px" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom: 20px" src="https://www.youtube.com/embed/SZqAQLjDsag" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>