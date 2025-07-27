<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($kadai_theme['kadai_name']) ?></title>
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
  <h1><?= htmlspecialchars($kadai_theme['kadai_name']) ?>の開発者一覧</h1>

  <?php if(empty($developers)): ?>
    <p>この課題テーマを登録している開発者はいません</p>
  <?php else: ?>
    <ul>
      <?php foreach($developers as $developer): ?>
      <li>
        <a href="index.php?page=kadai&kadai_no=<?= htmlspecialchars($kadai_theme['kadai_no']) ?>
        &developer_id=<?= htmlspecialchars($developer['id']) ?>">
          <?= htmlspecialchars($developer['name']) ?>
        </a> 
      </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <p><a href="index.php?page=kadai_themes">課題テーマ一覧に戻る</a></p>
</body>
</html>