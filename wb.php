<!DOCTYPE html>
<?php
    session_start();
    if(array_key_exists("dataset", $_POST))
    { 
        $_SESSION["wb"]="Yes Breakable, Words : | ";
        function dictionaryContains($word) 
        {     
            $dictionary = array("conviction", "muhammad", "fasee", "ammad", "forecasts", "eeh", "correspond", "ad", "pedestrian", "blow", "interactive", "fas", "reproduce", "nae", "merit", "eem", "chip", "chase", "muh", "muhamm");
            $size=sizeof($dictionary); 
            for ($i = 0; $i < $size; $i++) 
            {
                if ($dictionary[$i]==$word) 
                {  $_SESSION["wb"]=$_SESSION["wb"].$word." | "; return true;   } 
            }
            return false; 
        }

        function wordBreak($str) 
        { 
            $size = strlen($str); 
            
            if ($size == 0)
            {  return true; }

            for ($i=1; $i<=$size; $i++) 
            { 
                if(dictionaryContains(substr($str,0,$i)) && wordBreak(substr($str,$i,$size-$i)))
                {   return true;    }
            }
            return false; 
        }

        $string = $_POST["dataset"];
        $i = substr($string, -1);
        $n = (int)$i;
        $index=0;
        $count=1;
        $getval=" ";
        $myfile = fopen("Datasetfor_j.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) 
        {    
            $getval=fgets($myfile); 
            if($count==$n)
            {
                break;
            } 
            $count++;
        }
        $X2=$getval;
        $s=strlen($X2);
        $ans=true;
        $X=substr($X2,0,$s-1);
        $ans=wordBreak($X);
        $_SESSION["wb_b"]=$ans;  
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Word Break Problem</title>
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
                <h2 style="color:black; font-size: 22px" >Word Break Problem</h2>
            </div>
            <div class="single-discount-area" style="background-color: black">
                <h5>----------------------------------------------------------------</h5>
            </div>
        </section>
        
        <div style="background-color: black">
            <form method="post" class="inputs">
            <div>
                <p class="heading" style="background-color: white; padding: 20px; border-radius: 10px; line-height: 40px; font-size: 30px; color: black">DICTIONARY: { conviction, fasee, ammad, forecaste, eeh, correspond, ad, pedestrian, blow, interactive, fas, reproduce, nae, merit, eem, chip, chase, muh, muhamm }</p><br><br>
                <p class="heading" style="margin-top: 20px;">Sequence : muhammadfaseeh</p><br><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 1">
                <p class="heading" style="margin-top: 20px;">Sequence : muhammadnaeem</p><br><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 2">
                <p class="heading" style="margin-top: 20px;">Sequence : naeemfaseeh</p><br><input type="submit" name="dataset" class="btn-2" style="width:98%;" value="Go With Dataset 3">
                <p class="heading" style="margin-top: 20px;">Sequence : fasnae</p><br><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go With Dataset 4">
                <p class="heading" style="margin-top: 20px;">Sequence : naeeeh</p><br><input type="submit" style="width:98%;" name="dataset" class="btn-2" value="Go With Dataset 5">
                <p class="heading" style="margin-top: 20px;">Sequence : faeem</p><br><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go With Dataset 6">
                <p class="heading" style="margin-top: 20px;">Sequence : muhfaseeh</p><br><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go With Dataset 7">
                <p class="heading" style="margin-top: 20px;">Sequence : muhammeem</p><br><input type="submit" name="dataset" style="width:98%;"  class="btn-2" value="Go With Dataset 8">
                <p class="heading" style="margin-top: 20px;">Sequence : faseenaeeeh</p><br><input  style="width:98%;" type="submit" name="dataset" class="btn-2" value="Go With Dataset 9">
                <p class="heading" style="margin-top: 20px;">Sequence : naeammad</p><br><input type="submit" name="dataset" style="width:98%;" class="btn-2" value="Go With Dataset 0"><br>
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
                $ans=$_SESSION["wb_b"];
                if($ans==true)
                {
                    $setf=$_SESSION["wb"];
                    echo "<label class='seq_head_2' style='margin-top: 10px; margin-left: 5%;'>$setf</label><br>";
                }
                else
                {
                    echo "<label class='seq_head_2' style='margin-top: 10px; margin-left: 40%;'>Breaking Is Not Possible</label><br>";
                }
                $_SESSION["wb"]=" "; 
                $_SESSION["wb_b"]=0;
                ?>
            </div>
            </form>
            <a href="index.php" class="btn" style="width:98%; padding: 10px">Go Back</a>
        </div>
        <div style="background-color: black;">
        <iframe width="60%" height="600px" style="margin-left: auto; margin-right: auto; display: block; margin-top: 30px; margin-bottom: 20px" src="https://www.youtube.com/embed/hLQYQ4zj0qg"" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>