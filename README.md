# 🌐 HSK Web - Ứng dụng thi thử HSK trực tuyến

## 📖 Giới thiệu
**HSK Web** là một nền tảng thi thử trực tuyến mô phỏng theo chuẩn đề thi **HSK (Hanyu Shuiping Kaoshi)**, hỗ trợ người học tiếng Trung luyện tập và đánh giá năng lực ngôn ngữ của mình.  

Trang web được phát triển bằng **Laravel + MySQL** cho backend và **Bootstrap + Chart.js** cho frontend, dễ sử dụng, thân thiện và phù hợp cho sinh viên, giáo viên cũng như người tự học.

---

## 🚀 Các tính năng chính
- 🔑 **Đăng ký / Đăng nhập**: Quản lý người dùng an toàn với Laravel Breeze.  
- 📝 **Thi thử HSK trực tuyến**: Làm đề theo cấu trúc chuẩn HSK, chấm điểm tự động.  
- 📚 **Tra cứu từ điển**: Hỗ trợ tìm kiếm từ vựng tiếng Trung, pinyin và nghĩa tiếng Việt.  
- 🎯 **Kiểm tra trình độ đầu vào**: Bài test nhanh để xác định cấp độ HSK phù hợp.  
- 📖 **Ôn tập Quiz**: Ngân hàng câu hỏi theo chủ đề để luyện tập hàng ngày.  
- 📊 **Thống kê kết quả học tập**: Xem điểm số, tiến bộ, biểu đồ trực quan bằng Chart.js.  
- 📂 **Xuất báo cáo PDF/Excel**: Hỗ trợ in kết quả để nộp cho giáo viên hoặc lưu trữ.  

---

## 🛠 Công nghệ sử dụng
- **Backend**: [Laravel 10](https://laravel.com/)  
- **Frontend**: HTML, CSS, JavaScript, [Bootstrap 5](https://getbootstrap.com/)  
- **Authentication**: Laravel Breeze  
- **Biểu đồ**: [Chart.js](https://www.chartjs.org/)  
- **Database**: MySQL (XAMPP)  
- **Export**: DomPDF / Maatwebsite Excel  
- **Quản lý package**: Composer, NPM  

---
## 👨‍💻 Nhóm phát triển
- Nguyễn Đức Quốc
- Đặng Thanh Huyền
 
---
## 📂 Cài đặt dự án

### 1. Clone project
```bash
git clone https://github.com/<username>/hsk_web.git
cd hsk_web
```
### 2. Cài đặt thư viện PHP
```bash
composer install
```
### 3. Cài đặt thư viện Frontend
```bash
npm install
npm run dev
```
### 4. Chạy server
```bash
php artisan serve
```
