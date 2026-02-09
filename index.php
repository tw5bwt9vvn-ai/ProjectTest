<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>PHP Team_4c - 자유 게시판</title>
    <link rel="stylesheet" href="style.css">  <!-- CSS 파일 연결 (선택) -->
</head>
<body>
    <h1>PHP Team_4c 자유 게시판</h1>
    <a href="write.php">새 글 작성</a>
    <table border="1">
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM board ORDER BY id DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td><a href='view.php?id={$row['id']}'>{$row['title']}</a></td>
                    <td>{$row['author']}</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>