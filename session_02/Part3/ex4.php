<?php
  // 1. Define the function with a Nullable return type
  // "?float" means this function will return a number (float) OR null.
  function safeDiv(float $a, float $b): ?float {
      
      // 2. Check for the "Edge Case" (Division by Zero)
      // Dividing by zero causes a fatal error in many languages.
      if ($b == 0) {
          return null;
      }

      // 3. Perform the division if safe
      return $a / $b;
  }

  // 4. Test the function
  $result = safeDiv(10, 0);

  // 5. Print the result
  // We use var_dump() because 'null' doesn't print anything with echo.
  if ($result === null) {
      echo "null";
  } else {
      echo $result;
  }
?>