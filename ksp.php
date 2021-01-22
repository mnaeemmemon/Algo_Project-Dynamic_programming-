<!DOCTYPE html>
<?php
    session_start();
    if(array_key_exists("dataset", $_POST))
    { 
        $_SESSION["ksp"]=0; 
        $_SESSION["d"]="";
        function printTable($array ,$m,$n)
        {
            $_SESSION["d"]=$_SESSION["d"].'<div class="single_slide height-1000 width-1000 bg-img background-overlay" style="background-image: url(img/bg.jpg);">';   
            $_SESSION["d"]=$_SESSION["d"].'<div class="container h-100">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="row h-100 align-items-center">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="col-12">';
            $_SESSION["d"]=$_SESSION["d"].'<div class="welcome_slide_text" style="background-color: white; margin-left:-80px; margin-right: auto; display:block; width: 117%; padding: 20px">';
            $_SESSION["d"]=$_SESSION["d"].'<table style="width: 100%; border:1px solid black;" >';
            for ($i = 0; $i <= $m; $i++)  
            {  
                $_SESSION["d"]=$_SESSION["d"].'<tr style="border:1px solid black;">';
                for ($j = 0; $j <= $n; $j++)  
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

        function knapSack($W, $wt, $val, $n) 
        { 
            $K =[[]];
            $K = tableInit($K,$n,$W); 
            printTable($K,$n,$W);

            for ($i = 0; $i <= $n; $i++) 
            { 
                for ($w = 0; $w <= $W; $w++) 
                { 
                    if ($i == 0 || $w == 0) 
                    {   $K[$i][$w] = 0; }
                    else if ($wt[$i - 1] <= $w) 
                    {
                        $K[$i][$w] = max($val[$i - 1] + $K[$i - 1][$w - $wt[$i - 1]], $K[$i - 1][$w]); 
                    }
                    else
                    {
                        $K[$i][$w] = $K[$i - 1][$w]; 
                    }
                }   
                //printTable($K,$n,$W); 
            }
            printTable($K,$n,$W); 
            return $K[$n][$W]; 
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
        $cols2=array();

        $getval=" ";
        $getval2=" ";

        $myfile = fopen("Datasetfor_f.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) 
        {    
            $getval=fgets($myfile); 
            $getval2=fgets($myfile);
            if($count==$n)
            {
                $cols = explode(',', $getval);
                $cols2 = explode(',', $getval2);
                break;
            } 
            $count++;
        }
        if($n==0)
        {   
            $cols = explode(',', $getval);
            $cols2 = explode(',', $getval2);
        }

        foreach($cols as $val) {
            $values[$index] =(int)$val;
            $index++;
        }
        $index=0;
        foreach($cols2 as $val2) {
            $weight[$index] =(int)$val2;
            $index++;
        }

        $w=40;
        $size=count($values);
        $ans=knapSack($w, $weight, $values, $size);
        $_SESSION["ksp"]=$ans;  
        $_SESSION["x"]=$getval;
        $_SESSION["y"]=$getval2;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>0/1 Knapsack Problem</title>
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
                <h2 style="color:black; font-size: 22px" >0/1 Knapsack Problem</h2>
            </div>
            <div class="single-discount-area" style="background-color: black">
                <h5>----------------------------------------------------------------</h5>
            </div>
        </section>
        
        <div style="background-color: black">
            <form method="post" class="inputs">
            <div>
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 8, 74, 62, 4, 42, 66, 77, 30, 25, 90, 49, 38, 15, 69, 94, 60, 18, 71, 68, 89</p><br><p class="heading" style="line-height: 25px">Weight : 71,52, 89, 83, 77, 8, 43, 26, 87, 76, 62, 10, 36, 40, 41, 46, 16, 95, 60, 53</p><br><p class="heading">W : 40</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 1">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 4, 87, 13, 67, 22, 62, 28, 52, 43, 78, 3, 34, 77, 64, 24, 88, 60, 21, 89, 49</p><br><p class="heading" style="line-height: 25px">Weight : 45,79, 1, 35, 15, 64, 34, 89, 23, 70, 97, 39, 17, 74, 72, 82, 95, 3, 99, 20</p><br><p class="heading">W : 40</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 2">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 50, 28, 61, 76, 58, 83, 45, 2, 100, 74, 5, 62, 94, 18, 15, 27, 29, 89, 7, 30, 10, 93, 65, 49, 69, 88, 4, 9, 44, 20, 40, 80, 43, 92, 57, 84, 75, 1, 24, 51</p><br><p class="heading" style="line-height: 25px">Weight : 1, 68, 91, 12, 27, 86, 73, 13, 72, 67, 49, 87, 92, 24, 20, 50, 44, 58, 95, 60, 80, 47, 10, 98, 97, 17, 56, 46, 42, 8, 45, 33, 64, 93, 2, 25, 99, 48, 32, 81</p><br><p class="heading">W : 40</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 3">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 69,70, 42, 60, 41, 73, 66, 63, 10, 81, 52, 3, 31, 80, 24, 68, 61, 65, 13, 2, 86, 90, 32, 22, 37, 100, 18, 11, 56, 12, 59, 79, 26, 83, 34, 92, 45, 7, 50, 99</p><br><p class="heading" style="line-height: 25px">Weight : 1, 89, 59, 99, 19, 21, 58, 70, 86, 50, 88, 98, 85, 6, 91, 13, 28, 12, 97, 83, 35, 16, 36, 7, 30, 48, 14, 56, 79, 23, 17, 25, 3, 33, 46, 94, 53, 20, 26, 77</p><br><p class="heading">W : 40</p><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go With Dataset 4">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 69,39, 54, 64, 68, 99, 96, 73, 4, 35, 94, 59, 65, 30, 47, 78, 90, 37, 3, 55, 71, 8, 72, 74, 50, 80, 52, 76, 45, 32, 89, 92, 9, 10, 53, 51, 48, 56, 18, 24, 16, 15, 79, 95, 28, 85, 41, 83, 29, 93</p><br><p class="heading" style="line-height: 25px">Weight : 10,22, 28, 87, 41, 20, 43, 52, 78, 18, 44, 85, 71, 61, 83, 92, 2, 45, 36, 84, 90, 60, 79, 30, 33, 39, 54, 91, 40, 6, 5, 77, 76, 99, 58, 24, 69, 95, 68, 4, 74, 73, 48, 72, 32, 94, 29, 89, 98, 88</p><br><p class="heading">W : 40</p><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go With Dataset 5">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 93, 36, 33, 52, 89, 70, 54, 77, 95, 62, 67, 24, 21, 88, 66, 22, 49, 44, 86, 8, 40, 84, 61, 58, 27, 75, 56, 9, 19, 42, 80, 30, 43, 99, 34, 13, 38, 2, 87, 59, 51, 79, 50, 37, 32, 97, 28, 76, 53, 39</p><br><p class="heading" style="line-height: 25px">Weight : 61, 37, 73, 65, 25, 39, 96, 14, 56, 34, 11, 50, 87, 38, 21, 80, 59, 15, 53, 78, 99, 35, 86, 19, 17, 18, 13, 7, 31, 62, 20, 5, 93, 100, 92, 75, 60, 42, 57, 43, 10, 48, 68, 55, 33, 90, 84, 46, 82, 47</p><br><p class="heading">W : 40</p><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go With Dataset 6">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 69, 4, 21, 22, 74, 77, 11, 37, 60, 24, 89, 83, 56, 61, 71, 2, 44, 48, 54, 46, 70, 80, 29, 13, 9, 6, 15, 57, 26, 93, 34, 3, 94, 75, 88</p><br><p class="heading" style="line-height: 25px">Weight : 86, 1, 30, 61, 17, 36, 58, 32, 27, 34, 43, 12, 63, 37, 74, 82, 18, 51, 87, 77, 72, 62, 24, 69, 76, 22, 78, 47, 81, 83, 95, 75, 8, 91, 85</p><br><p class="heading">W : 40</p><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go With Dataset 7">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 12, 21, 57, 34, 18, 23, 90, 55, 56, 38, 9, 29, 71, 26, 97, 25, 95, 33, 40, 11, 37, 10, 4, 66, 35, 85, 30, 54, 8, 36, 44, 82, 51, 76, 13</p><br><p class="heading" style="line-height: 25px">Weight : 95, 63, 54, 47, 44, 25, 39, 52, 86, 87, 19, 10, 2, 27, 70, 96, 93, 58, 49, 20, 60, 33, 84, 80, 57, 65, 53, 98, 12, 89, 61, 50, 81, 78, 36</p><br><p class="heading">W : 40</p><input type="submit" name="dataset" style="width:98%;"  class="btn-2" value="Go With Dataset 8">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 51, 42, 27, 91, 64, 71, 18, 83, 85, 3, 12, 68, 58, 52, 9, 5, 21, 79, 86, 32, 53, 74, 81, 44, 94</p><br><p class="heading" style="line-height: 25px">Weight : 46, 38, 34, 60, 73, 97, 74, 35, 19, 54, 91, 95, 63, 56, 62, 88, 16, 70, 48, 43, 84, 76, 53, 40, 57</p><br><p class="heading">W : 40</p><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go With Dataset 9">
                <p class="heading" style="margin-top: 20px; line-height: 25px">Values : 21, 8, 55, 79, 89, 34, 31, 4, 70, 3, 2, 39, 59, 82, 85, 13, 73, 52, 86, 72, 43, 10, 99, 81, 83</p><br><p class="heading" style="line-height: 25px">Weight : 48, 65, 37, 90, 5, 9, 11, 78, 8, 33, 23, 45, 80, 31, 3, 81, 21, 16, 71, 51, 35, 72, 40, 47, 12</p><br><p class="heading">W : 40</p><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go With Dataset 0"><br>
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
                $val=$_SESSION["ksp"];
                $x=$_SESSION["x"];
                $y=$_SESSION["y"];
                $x1="Sequence in X-Axis Is: (1.......to W(40))";
                $y1="Sequence in Y-Axis Is: Weights: ($x)<br>(With Their)<br>Profits: ($y)";
                echo "<label class='seq_head_2' style='line-height:22px; margin-left: 30px; font-size: 20px'>$x1<br>$y1</label><br>";
                echo "<label class='seq_head_2' style='margin-top: 10px; margin-left: 40%;'>The Answer Is : $val</label><br>";
                $_SESSION["ksp"]=" "; 
                ?>
            </div>
            </form>
            <a href="index.php" class="btn" style="width:98%; padding: 10px">Go Back</a>
        </div>
        <div style="background-color: black;">
        <iframe width="60%" height="600px" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom: 20px" src="https://www.youtube.com/embed/nLmhmB6NzcM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>