<?php
  // 1. Set the input number (1-7)
  $input = 3;

  // 2. Use a Switch Statement
  // This compares the variable $input against multiple "cases".
  switch ($input) {
      case 1:
          echo "Monday";
          break; // Stop here if matched
      case 2:
          echo "Tuesday";
          break;
      case 3:
          echo "Wednesday";
          break;
      case 4:
          echo "Thursday";
          break;
      case 5:
          echo "Friday";
          break;
      case 6:
          echo "Saturday";
          break;
      case 7:
          echo "Sunday";
          break;
      default:
          // Runs if $input is not 1-7
          echo "Invalid";
  }
?>