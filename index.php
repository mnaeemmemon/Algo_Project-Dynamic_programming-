<!DOCTYPE html>
<?php
    session_start();
    $_SESSION["d"]="";
    $_SESSION["lcs"]=" ";
    $_SESSION["X"]=" ";
    $_SESSION["Y"]=" ";
    $_SESSION["lcsval"]=0;
    $_SESSION["scs"]=" ";
    $_SESSION["scsval"]=0;
    $_SESSION["ld"]=" ";
    $_SESSION["lis"]=" "; 
    $_SESSION["lisval"]=0;
    $_SESSION["mcm"]=0; 
    $_SESSION["x"]=" ";
    $_SESSION["y"]=" ";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dynamic Programming | HOME</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body style="background-image: url('img/bg.jpg');">
        <div class="inner_body">
        <a href="lss.php" class="btn">Longest Common Subsequence</a>
        <a href="sss.php" class="btn">Shortest Common Subsequence</a>
        <a href="ld.php" class="btn">Levenshtein Distance</a>
        <a href="lis.php" class="btn">Longest Increasing Subsequence</a>
        <a href="mcm.php" class="btn">Matrix Chain Multiplication</a>
        <a href="ksp.php" class="btn">0-1-knapsack-problem</a>
        <a href="pp.php" class="btn">Partition-problem</a>
        <a href="rc.php" class="btn">Rod Cutting Problem</a>
        <a href="cc.php" class="btn">Coin-change-making-problem</a>
        <a href="wb.php" class="btn">Word Break Problem</a>
        </div>

    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>