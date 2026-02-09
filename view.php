<?php
include 'db.php';
if (!isset($_GET['id'])) {
    die("잘못된 접근입니다.");
}
$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM board WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$post) {
    die("게시물이 없습니다.");
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>게시물 보기 - PHP Team_4c</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p>작성자: <?php echo htmlspecialchars($post['author']); ?></p>
    <p>작성일: <?php echo $post['created_at']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
    <a href="write.php?id=<?php echo $id; ?>">수정</a>
    <a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('삭제하시겠습니까?');">삭제</a>
    <a href="index.php">목록으로</a>
</body>
</html>