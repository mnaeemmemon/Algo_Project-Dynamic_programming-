<?php 
// PHP program for  
// coin change problem. 
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
  

function count1($S, $m, $n) 
{ 

    // We need n+1 rows as  

    // the table is constructed  

    // in bottom up manner  

    // using the base case 0 

    // value case (n = 0) 

    $table; 

    for ($i = 0; $i < $n + 1; $i++) 

    for ($j = 0; $j < $m; $j++) 

        $table[$i][$j] = 0; 

    printTable($table,$m,$n);  

    // Fill the enteries for 

    // 0 value case (n = 0) 

    for ($i = 0; $i < $m; $i++) 

        $table[0][$i] = 1; 

  

    // Fill rest of the table  

    // entries in bottom up manner  

    for ($i = 1; $i < $n + 1; $i++) 

    { 

        for ($j = 0; $j < $m; $j++) 

        { 

            // Count of solutions 

            // including S[j] 

            $x = ($i-$S[$j] >= 0) ?  

                  $table[$i - $S[$j]][$j] : 0; 

  

            // Count of solutions 

            // excluding S[j] 

            $y = ($j >= 1) ?  

                  $table[$i][$j - 1] : 0; 

  

            // total count 

            $table[$i][$j] = $x + $y; 

        } 
        
     printTable($table,$m,$n);

    } 

    return $table[$n][$m-1]; 
} 

  
// Driver Code 

$arr = array(2, 3, 5, 10); 

$m = count($arr); 

$n = 15; 

echo count1($arr, $m, $n); 

  
// This code is contributed by mits 
?> 