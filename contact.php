<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $payment = $_POST['form_fields']['payment'];
    $proof = $_FILES['proof']; // Access the uploaded file information

    // Destination email address
    $to = "ecomzones@gmail.com";
    $subject = "New Form Submission";

    // Create the email message
    $message = "Name: $name\nEmail: $email\nNumber: $number\nCity: $city\nPayment: $payment\n";

    // You can include additional form fields in the email message

    // Send the email with attachment
    $headers = "From: $email";
    $attachments = array($proof['tmp_name']);
    $result = mail($to, $subject, $message, $headers, '$attachments');

    if ($result) {
        echo "Form data sent and email triggered successfully!";
    } else {
        echo "Error sending email.";
    }
} else {
    // Handle other request methods or direct access to the script
    echo "Invalid request!";
}
?>
