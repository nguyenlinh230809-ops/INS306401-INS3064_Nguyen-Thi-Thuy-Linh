<?php
  // 1. Create the variables
  $integer = 5;
  $string = '5';

  // 2. Loose Comparison (==)
  // Checks if values are equal, ignoring type.
  // 5 == '5' is TRUE.
  $looseCheck = ($integer == $string) ? "True" : "False";

  // 3. Strict Comparison (===)
  // Checks if BOTH value and data type are equal.
  // 5 (integer) === '5' (string) is FALSE.
  $strictCheck = ($integer === $string) ? "True" : "False";

  // 4. Print results
  echo "Equal ($looseCheck), Identical ($strictCheck)";
?>