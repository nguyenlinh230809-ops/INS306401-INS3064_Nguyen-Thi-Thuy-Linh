<?php
  // 1. Define the pure function
  // "Pure" means it only depends on its inputs ($a, $b) 
  // and returns a value without changing anything else (no echo, no globals).
  function add(int $a, int $b): int {
      return $a + $b;
  }

  // 2. Call the function
  // Because the function returns the value instead of printing it,
  // we must capture the result in a variable or echo the call directly.
  $sum = add(10, 5);

  // 3. Print the result outside the function
  echo "Sum of inputs: " . $sum;
?>