# Chưa có Composer và Xampp

-   Tải và cài đặt Composer (https://getcomposer.org) và Xampp (https://www.apachefriends.org/download.html bản 8.1.17)

# Đã cài đặt Composer và Xampp

-   Chạy Xampp, bật Apache và MySQL `Start`
-   Mở terminal của folder back-end và chạy `composer install`

# Để chạy server

-   Vào trình duyệt với đường dẫn localhost:80 và vào tab phpMyAdmin
-   Tạo một database mới và import database đã cho vào
-   Nếu tên database khác với tên dblaravel thì vào file `.env` chỉnh sửa
-   Sau khi chỉnh sửa chạy `php artisan config:cache`
-   Để chạy thực hiện như sau:

*   Tạo key mới : `php artisan key:generate`
*   Tạo token jwt: `php artisan jwt:secret`
*   Chạy server: `php artisan serve`
