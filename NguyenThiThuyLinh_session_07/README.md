Part 1:
1. **JOIN Distinction**:
**INNER JOIN**: Chỉ trả về các bản ghi khi có sự trùng khớp ở cả hai bảng. Nếu một bản ghi ở bảng bên trái không tìm thấy bản ghi tương ứng ở bảng bên phải, bản ghi đó sẽ bị loại bỏ hoàn toàn khỏi tập kết quả.

**LEFT JOIN:** Trả về tất cả các bản ghi từ bảng bên trái, bất kể có bản ghi khớp ở bảng bên phải hay không. Nếu không có bản ghi khớp, các cột dữ liệu từ bảng bên phải sẽ được lấp đầy bằng giá trị NULL.

2. **Aggregation Logic**:
**Mục đích của HAVING:** Dùng để lọc dữ liệu dựa trên các điều kiện của aggregate functions sau khi dữ liệu đã được gom nhóm.

Tại sao không dùng **WHERE**: Clause WHERE được thực thi trước khi việc *(GROUP BY)* diễn ra, do đó nó không thể nhìn thấy hoặc tính toán kết quả của các hàm như *SUM()* hay *COUNT()*. Ngược lại, HAVING được thực thi sau khi các nhóm đã được hình thành và các hàm tổng hợp đã được tính toán xong.

3. **PDO Definition:** 
Định nghĩa: PDO viết tắt của PHP Data Objects.
Hai ưu điểm chính:
**Database Independence:** PDO hỗ trợ nhiều hệ quản trị cơ sở dữ liệu khác nhau (MySQL, PostgreSQL, SQLite, Oracle,...) chỉ với một giao diện lập trình duy nhất. Trong khi đó, mysqli chỉ hoạt động với MySQL.
**Hỗ trợ Object Oriented mạnh mẽ:** PDO cung cấp các tính năng hướng đối tượng hiện đại và cách xử lý lỗi (Exception handling) chuyên nghiệp hơn, giúp mã nguồn sạch và dễ bảo trì hơn.

4. **Security:**
**Cơ chế:** Prepared Statements tách biệt hoàn toàn cấu trúc câu lệnh SQL và dữ liệu người dùng.
**Hoạt động:** Thay vì gửi một chuỗi SQL trộn lẫn dữ liệu, ứng dụng gửi câu lệnh với các dấu hỏi chấm (*?*) hoặc tên biến (*:name*) làm chỗ trống (*placeholders*). Database sẽ biên dịch khung này trước. Khi dữ liệu được gửi đến sau đó, nó được đối xử thuần túy là giá trị văn bản, không bao giờ được thực thi như một phần của mã lệnh SQL, từ đó triệt tiêu khả năng bị chèn mã độc.

5. **Execution Flow:**
Thứ tự thực thi tiêu chuẩn của Database Engine như sau:
1. FROM / JOIN: Xác định nguồn dữ liệu.
2. WHERE: Lọc các hàng thô dựa trên điều kiện cơ bản.
3. GROUP BY: Gom nhóm các hàng còn lại sau khi lọc.
4. Aggregate Functions: Tính toán SUM, COUNT, AVG... cho từng nhóm.
5. HAVING: Lọc lại các nhóm dựa trên kết quả của hàm tổng hợp.
6. SELECT: Chọn các cột hiển thị.
7. ORDER BY / LIMIT: Sắp xếp và giới hạn kết quả cuối cùng.