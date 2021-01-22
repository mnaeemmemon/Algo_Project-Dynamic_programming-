<!DOCTYPE html>
<?php
    session_start();
    if(array_key_exists("dataset", $_POST))
    { 
        $_SESSION["mcm"]=0; 
        $_SESSION["d"]="";
        function printTable($array ,$m,$n)
        {
            $_SESSION["d"]=$_SESSION["d"].'<div class="single_slide height-1000 bg-img background-overlay" style="background-image: url(img/bg.jpg);">';   
            $_SESSION["d"]=$_SESSION["d"].'<div class="container h-100">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="row h-100 align-items-center">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="col-12">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="welcome_slide_text" style="background-color: white; margin-left:-80px; margin-right: auto; display:block; width: 117%; padding: 20px">';
            $_SESSION["d"]=$_SESSION["d"].'<table style="width: 100%; border:1px solid black;" >';
            for ($i = 1; $i <= $m; $i++)  
            {  
                $_SESSION["d"]=$_SESSION["d"].'<tr style="border:1px solid black;">';
                for ($j = 0; $j < $n; $j++)  
                {
                    $val=$array[$i][$j];
                    $_SESSION["d"]=$_SESSION["d"]."<td style='border: 1px solid black; color: black; font-weight: bolder; padding: 5px; font-size: 12.5px'>$val </td>";    
                }
                $_SESSION["d"]=$_SESSION["d"].'</tr>';
            }
            $_SESSION["d"]=$_SESSION["d"].'</table>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
            $_SESSION["d"]=$_SESSION["d"].'</div>';
        }

        function tableInit($array,$m,$n)
        {    
            for($i = 0; $i <= $m; $i++)  
            {  
                for ($j = 0; $j <= $n; $j++)  
                {  
                    $array[$i][$j] = 0;
                }
            }
            return $array;
        }

        function MatrixChainOrder($p, $n) 
        {  
            $m=[[]];
            $m = tableInit($m,$n,$n);
            printTable($m,$n,$n);

            for ($i = 1; $i < $n; $i++) 
                $m[$i][$i] = 0; 

            for ($L = 2; $L < $n; $L++) 
            { 
                for ($i = 1; $i < $n - $L + 1; $i++) 
                { 
                    $j = $i + $L - 1; 
                    if($j == $n)  
                        continue; 

                    $m[$i][$j] = PHP_INT_MAX; 

                    for ($k = $i; $k <= $j - 1; $k++) 
                    { 
                        $q = $m[$i][$k] + $m[$k + 1][$j] + $p[$i - 1] * $p[$k] * $p[$j]; 

                        if ($q < $m[$i][$j]) 
                        {	$m[$i][$j] = $q; 	}
                        		
                    }
                } 
            } 
            printTable($m,$n,$n);	
            return $m[1][$n-1]; 
        } 
        $string = $_POST["dataset"];
        $i = substr($string, -1);
        $n = (int)$i; 
        $data=array();
        $found=0;
        $index=0;
        $count=1;
        $cols=array();
        
        $getval=" ";
        $myfile = fopen("Datasetfor_d_e_g.txt", "r") or die("Unable to open file!");
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
            $data[$index] =(int)$val;
            $index++;
        }

        $size = sizeof($data); 
        $ans=MatrixChainOrder($data, $size);
        $_SESSION["mcm"]=$ans;  
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Matrix Chain Multiplication</title>
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
                <h2 style="color:black; font-size: 22px" >Matrix Chain Multiplication</h2>
            </div>
            <div class="single-discount-area" style="background-color: black">
                <h5>----------------------------------------------------------------</h5>
            </div>
        </section>
        
        <div style="background-color: black">
            <form method="post" class="inputs">
            <div>
                <p class="heading" style="margin-top: 20px; line-height: 10px">Array: {28, 83, 77, 34, 36, 3, 66, 54, 31, 73}</p><input type="submit" name="dataset" class="btn-2" style="width: 98%" value="Go With Dataset 1">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Array: {59, 70, 35, 27, 22, 51, 13, 56, 41, 17, 91, 96, 51, 9, 81, 97, 37, 91, 49, 81, 94, 15, 74, 29, 3, 24, 46, 31, 89, 1, 65, 66, 11, 62, 12}</p><input type="submit" name="dataset" class="btn-2" style="width: 98%" value="Go With Dataset 2">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {11, 48, 52, 62, 76, 78, 82, 87, 84, 1, 69, 54, 86, 16, 59, 38, 24, 14, 7, 71, 77, 45, 8, 71, 96, 74, 97, 35, 65, 49, 43, 9, 83, 51, 22}</p><input type="submit" name="dataset" class="btn-2" style="width: 98%" value="Go With Dataset 3">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {39, 17, 92, 11, 55, 85, 73, 4, 76, 89, 66, 35, 9, 18, 34, 96, 3, 91, 75, 88, 13, 31, 37, 19, 84, 72, 5, 41, 52, 38, 65, 62, 71, 33, 57, 21, 44, 111, 83, 61, 16, 22, 78, 94, 45}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 4">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {39, 17, 92, 11, 55, 85, 73, 4, 76, 89, 66, 35, 9, 18, 34, 96, 3, 91, 75, 88, 13, 31, 37, 19, 84, 72, 5, 41, 52, 38, 65, 62, 71, 33, 57, 21, 44, 111, 83, 61, 16, 22, 78, 94, 45}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 5">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {32, 44, 97, 55, 98, 64, 35, 13, 77, 28, 25, 78, 51, 71, 41, 34, 27, 83, 21, 85, 72, 59, 3, 111, 66, 22, 26, 75, 21, 4, 74, 36, 18, 53, 54, 71, 95, 81, 49, 1, 68, 45, 56, 11, 41}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 6">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {56, 16, 95, 92, 1, 74, 93, 24, 25, 41, 22, 46, 18, 98, 84, 41, 53, 5, 44, 94, 33, 36, 85, 43, 57, 52, 31, 63, 61, 6, 86, 26, 9, 68, 34, 71, 38, 19, 91, 96, 15, 59, 47, 51, 12, 67, 61, 11, 11, 4, 13, 73, 111, 32, 87, 29, 75, 81, 65, 42}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 7">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {81, 35, 23, 78, 96, 43, 69, 83, 61, 1, 55, 27, 28, 65, 51, 24, 54, 11, 53, 93, 97, 29, 91, 71, 44, 41, 91, 62, 51, 63, 41, 85, 6, 8, 48, 22, 88, 25, 38, 9, 2, 4, 71, 57, 58, 67, 52, 21, 46, 56, 36, 19, 95, 14, 42, 33, 17, 82, 61, 31}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 8">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {1, 45, 86, 2, 4, 11, 95, 68, 81, 18, 93, 19, 72, 41, 67, 61, 3, 32, 31, 54, 81, 78, 26, 91, 91, 53, 92, 34, 88, 71, 21, 82, 27, 11, 23, 97, 22, 15, 96, 99, 56, 29, 46, 64, 111, 21, 59, 35, 13, 33, 6, 25, 83, 17, 94, 44, 12, 57, 7, 39, 37, 51, 16, 74, 24, 52, 9, 76, 49, 58, 36, 5, 69, 43, 71, 55, 42, 84, 87, 63}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 9">
                <p class="heading" style="margin-top: 21px; line-height: 25px">Array: {57, 61, 93, 62, 98, 97, 25, 29, 73, 17, 88, 34, 24, 39, 89, 81, 33, 16, 67, 82, 1, 91, 53, 15, 8, 43, 46, 48, 31, 66, 79, 11, 54, 94, 35, 13, 51, 42, 14, 21, 51, 32, 84, 36, 96, 63, 61, 77, 12, 78, 22, 23, 76, 3, 65, 4, 69, 26, 27, 86, 7, 38, 49, 56, 45, 19, 52, 87, 18, 44, 59, 85, 9, 75, 41, 55, 99, 11, 37, 111}</p><input type="submit" style="width: 98%" name="dataset" class="btn-2" value="Go With Dataset 0">
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
                $val=$_SESSION["mcm"];
                echo "<label class='seq_head_2' style='margin-left: 30px; margin-top: 10px'>The Answer Is : $val</label><br>";
                $_SESSION["mcm"]=" "; 
                ?>
            </div>
            </form>
            <a href="index.php" class="btn" style="width:98%; padding: 10px">Go Back</a>
        </div>
        <div style="background-color: black;">
        <iframe width="60%" height="600px" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom: 20px" src="https://www.youtube.com/embed/prx1psByp7U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>