<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($developer['name']) ?>の課題一覧</title>
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
  <h1><?= htmlspecialchars($developer['name']) ?>の課題一覧</h1>
  <ul>
    <?php foreach ($kadai_list as $kadai): ?>
      <li>
        <a href="index.php?page=kadai&id=<?= htmlspecialchars($kadai['id']) ?>">
          <?= htmlspecialchars($kadai['title']) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
