<!DOCTYPE html>
<?php
    session_start();
    
    $_SESSION["X"]=" ";
    $_SESSION["Y"]=" ";
    if(array_key_exists("dataset", $_POST))
    {
        $_SESSION["lcs"]=" "; 
        $_SESSION["lcsval"]=0;
        $_SESSION["d"]="";
        
        function printans($X,$Y, $L,$m,$n)
        { 
            $index = $L[$m][$n]; 
            $lcs=" "; 
            $lcs[$index] = ' '; 

            $i = $m;
            $j = $n; 

            while ($i > 0 && $j > 0) 
            {  
                if ($X[$i-1] == $Y[$j-1]) 
                { 
                    $lcs[$index-1] = $X[$i-1];  
                    $i--; 
                    $j--; 
                    $index--;	 
                } 
                
                else if ($L[$i-1][$j] > $L[$i][$j-1]) 
                    $i--; 
                
                else
                    $j--; 
            } 
            $_SESSION["lcs"]=$lcs;
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
        function printTable($X, $Y, $array ,$m,$n)
        {
            $_SESSION["d"]=$_SESSION["d"].'<div class="single_slide height-1000 bg-img background-overlay" style="background-image: url(img/bg.jpg);">';   
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
        function lcs($X , $Y) 
        {
            $m = strlen($X);  
            $n = strlen($Y);
            $L=[[]]; 
            $L = tableInit($L,$m,$n);
            printTable($X, $Y, $L, $m, $n);
            
            for ($i=0; $i<=$m; $i++) 
            { 
                for ($j=0; $j<=$n; $j++) 
                { 
                    if ($i == 0 || $j == 0) 
                        $L[$i][$j] = 0; 
                    
                    else if ($X[$i-1] == $Y[$j-1]) 
                        $L[$i][$j] = $L[$i-1][$j-1] + 1; 
                    
                    else
                        $L[$i][$j] = max($L[$i-1][$j], $L[$i][$j-1]); 
                } 
            }  
            printTable($X, $Y, $L, $m, $n);
            printans($X, $Y,$L, $m, $n);
            return $L[$m][$n]; 
        }
        $string = $_POST["dataset"];
        $i = substr($string, -1);
        $getval=" ";
        $myfile = fopen("Datasetfor_a_b_c.txt", "r") or die("Unable to open file!");
        while(!feof($myfile) && $i!=$getval[0]) 
        {    $getval=fgets($myfile);  }
        
        $X=fgets($myfile);
        $Y=fgets($myfile);
        fclose($myfile);

        // $s=strlen($X);
        // $s2=strlen($Y)

        // $X2=substr($X,0,$s-1);
        // $Y2=substr($Y,0,$s2-1);
        $ans=lcs($X, $Y);
        $_SESSION["lcsval"]=$ans;
        $_SESSION["X"]="Sequence In X Axis Is: ".$Y;
        $_SESSION["Y"]="Sequence In Y Axis Is: ".$X;
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Longest Common Subsequence</title>
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
                <h2 style="color:black; font-size: 22px" >Longest Common Subsequence</h2>
            </div>
            <div class="single-discount-area" style="background-color: black">
                <h5>----------------------------------------------------------------</h5>
            </div>
        </section>
        
        <div style="background-color: black">
            <form method="post" class="inputs">
            <div>
                <p class="heading" style="margin-top: 20px;">Sequence 1 : SEEHEHFSESEEEEENSNNFAEANMEEEME</p><br><p class="heading">Sequence 2 : AAMNEESEAAASHMEMENHASEFHMFEFSE</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 1">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : SEEHEHFSESEEEEENSNNFAEANMEEEME</p><br><p class="heading">Sequence 2 : AMAAEEEEAAAESAAMMAAMHNSEHFMHFEAEEEMSESEEEFNEEFSFSH</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 2">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : EMEEAEESEMEEESAEAANENMEFMSFFEAFFEEN</p><br><p class="heading">Sequence 2 : EEEFHHNAFNEFAEEESEEEHHEEASFEAEAHFEE</p><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 3">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : EEEFSEEEEEFMEEEEENAAMAEESAAMEFAMASMNEEEEAEESHHESSEEEAMSEAEME</p><br><p class="heading">Sequence 2 : MFAEENHSAEEAEMEAENAAFEEAEEEEFEEEAEEAAAMAESEHEMEEAANNHFEEMEEM</p><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go With Dataset 4">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : AAAEMEAAASESHESHEEFEEFAEHFESSEFEHEEEHSNEEFANSAAEEHHEFSEAFFEEMENEEESAMM</p><br><p class="heading">Sequence 2 : NNENASEASEEAEEAAEHHNHEHANHEMEEAEAEAEHEAANMEFSMENNEEEEEFSHEEAEEEENEHMFS</p><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go With Dataset 5">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : EESSEENENEFFEEAEAEFAEAEEAENAAHEASENSAEASAEMAFFFAMNEENEAFHHNAHAHMEASSFEEEEEEAEESM</p><br><p class="heading">Sequence 2 : EAEEEEEAEENHFEEEEEFHHMMMHEEEEMAEAEESEMNAAEHEHHNEMAAMAAEAHSEFAFAEENEASHEAEFEEEEEE</p><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go With Dataset 6">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : EAHFFHMSNEAAEEEEMANHAEEEASSEESSEFAAENFNS</p><br><p class="heading">Sequence 2 : EAAMENEEAFENEESAEEHHFHMAEHAEEEAAMAHNASEA</p><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go With Dataset 7">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : MHEEEFENMSEEHNESSAFEEASAHHEEMHHSMFFSEFFMEFAEEHESAESAMAMEAAEMSEENE</p><br><p class="heading">Sequence 2 : EENEEMASEFHEMHEAMENNEENMFAHEENAESEESNHMFEMSAMEFESENEHMFFEENEEAAEM</p><input type="submit" name="dataset" style="width:98%;"  class="btn-2" value="Go With Dataset 8">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : FEEAESENEFSEMENEFMAEHFSSAEAEAEEAEEHEAAEEENAAEFHENEMFFAEEFHMHHFSEHMSAHNEAFEEESNEFAEAHFEAEMF</p><br><p class="heading">Sequence 2 : EMMMNMEASAENEMHEEANEMHAMENEEFMHFAFEAEMEMEEAAEFEMESANANSNESHAFEFMEAFAHHHSAEEEEEAMEEEEEAEFEE</p><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go With Dataset 9">
                <p class="heading" style="margin-top: 20px;">Sequence 1 : EMMEASEEEHAEFEHEAAEESEAAFHMEAEHEAAAFNNEEAHSAASFEAMMESEF</p><br><p class="heading">Sequence 2 : EEFSAHMMENEHESNFEMEAFEEAEHMAEESEANHENEFEENEFAFNAFEENNNE</p><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go With Dataset 0"><br>
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
                $val=$_SESSION["lcsval"];
                $ans=$_SESSION["lcs"];
                //$val=strlen($ans);
                $x1=$_SESSION["X"];
                $y1=$_SESSION["Y"];
                echo "<label class='seq_head_2' style='line-height:22px; margin-left: 30px; font-size: 20px'>$x1<br>$y1</label><br>";
                echo "<label style='margin-top: 10px; margin-left: 30px;' class='seq_head_2'>The Length Of LCS Is : $val</label><br>";
                echo "<label class='seq_head_2' style='margin-left: 30px;'>The Output Is : $ans</label>";
                $_SESSION["lcs"]=" "; 
                $_SESSION["lcsval"]=0;
                $_SESSION["X"]=" ";
                $_SESSION["Y"]=" ";
                ?>
            </div>
            </form>
            <a href="index.php" class="btn" style="width:98%; padding: 10px">Go Back</a>
        </div>
        <div style="background-color: black;">
        <iframe width="60%" height="600px" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom: 20px" src="https://www.youtube.com/embed/HgUOWB0StNE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>