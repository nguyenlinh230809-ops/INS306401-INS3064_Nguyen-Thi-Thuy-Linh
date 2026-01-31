<?php
  // 1. Create the input variables
  $age = 20;
  $hasTicket = true;

  // 2. Logic Gate Check
  // The operator '&&' means BOTH conditions must be true to proceed.
  if ($age > 18 && $hasTicket) {
      echo "Enter";
  } else {
      echo "Deny";
  }
?>