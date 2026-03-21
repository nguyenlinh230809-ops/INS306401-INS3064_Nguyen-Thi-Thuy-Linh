## Part 1

### 1. JOIN Distinction

- **INNER JOIN**:  
  Chỉ trả về các bản ghi khi có sự trùng khớp ở cả hai bảng.  
  Nếu một bản ghi ở bảng bên trái không tìm thấy bản ghi tương ứng ở bảng bên phải, bản ghi đó sẽ bị loại bỏ khỏi kết quả.

- **LEFT JOIN**:  
  Trả về tất cả các bản ghi từ bảng bên trái, bất kể có bản ghi khớp ở bảng bên phải hay không.  
  Nếu không có bản ghi khớp, các cột từ bảng bên phải sẽ có giá trị `NULL`.


### 2. Aggregation Logic

- **Mục đích của HAVING**:  
  Dùng để lọc dữ liệu dựa trên điều kiện của các hàm tổng hợp (*aggregate functions*) sau khi dữ liệu đã được nhóm (`GROUP BY`).

- **Tại sao không dùng WHERE**:  
  `WHERE` được thực thi trước `GROUP BY`, nên không thể sử dụng với các hàm như `SUM()` hoặc `COUNT()`.  
  Ngược lại, `HAVING` được thực thi sau khi nhóm dữ liệu, nên có thể lọc dựa trên kết quả tổng hợp.


### 3. PDO Definition

- **Định nghĩa**:  
  PDO (PHP Data Objects) là một interface giúp kết nối và làm việc với nhiều hệ quản trị cơ sở dữ liệu khác nhau.

- **Ưu điểm**:
  - **Database Independence**:  
    Hỗ trợ nhiều hệ CSDL như MySQL, PostgreSQL, SQLite,...
  - **Object-Oriented Support**:  
    Hỗ trợ lập trình hướng đối tượng và xử lý lỗi bằng Exception → code sạch và dễ bảo trì hơn.


### 4. Security

- **Cơ chế**:  
  Prepared Statements tách biệt hoàn toàn giữa câu lệnh SQL và dữ liệu người dùng.

- **Cách hoạt động**:  
  - Sử dụng placeholder (`?` hoặc `:name`)  
  - Database biên dịch câu lệnh trước  
  - Dữ liệu truyền vào sau chỉ được coi là giá trị → không thể thực thi như SQL  


### 5. Execution Flow

Thứ tự thực thi của SQL:

1. `FROM` / `JOIN` – Xác định nguồn dữ liệu  
2. `WHERE` – Lọc dữ liệu ban đầu  
3. `GROUP BY` – Gom nhóm dữ liệu  
4. `Aggregate Functions` – Tính toán (`SUM`, `COUNT`, `AVG`,...)  
5. `HAVING` – Lọc sau khi nhóm  
6. `SELECT` – Chọn cột hiển thị  
7. `ORDER BY` / `LIMIT` – Sắp xếp và giới hạn kết quả