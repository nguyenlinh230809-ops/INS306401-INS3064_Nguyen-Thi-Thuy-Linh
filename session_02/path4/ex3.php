<?php
  // 1. Tạo hàm tiện ích để kiểm tra số nguyên tố
  // Hàm này trả về TRUE nếu là số nguyên tố, FALSE nếu không phải.
  function isPrime(int $n): bool {
      // Số nhỏ hơn 2 không phải là số nguyên tố
      if ($n < 2) {
          return false;
      }

      // Kiểm tra từ 2 đến căn bậc hai của n
      // Tại sao là căn bậc hai? Vì nếu n chia hết cho một số lớn hơn căn bậc 2, 
      // thì thương số của nó sẽ phải nhỏ hơn căn bậc 2. Kiểm tra đến đây là đủ.
      for ($i = 2; $i <= sqrt($n); $i++) {
          if ($n % $i == 0) {
              return false; // Đã tìm thấy ước số khác -> Không phải số nguyên tố
          }
      }

      return true; // Không tìm thấy ước số nào -> Là số nguyên tố
  }

  // 2. Vòng lặp chính từ 1 đến 100
  echo "Các số nguyên tố từ 1-100: <br>";
  
  for ($num = 1; $num <= 100; $num++) {
      // 3. Gọi hàm kiểm tra
      if (isPrime($num)) {
          echo $num . ", ";
      }
  }
?>