<?php
  // 1. Set the input score
  $score = 85;

  // 2. Classify using if/elseif/else
  // We check from the top (highest score) down to ensure the logic works correctly.
  if ($score >= 90) {
      echo "Grade: A";
  } elseif ($score >= 80) {
      echo "Grade: B";
  } elseif ($score >= 70) {
      echo "Grade: C";
  } else {
      // If none of the above are true, it must be failing.
      echo "Grade: F";
  }
?>