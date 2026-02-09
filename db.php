<?php
$host = 'localhost';  // DB 호스트 (로컬: localhost)
$dbname = 'team_4c';  // DB 이름
$user = 'root';       // DB 사용자 (기본: root, 실제로는 변경)
$pass = '';           // DB 비밀번호 (로컬 기본: 빈 문자열)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB 연결 실패: " . $e->getMessage());
}
?>