<?php
  // 1. Outer Loop: Handles the Rows (1 to 5)
  for ($row = 1; $row <= 5; $row++) {

      // 2. Inner Loop: Handles the Columns (1 to 5)
      for ($col = 1; $col <= 5; $col++) {
          // Calculate and print the product followed by a space
          echo ($row * $col) . " ";
      }

      // 3. Print a new line after each row is finished
      // (Use "<br>" if running in a web browser, "\n" for command line)
      echo "\n"; 
  }
?>