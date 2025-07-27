<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($kadai['title']) ?>の掲示板</title>
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
  <h1>「<?= htmlspecialchars($kadai['title']) ?>」の掲示板</h1>

  <!-- 課題情報 -->
  <section>
    <p><strong>Repository:</strong>
      <a href="<?= htmlspecialchars($kadai['repositoryUrl']) ?>" target="_blank" rel="noopener noreferrer">
        <?= htmlspecialchars($kadai['repositoryUrl']) ?>
      </a>
    </p>
    <p><strong>Deploy:</strong>
      <a href="<?= htmlspecialchars($kadai['deployUrl']) ?>" target="_blank" rel="noopener noreferrer">
        <?= htmlspecialchars($kadai['deployUrl']) ?>
      </a>
    </p>
  </section>

  <!-- コメント投稿フォーム -->
  <section>
    <h2>コメント投稿</h2>
    <form action="index.php?page=comment_create" method="POST">
      <input type="hidden" name="kadai_id" value="<?= $kadai['id'] ?>">
      <div>
        <label>ニックネーム：</label>
        <input type="text" name="nickname" required>
      </div>
      <div>
        <label>コメント：</label>
        <textarea name="comment" rows="4" required></textarea>
      </div>
      <button type="submit">投稿</button>
    </form>
  </section>

  <!-- コメント一覧 -->
  <section>
    <div id="display_comment">
      <h2>コメント一覧</h2>
      <?php if (empty($comments)): ?>
        <p>まだコメントはありません。</p>
      <?php else: ?>
        <?php foreach ($comments as $comment): ?>
          <div class="post">
            <strong><?= htmlspecialchars($comment['nickname']) ?></strong>
            (<?= htmlspecialchars($comment['created_at']) ?>)<br>
            <?= nl2br(htmlspecialchars($comment['comment'])) ?>

            <!-- user_idが一致したコメントのみ編集・削除を表示 -->
            <!-- === は型の一致も確認する厳密比較 -->
            <?php if ($comment['user_id'] == $user_id): ?>
              <div class="comment-actions">
                <a href="index.php?page=comment_edit&id=<?= $comment['id'] ?>">編集</a>
                <a href="index.php?page=comment_delete&id=<?= $comment['id'] ?>" onclick="return confirm('削除しますか？');">削除</a>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>

</body>
</html>
