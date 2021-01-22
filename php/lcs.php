<?php  
// Dynamic Programming C#  
// implementation of LCS problem  
function printTable($array,$m,$n){
echo "<br>";   
for ($i = 0; $i <= $m; $i++)  
{  
for ($j = 0; $j <= $n; $j++)  
{  
    echo $array[$i][$j]." ";
}
    echo "<br>";
}

  echo "<br>";
  echo "<br>";
}

function tableInit($array,$m,$n){
    
for($i = 0; $i <= $m; $i++)  
{  
for ($j = 0; $j <= $n; $j++)  
{  
    $array[$i][$j] = 0;
}
}

return $array;
}
function lcs($X , $Y) 
{ 
// find the length of the strings  

$m = strlen($X);  

$n = strlen($Y) ; 

  
// declaring the array for  
// storing the dp values  

$L=tableInit($L,$m,$n);
printTable($L,$m,$n);
/*Following steps build L[m+1][n+1]  
in bottom up fashion . 
Note: L[i][j] contains length of  
LCS of X[0..i-1] and Y[0..j-1] */

for ($i = 0; $i <= $m; $i++)  
{  

for ($j = 0; $j <= $n; $j++)  
{  

    if ($i == 0 || $j == 0)  

    $L[$i][$j] = 0;  

  

    else if ($X[$i - 1] == $Y[$j - 1])  

    $L[$i][$j] = $L[$i - 1][$j - 1] + 1;  

  

    else

    $L[$i][$j] = max($L[$i - 1][$j], 

                     $L[$i][$j - 1]);  
}  
    printTable($L,$m,$n);
}  

  
// L[m][n] contains the length of 
// LCS of X[0..n-1] & Y[0..m-1]  

  

return $L[$m][$n]; 
} 

  
// Driver Code 

$X = "AGGTAB"; 

$Y = "GXTXAYB"; 

echo "Length of LCS is "; 

echo lcs($X, $Y);  

  
// This code is contributed 
// by Shivi_Aggarwal 
?> 