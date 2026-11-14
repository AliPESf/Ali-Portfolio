<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$service = trim($_POST['service'] ?? '');
$timeline = trim($_POST['timeline'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '' ||
    strlen($name) > 100 || strlen($email) > 150 || strlen($phone) > 30 ||
    strlen($service) > 100 || strlen($timeline) > 100 || strlen($message) > 3000) {
    header('Location: index.php?status=invalid#contact');
    exit;
}

require 'database.php';
try {
    $sql = 'INSERT INTO messages (name, email, phone, service, timeline, message)
            VALUES (:name, :email, :phone, :service, :timeline, :message)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':service' => $service,
        ':timeline' => $timeline,
        ':message' => $message
    ));
    header('Location: index.php?status=success#contact');
} catch (PDOException $e) {
    header('Location: index.php?status=error#contact');
}
exit;
