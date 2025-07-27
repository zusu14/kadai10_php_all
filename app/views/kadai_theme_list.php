<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>課題テーマ一覧</title>
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
  <h1>課題テーマ一覧</h1>
  <ul>
    <?php foreach ($kadai_themes as $kadai_theme): ?>      
    <li>
      <a href="index.php?page=kadai_theme&kadai_no=<?= htmlspecialchars($kadai_theme['kadai_no']) ?>">
        <?= htmlspecialchars($kadai_theme['kadai_name']) ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
  
</body>
</html>