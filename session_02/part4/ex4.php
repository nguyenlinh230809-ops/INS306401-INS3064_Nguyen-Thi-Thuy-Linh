<?php
  // 1. Tạo mảng điểm số đầu vào (Random integers)
  $scores = [65, 80, 90, 55, 75, 85];

  // 2. Tính toán các chỉ số thống kê (Stats)
  // Tính tổng
  $sum = array_sum($scores);
  
  // Đếm số lượng phần tử
  $count = count($scores);
  
  // Tính trung bình cộng
  $average = $sum / $count;

  // Tìm Max và Min (Yêu cầu đề bài)
  $maxScore = max($scores);
  $minScore = min($scores);

  // 3. Lọc danh sách: Tìm những điểm CAO HƠN trung bình
  $topPerformers = [];
  
  foreach ($scores as $score) {
      if ($score > $average) {
          $topPerformers[] = $score;
      }
  }

  // 4. In kết quả
  // json_encode là cách nhanh nhất để biến mảng [80, 90...] thành chuỗi "[80, 90...]" để in.
  echo "Min: $minScore, Max: $maxScore <br>";
  echo "Avg: " . $average . ", Top: " . json_encode($topPerformers);
?>