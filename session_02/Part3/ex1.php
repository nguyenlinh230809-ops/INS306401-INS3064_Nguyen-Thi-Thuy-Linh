<?php
  // 1. Define the function with type hints
  // "string $name" forces the input to be a string.
  // ": string" forces the return value to be a string.
  function greet(string $name): string {
      // 2. Return the concatenated string
      return "Hello, " . $name . "!";
  }

  // 3. Call the function and print the result
  $input = greet("Sam");
  echo $input;
?>