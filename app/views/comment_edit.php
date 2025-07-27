<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>コメントの編集</title>
</head>
<body>
  <h1>コメント編集</h1>
  <form action="index.php?page=comment_update" method="POST">
    <label>ニックネーム：</label>
    <input type="text" name="nickname" value="<?= htmlspecialchars($comment['nickname']) ?>" required><br>

    <label>コメント：</label>
    <textarea name="comment" rows="5" cols="40" required><?= htmlspecialchars($comment['comment']) ?></textarea>

    <input type="hidden" name="id" value="<?= $comment['id'] ?>">
    <input type="hidden" name="kadai_id" value="<?= $comment['kadai_id'] ?>">

    <button type="submit">更新</button>
  </form>
  <p><a href="index.php?page=kadai&id=<?= $comment['kadai_id'] ?>">戻る</a></p>
</body>
</html>
