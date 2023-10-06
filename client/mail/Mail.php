<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function thanhToanVaGuiEmail($emailNguoiNhan, $tieuDe, $noiDung) {
    $mail = new PHPMailer(true);
    try {
        // Cấu hình thông tin máy chủ email và tài khoản gửi
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Thay đổi nếu bạn sử dụng máy chủ email khác
        $mail->SMTPAuth = true;
        $mail->Username = 'thailnpc05781@fpt.edu.vn'; // Thay đổi bằng địa chỉ email của bạn
        $mail->Password = 'sepffekvrbnhqami';  // Thay đổi bằng mật khẩu của bạn
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;  // Thay đổi nếu máy chủ email của bạn yêu cầu cổng khác

        // Thiết lập người gửi và người nhận
        $mail->setFrom('thailnpc05781@fpt.edu.vn', 'Thai');  // Thay đổi bằng địa chỉ email và tên của bạn
        $mail->addAddress($emailNguoiNhan);  // Sử dụng địa chỉ email người nhận được truyền vào hàm
        $mail->isHTML(true);

        // Đặt tiêu đề và nội dung của email
        $mail->Subject = $tieuDe;
        $mail->Body = $noiDung;

        // Gửi email
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
        return false;
    }
}
