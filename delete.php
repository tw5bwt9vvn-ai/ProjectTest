<?php
include 'db.php';
if (!isset($_GET['id'])) {
    die("잘못된 접근입니다.");
}
$id = (int)$_GET['id'];
$stmt = $pdo->prepare("DELETE FROM board WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
?>