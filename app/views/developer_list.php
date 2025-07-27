<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>開発者一覧</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>開発者一覧</h1>
  <ul>
    <?php foreach ($developers as $developer): ?>
      <li>
        <a href="index.php?page=developer&id=<?= htmlspecialchars($developer['id']) ?>">
          <?= htmlspecialchars($developer['name']) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
