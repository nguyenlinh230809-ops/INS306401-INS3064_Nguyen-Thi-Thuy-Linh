<?php
  // 1. Define the function with a Default Parameter
  // "string $c = '$'" means: if the user DOESN'T provide a currency, use '$'.
  // If they DO provide one (like '€'), use that instead.
  function fmt(float $amt, string $c = '$'): string {
      
      // 2. Format the number to 2 decimal places (e.g., 50 -> 50.00)
      $formattedNum = number_format($amt, 2);
      
      // 3. Return the combined string
      return $c . $formattedNum;
  }

  // 4. Call the function WITHOUT the second argument
  // Since we didn't specify the currency, it defaults to '$'.
  $input = fmt(50);

  // 5. Print the result
  echo $input;
?>