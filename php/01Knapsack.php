<?php 
// A Dynamic Programming based solution 
// for 0-1 Knapsack problem 
  
// Returns the maximum value that 
// can be put in a knapsack of  
// capacity W
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

function knapSack($W, $wt, $val, $n) 
{ 
      
    $K = tableInit($K,$n,$W); 
    printTable($K,$n,$W);
      
    // Build table K[][] in 
    // bottom up manner 
    for ($i = 0; $i <= $n; $i++) 
    { 
        for ($w = 0; $w <= $W; $w++) 
        { 
            if ($i == 0 || $w == 0) 
                $K[$i][$w] = 0; 
            else if ($wt[$i - 1] <= $w) 
                    $K[$i][$w] = max($val[$i - 1] +  
                                   $K[$i - 1][$w -  
                                     $wt[$i - 1]],  
                                     $K[$i - 1][$w]); 
            else
                    $K[$i][$w] = $K[$i - 1][$w]; 
        } 
    
    printTable($K,$n,$W);   
    }
      
    return $K[$n][$W]; 
} 
  
    // Driver Code 
    $val = array(60, 100, 120, 80); 
    $wt = array(2, 4, 7, 5); 
    $W = 20; 
    $n = count($val); 
    echo knapSack($W, $wt, $val, $n); 
      
// This code is contributed by Sam007. 
?> 