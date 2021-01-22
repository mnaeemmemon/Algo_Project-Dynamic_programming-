<?php 
// Dynamic Programming Python implementation  
// of Matrix Chain Multiplication. 

  
// See the Cormen book for details of the  
// following algorithm Matrix Ai has dimension p[i-1] x p[i] for i = 1..n 
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



function MatrixChainOrder($p, $n) 
{ 

    /* For simplicity of the program, one  

    extra row and one extra column are  

    allocated in m[][]. 0th row and 0th 

    column of m[][] are not used */

//    $m[][] = array($n, $n); 
    $m = tableInit($m,$n,$n);
    printTable($m,$n,$n);

    /* m[i, j] = Minimum number of scalar  

    multiplications needed to compute the  

    matrix A[i]A[i+1]...A[j] = A[i..j] where 

    dimension of A[i] is p[i-1] x p[i] */

  

    // cost is zero when multiplying one matrix. 

    for ($i = 1; $i < $n; $i++) 

        $m[$i][$i] = 0; 

  
            
    // L is chain length. 

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

                // q = cost/scalar multiplications 

                $q = $m[$i][$k] + $m[$k + 1][$j] + 

                     $p[$i - 1] * $p[$k] * $p[$j]; 

                if ($q < $m[$i][$j]) 

                    $m[$i][$j] = $q; 

            } 

        } 

    } 

  

    return $m[1][$n-1]; 
} 

  
// Driver Code 

$arr = array(1, 2, 3, 4); 

$size = sizeof($arr); 

  

echo"Minimum number of multiplications is ". 

              MatrixChainOrder($arr, $size); 

  
// This code is contributed by Mukul Singh 
?> 