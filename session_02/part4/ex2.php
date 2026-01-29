<?php
  // 1. Tạo Mảng đa chiều (Mảng chứa các mảng con)
  // Mỗi sinh viên là một mảng riêng biệt chứa 'name' và 'grade'
  $students = [
      ["name" => "Alice", "grade" => 95],
      ["name" => "Bob",   "grade" => 82],
      ["name" => "Charlie", "grade" => 74]
  ];

  // 2. Bắt đầu bảng HTML
  // border='1' giúp hiển thị khung viền để dễ nhìn
  echo "<table border='1'>";
  
  // Tạo hàng tiêu đề (Header row)
  echo "<tr><th>Name</th><th>Grade</th></tr>";

  // 3. Lặp qua từng sinh viên
  foreach ($students as $s) {
      // Bắt đầu một hàng mới
      echo "<tr>";
      
      // In tên (nằm trong cột 1)
      echo "<td>" . $s['name'] . "</td>";
      
      // In điểm (nằm trong cột 2)
      echo "<td>" . $s['grade'] . "</td>";
      
      // Kết thúc hàng
      echo "</tr>";
  }

  // 4. Đóng bảng HTML
  echo "</table>";
?>