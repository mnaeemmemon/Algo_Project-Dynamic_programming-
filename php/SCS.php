<?php
// A dynamic programming based PHP program to 
// find length of the shortest supersequence
 
// Returns length of the shortest 
// supersequence of X and 
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


function superSeq($X, $Y, $m, $n)
{

//   $dp = array_fill(0, $m + 1, 

//        array_fill(0, $n + 1, 0));
    $dp = tableInit($dp,$m,$n);
    printTable($dp,$m,$n);

    // Fill table in bottom up manner

    for ($i = 0; $i <= $m; $i++)

    {

        for ($j = 0; $j <= $n; $j++)

        {

             

            // Below steps follow above recurrence

            if (!$i)

                $dp[$i][$j] = $j;

            else if (!$j)

                $dp[$i][$j] = $i;

            else if ($X[$i - 1] == $Y[$j - 1])

                    $dp[$i][$j] = 1 + $dp[$i - 1][$j - 1];

            else

                    $dp[$i][$j] = 1 + min($dp[$i - 1][$j], 

                                          $dp[$i][$j - 1]);

        }
        
        printTable($dp,$m,$n);

    }
 

    return $dp[$m][$n];
}
 
// Driver Code

$X = "AGGTAB";

$Y = "GXTXAYB";

echo "Length of the shortest supersequence is " . 

      superSeq($X, $Y, strlen($X), strlen($Y));
 
// This code is contributed by mits
?>