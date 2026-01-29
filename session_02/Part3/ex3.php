<?php
  // 1. Define the function with a Nullable type hint
  // "?int" means the input can be an Integer OR Null.
  // ": bool" means the function must return true or false.
  function isAdult(?int $age): bool {
      
      // 2. Check if the variable is null
      if ($age === null) {
          return false;
      }

      // 3. Check the age threshold
      return $age >= 18;
  }

  // 4. Test the function with 'null'
  $result = isAdult(null);

  // Print the result (Converting boolean to string for visibility)
  echo $result ? "True" : "False";
?>