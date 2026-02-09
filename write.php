<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$title = $content = $author = '';
if ($id > 0) {  // 수정 모드
    $stmt = $pdo->prepare("SELECT * FROM board WHERE id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($post) {
        $title = $post['title'];
        $content = $post['content'];
        $author = $post['author'];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    if ($id > 0) {  // 수정
        $stmt = $pdo->prepare("UPDATE board SET title = ?, content = ?, author = ? WHERE id = ?");
        $stmt->execute([$title, $content, $author, $id]);
    } else {  // 신규 작성
        $stmt = $pdo->prepare("INSERT INTO board (title, content, author) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $author]);
    }
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title><?php echo $id > 0 ? '게시물 수정' : '새 글 작성'; ?> - PHP Team_4c</title>
</head>
<body>
    <h1><?php echo $id > 0 ? '게시물 수정' : '새 글 작성'; ?></h1>
    <form method="POST">
        <label>제목: <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>" required></label><br>
        <label>작성자: <input type="text" name="author" value="<?php echo htmlspecialchars($author); ?>" required></label><br>
        <label>내용: <textarea name="content" rows="10" required><?php echo htmlspecialchars($content); ?></textarea></label><br>
        <button type="submit">저장</button>
    </form>
    <a href="index.php">취소</a>
</body>
</html>