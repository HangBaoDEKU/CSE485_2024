
    <?php
    $servername = "localhost"; // Tên server của bạn
    $username = "root";        // Username MySQL
    $password = "";            // Mật khẩu MySQL (nếu có)
    $dbname = "BTTH01_CSE485"; // Tên cơ sở dữ liệu
    
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    ?>
