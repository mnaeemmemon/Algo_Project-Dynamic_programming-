<?php
// A Dynamic Programming based 
// Python program for edit 
// distance problem 
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

function editDistDP($str1, $str2, 

                    $m, $n)
{ 
$dp = tableInit($dp,$m,$n);
// Fill d[][] in bottom up manner 
printTable($dp,$m,$n);
for ($i = 0; $i <= $m; $i++) 
{  

    for ($j = 0; $j <= $n; $j++) 

    { 
 

        // If first string is empty, 

        // only option is to insert 

        // all characters of second string 

        if ($i == 0) 

            $dp[$i][$j] = $j ; // Min. operations = j 
 

        // If second string is empty, 

        // only option is to remove 

        // all characters of second string 

        else if($j == 0) 

            $dp[$i][$j] = $i; // Min. operations = i 
 

        // If last characters are same, 

        // ignore last char and recur 

        // for remaining string 

        else if($str1[$i - 1] == $str2[$j - 1]) 

            $dp[$i][$j] = $dp[$i - 1][$j - 1];
 

        // If last character are different, 

        // consider all possibilities and 

        // find minimum 

        else

        { 

            $dp[$i][$j] = 1 + min($dp[$i][$j - 1],     // Insert 

                                  $dp[$i - 1][$j],     // Remove 

                                  $dp[$i - 1][$j -1]); // Replace 

        }

    }
    printTable($dp,$m,$n);
}

return $dp[$m][$n] ;
}
 
// Driver Code 

$str1 = "sunday";

$str2 = "saturday";
 

echo editDistDP($str1, $str2, strlen($str1), 

                              strlen($str2));
 
// This code is contributed 
// by Shivi_Aggarwal
?>