<?php
  // 1. Loop from 1 to 20
  for ($i = 1; $i <= 20; $i++) {

      // 2. Check if the number is even
      // The Modulo operator (%) gives the remainder of division.
      // If a number divided by 2 has a remainder of 0, it is even.
      if ($i % 2 == 0) {
          echo $i . ", ";
      }
  }
?>