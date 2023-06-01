<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/khach_hang.php";

include  "../../PHPMailer/PHPMailer.php";
include  "../../PHPMailer/Exception.php";
include  "../../PHPMailer/POP3.php";
include  "../../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


extract($_REQUEST);
    $user = khach_hang_select_by_id($ma_kh);
    $randum =substr(md5(time()), 0, 10);
    $mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tuyetnhung200201@gmail.com';                 // SMTP username
    $mail->Password = 'pevupqufusoaiatg';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom('tuyetnhung200201@gmail.com', 'X-shop');
    $mail->addAddress($email, 'User');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset password: ' . $randum . '';
    $mail->Body    = '
        <p>Xin chào ' . $user['ho_ten'] . ', <br>
        Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn. <br>
        Mật khẩu mới của bạn là: <br></p>
        <span style="padding:15px;border:1px grey solid;font-size:22px">' . $randum . '</span>
        <p>Cảm ơn bạn đã dùng dịch vụ của chúng tôi</p>
';
    $mail->send();
    add_cookie('mat_khau', $randum, 30);
    khach_hang_doi_mat_khau(md5($randum),$ma_kh);

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
