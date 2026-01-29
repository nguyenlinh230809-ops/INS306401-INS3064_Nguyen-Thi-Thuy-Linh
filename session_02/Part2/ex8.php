<?php
  // 1. Loop from 1 to 50
  for ($i = 1; $i <= 50; $i++) {

      // 2. Check for "FizzBuzz" FIRST
      // We must check if it's divisible by BOTH 3 and 5 (which means 15).
      // If we don't do this first, 15 would trigger the "Fizz" check and stop.
      if ($i % 3 == 0 && $i % 5 == 0) {
          echo "FizzBuzz, ";
      } 
      // 3. Check for "Fizz" (divisible by 3)
      elseif ($i % 3 == 0) {
          echo "Fizz, ";
      } 
      // 4. Check for "Buzz" (divisible by 5)
      elseif ($i % 5 == 0) {
          echo "Buzz, ";
      } 
      // 5. Default: Print the number itself
      else {
          echo $i . ", ";
      }
  }
?>