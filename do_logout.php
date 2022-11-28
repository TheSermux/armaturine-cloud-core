<?php

require_once __DIR__.'/boot.php';

$ip = $_SERVER['REMOTE_ADDR'];
    $today = date("Y-m-d H:i:s");
    $stmt = pdo()->prepare('INSERT INTO `log` (info, user, ip, datetime) VALUES (:info, :user, :ip, :datetime)');
    $stmt->execute([
        'info' => 'logout',
        'user' => $_SESSION['user_id'],
        'ip' => $ip,
        'datetime' => $today,
    ]);


$_SESSION['user_id'] = null;
header('Location: /');