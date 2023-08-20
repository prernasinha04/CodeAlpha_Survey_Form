<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $studentId = $_POST["student_id"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $mobileNumber = $_POST["mobile_number"];
    $nationality = $_POST["nationality"];
    $fieldOfStudy = $_POST["field_of_study"];
    $yearOfStudy = $_POST["year_of_study"];
    $gpa = $_POST["gpa"];
    $courseEnrolled = $_POST["course_enrolled_"];

    // ... retrieve other form data

    // Create a PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Your SMTP server hostname
    $mail->Port = 587;  // Port for secure TLS (587) or SSL (465) connection
    $mail->SMTPSecure = 'tls';  // Use 'tls' or 'ssl' based on your server configuration
    $mail->SMTPAuth = true;  // Enable SMTP authentication
    $mail->Username = 'prernasinha5511@gmail.com';  // Your SMTP username
    $mail->Password = 'sinha1963';  // Your SMTP password

    // Set email parameters
    $mail->setFrom('prernasinha5511@gmail.com', 'Prerna Sinha'); // Sender's email and name
    $mail->addAddress('prernasinha5511@gmail.com');  // Recipient's email address
    $mail->addReplyTo($email, $name); // Set reply-to email and name
    $mail->Subject = 'Survey Form Submission';
    $mail->Body = "Name: $name\nStudent ID: $studentId\nEmail Address: $email\nAddress: $address\nGender: $gender\nAge: $age\nMobile Number: $mobileNumber\nNationality: $nationality\nField of Study: $fieldOfStudy\nYear of Study: $yearOfStudy\nGPA: $gpa\nCourse Enrolled: $courseEnrolled"; // Add other form fields

    // Send email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Email sending failed. Error: ' . $mail->ErrorInfo;
    }
}
?>