<?php
  // 1. Initialize the counter at 10
  $count = 10;

  // 2. Start the While Loop
  // The loop runs as long as $count is greater than or equal to 1.
  while ($count >= 1) {
      echo $count . ", ";
      
      // 3. Decrement the counter
      // $count-- decreases the value by 1 each time.
      // If you forget this, you get an "Infinite Loop" (it runs forever)!
      $count--; 
  }

  // 4. Print the final message after the loop finishes
  echo "Liftoff!";
?>