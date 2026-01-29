<?php
  // 1. Define the function with float inputs
  // We expect weight in kg and height in meters (e.g., 70, 1.75).
  function calculateBMI(float $kg, float $m): string {
      
      // 2. Calculate BMI using the formula: weight / height^2
      $bmi = $kg / ($m * $m);
      
      // 3. Determine the Category
      // We check from lowest to highest.
      if ($bmi < 18.5) {
          $category = "Under";
      } elseif ($bmi < 25) { 
          // This covers 18.5 up to 24.99...
          $category = "Normal";
      } else {
          // Everything 25 and above
          $category = "Over";
      }

      // 4. Format the result
      // number_format($bmi, 1) rounds it to 1 decimal place (e.g., 22.1).
      return "BMI: " . number_format($bmi, 1) . " (" . $category . ")";
  }

  // 5. Test the function
  // Weight: 70kg, Height: 1.75m
  $result = calculateBMI(70, 1.75);
  
  // 6. Print Output
  echo $result;
?>