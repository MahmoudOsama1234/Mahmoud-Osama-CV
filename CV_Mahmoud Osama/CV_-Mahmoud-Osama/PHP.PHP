<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات بالترتيب (الحقول مرتبة كما تظهر في النموذج)
    $inputs = array_values($_POST);
    
    $first_name = htmlspecialchars($inputs[0]);
    $last_name = htmlspecialchars($inputs[1]);
    $number = htmlspecialchars($inputs[2]);
    $email = htmlspecialchars($inputs[3]);
    $message = htmlspecialchars($inputs[4]);

    // إعداد البريد الإلكتروني
    $to = "1mahmoud1osama1@gmail.com"; // استبدل بـ Gmail الخاص بك
    $subject = "رسالة جديدة من موقعك";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $body = "الاسم: $first_name $last_name\n";
    $body .= "رقم الهاتف: $number\n";
    $body .= "البريد الإلكتروني: $email\n";
    $body .= "الرسالة:\n$message\n";

    // إرسال البريد
    if (mail($to, $subject, $body, $headers)) {
        echo "تم إرسال الرسالة بنجاح!";
    } else {
        echo "حدث خطأ أثناء إرسال الرسالة.";
    }
} else {
    echo "طريقة الإرسال غير صحيحة.";
}
?>