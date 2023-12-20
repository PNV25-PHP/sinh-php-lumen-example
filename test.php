<?php
$a = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem 'data' đã được gửi hay chưa
    if (isset($_POST['data'])) {
        $data = $_POST['data'];

        // Tiến hành xử lý dữ liệu và tạo phản hồi
        $response = "Dữ liệu đã được nhận: " . $data;
        $a = $response;
        // Gửi phản hồi về cho JavaScript
        echo '<h1>' . $response . '</h1>';
    } else {
        echo "Không có dữ liệu được gửi.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trình duyệt</title>
</head> 

<body>
    <h1><?php echo $a ?></h1>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var data = encodeURIComponent("sinh;"); // Đặt giá trị muốn gửi

            // Gửi yêu cầu POST đến cùng file PHP
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Xử lý phản hồi từ PHP
                    var response = xhr.responseText;
                    var responseElement = document.createElement('h1');
                    responseElement.innerHTML = response;
                    document.body.appendChild(responseElement);
                }
            }; 
            xhr.send('data=' + data);
        });
    </script>

</body>

</html>s