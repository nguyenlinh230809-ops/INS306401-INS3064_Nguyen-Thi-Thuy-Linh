<?php
  // 1. Define the function with 'float' type hints
  // "float" is used for numbers that might have decimals (like 5.5).
  function area(float $w, float $h): float {
      // 2. Calculate the area (Width * Height)
      $result = $w * $h;
      
      // 3. Return the result
      return $result;
  }

  // 4. Call the function
  $total = area(5.5, 2);

  // 5. Print the result
  echo $total;
?>