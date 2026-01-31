<?php
  // 1. Create the array of prices
  $prices = [10, 20, 5];

  // 2. Initialize the "accumulator" variable
  // We start at 0 so we can add to it.
  $total = 0;

  // 3. Loop through each price
  foreach ($prices as $price) {
      // Add the current price to the total
      // $total += $price is the same as $total = $total + $price
      $total += $price;
  }

  // 4. Print the final result
  echo "Total: " . $total;
?>