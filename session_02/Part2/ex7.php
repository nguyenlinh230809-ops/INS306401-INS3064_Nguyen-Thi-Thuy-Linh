<?php
  // 1. Create the initial array
  $input = [1, 2, 3, 4, 5];

  // 2. Create an empty array to hold the result
  $reversed = [];

  // 3. Loop backwards through the input array
  // count($input) - 1 gives us the last index (4).
  // We keep going as long as $i is greater than or equal to 0.
  // $i-- moves us backwards (4, 3, 2, 1, 0).
  for ($i = count($input) - 1; $i >= 0; $i--) {
      // Add the item at the current index to the new array
      $reversed[] = $input[$i];
  }

  // 4. Print the result (using print_r for array visibility)
  print_r($reversed);
?>